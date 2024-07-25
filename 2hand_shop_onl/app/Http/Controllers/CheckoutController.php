<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        
        $totalCost = session('totalCost', 0);
        $newlyInsertedInvoiceId = session('newlyInsertedInvoiceId', 0);
        $user_id = Auth::user()->id;
        
        // $cart = DB::select('SELECT cd.cart_detail_id , c.cloth_name, c.cost, cd.quantity, cd.sum_cost, ci.img
        // FROM clothes c, cart_lists cl, cart_details cd, customers cus, cloth_imgs ci
        // WHERE c.cloth_id=cd.cloth_id AND cl.cart_id = cd.cart_id AND cus.cus_id = cl.cus_id AND c.cloth_id=ci.cloth_id AND cd.is_choose=1 AND cus.user_id = ?', [$user_id]);
        // dd($newlyInsertedInvoiceId);
        $cart = DB::select('SELECT id.id, c.cloth_name, c.cost, id.quantity, id.sum_cost, ci.img
        FROM invoice_detail id
        JOIN clothes c ON c.cloth_id = id.cloth_id
        JOIN invoices iv ON iv.invoice_id = id.invoice_id
        JOIN customers cus ON cus.cus_id = iv.cus_id
        JOIN users u ON u.id = cus.user_id
        LEFT JOIN cloth_imgs ci ON ci.cloth_id = c.cloth_id
        WHERE cus.user_id = ? AND iv.invoice_id = ?', [$user_id, $newlyInsertedInvoiceId]);

        $info = DB::table('addresses as a')
        ->select('a.name as address_name', 'a.phone', 'a.address_detail', 'w.name as ward_name', 'd.name as district_name', 'p.name as province_name', 'a.address_id')
        ->join('districts as d', 'a.district_code', '=', 'd.code')
        ->join('wards as w', 'a.ward_code', '=', 'w.code')
        ->join('provinces as p', 'a.province_code', '=', 'p.code')
        ->join('customers as c', 'a.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->get();

        $cart_id = DB::table('cart_lists as cl')
        ->join('customers as c', 'cl.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->value('cl.cart_id');
        $infoFirst = DB::table('addresses as a')
        ->select('a.name as address_name', 'a.phone', 'a.address_detail', 'w.name as ward_name', 'd.name as district_name', 'p.name as province_name', 'a.address_id')
        ->join('districts as d', 'a.district_code', '=', 'd.code')
        ->join('wards as w', 'a.ward_code', '=', 'w.code')
        ->join('provinces as p', 'a.province_code', '=', 'p.code')
        ->join('customers as c', 'a.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->first();
        return view('checkout.index', ['cart' => $cart, 'user_id' => $user_id, 'totalCost' => $totalCost, 'info' => $info, 'infoFirst' => $infoFirst, 'cart_id' => $cart_id, 'newlyInsertedInvoiceId' => $newlyInsertedInvoiceId]);
    }
    public function index2($invoice_id)
    {
        
        $totalCost = session('totalCost', 0);
        // $newlyInsertedInvoiceId = session('newlyInsertedInvoiceId', $invoice_id);
        $user_id = Auth::user()->id;
        
        // $cart = DB::select('SELECT cd.cart_detail_id , c.cloth_name, c.cost, cd.quantity, cd.sum_cost, ci.img
        // FROM clothes c, cart_lists cl, cart_details cd, customers cus, cloth_imgs ci
        // WHERE c.cloth_id=cd.cloth_id AND cl.cart_id = cd.cart_id AND cus.cus_id = cl.cus_id AND c.cloth_id=ci.cloth_id AND cd.is_choose=1 AND cus.user_id = ?', [$user_id]);
        // dd($newlyInsertedInvoiceId);
        $cart = DB::select('SELECT id.id, c.cloth_name, c.cost, id.quantity, id.sum_cost, ci.img
        FROM invoice_detail id
        JOIN clothes c ON c.cloth_id = id.cloth_id
        JOIN invoices iv ON iv.invoice_id = id.invoice_id
        JOIN customers cus ON cus.cus_id = iv.cus_id
        JOIN users u ON u.id = cus.user_id
        LEFT JOIN cloth_imgs ci ON ci.cloth_id = c.cloth_id
        WHERE cus.user_id = ? AND iv.invoice_id = ?', [$user_id, $invoice_id]);

        $info = DB::table('addresses as a')
        ->select('a.name as address_name', 'a.phone', 'a.address_detail', 'w.name as ward_name', 'd.name as district_name', 'p.name as province_name', 'a.address_id')
        ->join('districts as d', 'a.district_code', '=', 'd.code')
        ->join('wards as w', 'a.ward_code', '=', 'w.code')
        ->join('provinces as p', 'a.province_code', '=', 'p.code')
        ->join('customers as c', 'a.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->get();

        $cart_id = DB::table('cart_lists as cl')
        ->join('customers as c', 'cl.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->value('cl.cart_id');
        $infoFirst = DB::table('addresses as a')
        ->select('a.name as address_name', 'a.phone', 'a.address_detail', 'w.name as ward_name', 'd.name as district_name', 'p.name as province_name', 'a.address_id')
        ->join('districts as d', 'a.district_code', '=', 'd.code')
        ->join('wards as w', 'a.ward_code', '=', 'w.code')
        ->join('provinces as p', 'a.province_code', '=', 'p.code')
        ->join('customers as c', 'a.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->first();
        return view('checkout.index', ['cart' => $cart, 'user_id' => $user_id, 'totalCost' => $totalCost, 'info' => $info, 'infoFirst' => $infoFirst, 'cart_id' => $cart_id, 'newlyInsertedInvoiceId' => $invoice_id]);
    }
    public function updateOrder(Request $request){
        $address_id = $request->input('address_id');
        $total_value = $request->input('total_value');
        $pay_method = $request->input('pay_method');
        $invoice_id = $request->input('invoice_id');
       
        $user_id = Auth::user()->id;
        $cusId = DB::table('customers as c')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->select('c.cus_id')
        ->first();

        DB::table('invoices')
        ->where('invoice_id', '=', $invoice_id)
        ->update([
            'status' => 'pending',
            'address_id' => $address_id,
            'total_value' => $total_value,
            'pay_method' => $pay_method,
            'created_on' => now()->format('Y-m-d H:i:s'),
            'is_pay' => 0,
        ]);
    
        
        if ($pay_method == 'Thanh toán khi nhận hàng' || $pay_method == 'Chuyển khoản'){
            return Redirect()->route('user.purchase');
        }
    }
}
