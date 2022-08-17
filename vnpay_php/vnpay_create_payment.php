<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

/**
 * Description of vnpay_ajax
 *
 * @author xonv
 */
require_once("./config.php");

$vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = isset($_POST['order_desc']) ? $_POST['order_desc'] : "Thanh toán đơn hàng online";
// $vnp_OrderType = $_POST['order_type'];
$vnp_Amount = $_POST['amount'] * 100;
$vnp_Locale = isset($_POST['language']) ? $_POST['language'] : 'vn';
$vnp_BankCode = isset($_POST['bank_code']) ? $_POST['bank_code'] : '';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
$vnp_ExpireDate = $_POST['txtexpire'];
//Billing
$vnp_Bill_Mobile = isset($_POST['txt_billing_mobile']) ? $_POST['txt_billing_mobile'] : "0329497489" ;
$vnp_Bill_Email = isset($_POST['txt_billing_email']) ? $_POST['txt_billing_email'] : 'cuongtmps17955@gmail.com';
$fullName =  isset($_POST['txt_billing_fullname']) ? trim($_POST['txt_billing_fullname']) : 'Trần Minh Cường';
if (isset($fullName) && trim($fullName) != '') {
    $name = explode(' ', $fullName);
    $vnp_Bill_FirstName = array_shift($name);
    $vnp_Bill_LastName = array_pop($name);
}
$vnp_Bill_Address= isset($_POST['txt_inv_addr1']) ? $_POST['txt_inv_addr1'] : "Phường Nguyễn Trung Trực";
$vnp_Bill_City= isset($_POST['txt_bill_city']) ? $_POST['txt_bill_city'] : "Thành phố Hồ Chí Minh";
$vnp_Bill_Country= isset($_POST['txt_bill_country']) ? $_POST['txt_bill_country'] : "VN";
$vnp_Bill_State= "";
// Invoice
$vnp_Inv_Phone= isset($_POST['txt_inv_mobile']) ? $_POST['txt_inv_mobile'] : "0329497489";
$vnp_Inv_Email= isset($_POST['txt_inv_email']) ? $_POST['txt_inv_email'] : "cuongtmps17955@gmail.com";
$vnp_Inv_Customer= isset($_POST['txt_inv_customer']) ? $_POST['txt_inv_customer'] : "Trần Minh Cường";
$vnp_Inv_Address= isset($_POST['txt_inv_addr1']) ? $_POST['txt_inv_addr1'] : "Phường Nguyễn Trung Trực";
$vnp_Inv_Company= isset($_POST['txt_inv_company']) ? $_POST['txt_inv_company'] : "F.Fashion";
$vnp_Inv_Taxcode= isset($_POST['txt_inv_taxcode']) ? $_POST['txt_inv_taxcode'] : "0102182292";
$vnp_Inv_Type= isset($_POST['cbo_inv_type']) ? $_POST['cbo_inv_type'] : "I";
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
    // "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate"=>$vnp_ExpireDate,
    "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
    "vnp_Bill_Email"=>$vnp_Bill_Email,
    "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
    "vnp_Bill_LastName"=>$vnp_Bill_LastName,
    "vnp_Bill_Address"=>$vnp_Bill_Address,
    "vnp_Bill_City"=>$vnp_Bill_City,
    "vnp_Bill_Country"=>$vnp_Bill_Country,
    "vnp_Inv_Phone"=>$vnp_Inv_Phone,
    "vnp_Inv_Email"=>$vnp_Inv_Email,
    "vnp_Inv_Customer"=>$vnp_Inv_Customer,
    "vnp_Inv_Address"=>$vnp_Inv_Address,
    "vnp_Inv_Company"=>$vnp_Inv_Company,
    "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
    "vnp_Inv_Type"=>$vnp_Inv_Type
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
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
