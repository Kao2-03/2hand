<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Session;
use App\Models\invoice;
use App\Models\customer;
use App\Models\Clothes;
class Order_managementController extends Controller
{
   public function index(){
        $user = Auth::user();
        $user_id = Auth::user()->id;
    $orders = invoice::select('invoices.invoice_id', 'clothes.cloth_name', 'invoices.total_value', 'cloth_imgs.img', 'clothes.cost', 'invoice_detail.quantity','invoices.status',
    'customers.avatar','users.name')
            ->leftJoin('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoices.invoice_id')
            ->leftJoin('clothes', 'clothes.cloth_id', '=', 'invoice_detail.cloth_id')
            ->leftJoin('cloth_imgs', 'cloth_imgs.cloth_id', '=', 'clothes.cloth_id')
            ->join('customers', 'customers.cus_id', '=', 'invoices.cus_id')
            ->join('users','users.id', '=', 'customers.user_id')
            ->get();
     
        $customer = customer::where('user_id', $user->id)->first();

        $ordersGrouped = $orders->groupBy('invoice_id');
        $count = DB::table('invoices')->count();

        return view('admin.order_management.index', ['ordersGrouped' => $ordersGrouped, 'count'=> $count]);
   }
   public function adminOrderDetail($invoice_id){

        $invoiceDetails = DB::table('invoice_detail as id')
        ->select('cl.cost', 'id.quantity', 'id.sum_cost', 'cl.cloth_name', 'ci.img')
        ->join('invoices', 'id.invoice_id', '=', 'invoices.invoice_id')
        ->join('clothes as cl', 'cl.cloth_id', '=', 'id.cloth_id')
        ->leftJoin('cloth_imgs as ci', 'ci.cloth_id', '=', 'cl.cloth_id')
        ->where('invoices.invoice_id', '=', $invoice_id)
        ->get();
        
        $info = DB::table('addresses as a')
        ->select('a.address_detail', 'w.name as ward_name', 'd.name as district_name', 'p.name as province_name', 'c.avatar', 'u.name as user_name')
        ->join('districts as d', 'a.district_code', '=', 'd.code')
        ->join('wards as w', 'a.ward_code', '=', 'w.code')
        ->join('provinces as p', 'a.province_code', '=', 'p.code')
        ->join('invoices as i', 'i.address_id', '=', 'a.address_id')
        ->join('customers as c', 'i.cus_id', '=', 'c.cus_id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->where('i.invoice_id', '=', $invoice_id)
        ->first();
        $total_cost = DB::table('invoices')
          ->where('invoices.invoice_id', '=', $invoice_id)
          ->value('invoices.total_value');
        if (!empty($info)){
          return view('admin.order_management.order_detail', ['invoiceDetails' => $invoiceDetails, 'info' => $info, 'invoice_id' => $invoice_id, 'total_cost' => $total_cost]);

          } else {
               return redirect()->route('admin.order_management.index');
          }
}
   public function adminOrderCancelation(){
        return view('admin.order_management.Cancelation');
   }
   public function adminOrderReturn(){
        return view('admin.order_management.Return');
   }

   public function update($id){
          $invoice = Invoice::where('invoice_id', $id);

          if ($invoice->first()->status == 'pending') {
          $invoice->update([
               'status' => 'confirm'
          ]);
          }
          $result = DB::table('clothes as cl')
          ->select('cl.cloth_id', 'id.quantity')
          ->leftJoin('invoice_detail as id', 'id.cloth_id', '=', 'cl.cloth_id')
          ->leftJoin('invoices as iv', 'iv.invoice_id', '=', 'id.invoice_id')
          ->where('iv.invoice_id', $id)
          ->whereNotIn('iv.status', ['waiting', 'cancalled'])
          ->get();
          // dd($result);
          foreach ($result as $row) {
               // Lấy thông tin sản phẩm
               $product = Clothes::where('cloth_id', $row -> cloth_id)->first();
       
               // Cập nhật purchase_quantity
               $newPurchaseQuantity = $product->purchase_quantity + $row->quantity;
               Clothes::where('cloth_id', $row->cloth_id)->update(['purchase_quantity' => $newPurchaseQuantity]);
           }
          

          return redirect('/admin/order_management');
   }
}
