<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $count = DB::table('cart_details')
        ->join('cart_lists', 'cart_details.cart_id', '=', 'cart_lists.cart_id')
        ->join('customers', 'cart_lists.cus_id', '=', 'customers.cus_id')
        ->where('customers.user_id', $user_id)
        ->count();
        $cart = DB::select('SELECT cd.cart_detail_id, c.cloth_name, c.cost, cd.quantity, cd.sum_cost, ci.img, cd.cart_id
        FROM cart_details cd
        JOIN clothes c ON c.cloth_id = cd.cloth_id
        JOIN cart_lists cl ON cl.cart_id = cd.cart_id
        JOIN customers cus ON cus.cus_id = cl.cus_id
        JOIN users u ON u.id = cus.user_id
        LEFT JOIN cloth_imgs ci ON ci.cloth_id = c.cloth_id
        WHERE cus.user_id = ?', [$user_id]);
        
        $cart_id = DB::table('cart_lists')
        ->join('customers', 'customers.cus_id', '=', 'cart_lists.cus_id')
        ->where('cart_lists.cus_id', $user_id)
        ->select('cart_lists.cart_id')
        ->first();
        return view('cart.index', ['cart' => $cart, 'count' => $count, 'cart_id' => $cart_id]);
    }

    public function delete($cart_detail_id){
        DB::delete('DELETE FROM cart_details WHERE cart_detail_id=?', [$cart_detail_id]);
        return redirect()->route('cart.index');
    }

   
    public function deleteSelected(Request $request)
    {
        $selectedIds = json_decode($request->input('selectedIds'), true);

        // Kiểm tra xem selectedIds có giá trị hay không trước khi xóa
        if (!empty($selectedIds)) {
            // Xóa selectedIds khỏi cơ sở dữ liệu
            DB::table('cart_details')->whereIn('cart_detail_id', $selectedIds)->delete();
        }

        // Redirect về trang cart hoặc trang khác nếu cần thiết
        return redirect()->route('cart.index')->with('msg', 'Đã xóa các mục đã chọn');
    }

    public function updateSelected(Request $request)
    {
        $selectedIds = json_decode($request->input('selectedIds'), true);
        $quantities = json_decode($request->input('quantities'), true);
        $totalCost = $request->input('totalCost');
        if (!empty($selectedIds)) {
            // Lặp qua từng sản phẩm và cập nhật is_choose, số lượng và thành tiền
            foreach ($selectedIds as $cartDetailId) {
                // Cập nhật is_choose thành 1 thể hiện việc được chọn
                DB::table('cart_details')
                    ->where('cart_detail_id', $cartDetailId)
                    ->update(['is_choose' => 1]);
    
                // Cập nhật số lượng và thành tiền
                $quantity = $quantities[$cartDetailId] ?? 1; // Giả sử mặc định là 1 nếu không có giá trị
                $newSumCost = $quantity * DB::table('cart_details')
                ->join('clothes', 'cart_details.cloth_id', '=', 'clothes.cloth_id')
                ->where('cart_detail_id', $cartDetailId)
                ->value('clothes.cost');
                
                DB::table('cart_details')
                    ->where('cart_detail_id', $cartDetailId)
                    ->update([
                        'quantity' => $quantity,
                        'sum_cost' => $newSumCost,
                    ]);
            }
        }

        $total_value = $request->input('total_value');
        $cart_id = $request->input('cart_id');
        $total_value = $request->input('totalCost');
        $user_id = Auth::user()->id;
        $cusId = DB::table('customers as c')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->select('c.cus_id')
        ->first();

        DB::table('invoices')->insert([
            'status' => 'Waiting',
            'address_id' => NULL,
            'cus_id' => $cusId -> cus_id,
            'total_value' => $total_value,
            'pay_method' => NULL,
            'created_on' => now()->format('Y-m-d H:i:s'),
            'is_pay' => 0,
            'cart_id' => $cart_id,
        ]);
        $newlyInsertedInvoiceId = DB::table('invoices')
        ->orderByDesc('created_on') // Sắp xếp giảm dần để lấy hóa đơn mới nhất
        ->value('invoice_id');

        $chooseList = DB::table('cart_details')
        ->join('cart_lists', 'cart_details.cart_id', '=', 'cart_lists.cart_id')
        ->where('cart_lists.cart_id', '=', $cart_id)
        ->where('cart_details.is_choose', '=', 1)
        ->get();
        $invoiceDetails = [];

        foreach ($chooseList as $item) {
            $invoiceDetails[] = [
                'invoice_id' => $newlyInsertedInvoiceId, // Thay thế bằng ID mới được chèn từ invoices
                'cloth_id' => $item->cloth_id,
                'quantity' => $item->quantity,
                'sum_cost' => $item->sum_cost,
            ];
        }
        // Chèn toàn bộ dữ liệu vào bảng invoice_detail
        DB::table('invoice_detail')->insert($invoiceDetails);
        DB::table('cart_details')
        ->join('cart_lists', 'cart_details.cart_id', '=', 'cart_lists.cart_id')
        ->where('cart_lists.cart_id', '=', $cart_id)
        ->where('cart_details.is_choose', '=', 1)
        ->delete();
        Session::put('totalCost', $totalCost);
        Session::put('newlyInsertedInvoiceId' , $newlyInsertedInvoiceId);
        // dd($newlyInsertedInvoiceId);
        // Redirect về trang cart hoặc trang khác nếu cần thiết
        return redirect()->route('checkout.index');
    }

    public function addToCart(Request $request){
        $clothId = $request->input('cloth_id');
        $cartId = DB::table('cart_lists as cl')
        ->join('customers as c', 'cl.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', Auth::user()->id)
        ->value('cl.cart_id');
        $cost = DB::table('clothes')
        ->where('cloth_id', $clothId)
        ->value('cost');

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $existingCartItem = DB::table('cart_details')
        ->where('cart_id', $cartId)
        ->where('cloth_id', $clothId)
        ->first();

        if ($existingCartItem) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $newQuantity = $existingCartItem->quantity + 1;
            $newSumCost = $newQuantity * $cost;

            DB::table('cart_details')
                ->where('cart_id', $cartId)
                ->where('cloth_id', $clothId)
                ->update([
                    'quantity' => $newQuantity,
                    'sum_cost' => $newSumCost,
                ]);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            DB::table('cart_details')->insert([
                'cart_id' => $cartId,
                'cloth_id' => $clothId,
                'quantity' => 1,
                'is_choose' => 0,
                'sum_cost' => $cost,
            ]);
        }
        
        return Redirect()->route('products.index');
    }

    public function addToCart_detail(Request $request){
        $clothId = $request->input('cloth_id');
        $quantity = $request->input('quantity');
        
        $cartId = DB::table('cart_lists as cl')
        ->join('customers as c', 'cl.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', Auth::user()->id)
        ->value('cl.cart_id');
        $cost = DB::table('clothes')
        ->where('cloth_id', $clothId)
        ->value('cost');

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $existingCartItem = DB::table('cart_details')
        ->where('cart_id', $cartId)
        ->where('cloth_id', $clothId)
        ->first();

        if ($existingCartItem) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $newQuantity = $existingCartItem->quantity + $quantity;
            $newSumCost = $newQuantity * $cost;

            DB::table('cart_details')
                ->where('cart_id', $cartId)
                ->where('cloth_id', $clothId)
                ->update([
                    'quantity' => $newQuantity,
                    'sum_cost' => $newSumCost,
                ]);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            DB::table('cart_details')->insert([
                'cart_id' => $cartId,
                'cloth_id' => $clothId,
                'quantity' => $quantity,
                'is_choose' => 0,
                'sum_cost' => $cost*$quantity,
            ]);
        }
        return Redirect()->route('products.show', $clothId);
    }
}
