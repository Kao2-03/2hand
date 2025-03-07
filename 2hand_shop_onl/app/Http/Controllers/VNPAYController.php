<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VNPAYController extends Controller
{
    public function vnpay_payment(Request $request){
$data = $request->all();
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost:8000/user/purchase";
$vnp_TmnCode = "7WHNDAPH";//Mã website tại VNPAY 
$vnp_HashSecret = "GVMXRQXUEGKEEAAFBNRHENHLYSFXRHZJ"; //Chuỗi bí mật

$vnp_TxnRef = $data['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = "Thanh toán hóa đơn";
$vnp_OrderType = "2Hand";
$vnp_Amount = $data['total'] * 100;
$vnp_Locale = "VN";
$vnp_BankCode = "NCB";
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
$vnp_Inv_Address=$data['address'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_Inv_Address"=>$vnp_Inv_Address,
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}

$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        DB::table('invoices')
                    ->where('invoice_id', $vnp_TxnRef)
                    ->update([
                        'status' => 'pending',
                        'pay_method' => 'Ví VNPay',
                        'is_pay' => 1,
                        'address_id' => $vnp_Inv_Address,
                        'total_value' => $vnp_Amount,
                        'created_on' => now()->format('Y-m-d H:i:s'),
        ]);
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
        
    }
    
}
    
}
