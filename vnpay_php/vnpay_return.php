<?php 
session_start();
require_once("../model/connect.php");
require_once("../model/userModel.php");
require_once("../model/thanhtoanModel.php");
$userModel = new userModel();
$user = $userModel->get_info_user();
if(is_object($user) == true){
    $user = mysqli_fetch_assoc($user);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Kết quả thanh toán</title>
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/ketquathanhtoan.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/ketquathanhtoan.js"></script>


    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,200;0,700;1,200&family=Comfortaa&family=Encode+Sans+Condensed:wght@400&family=Inter:wght@300&family=Kanit:wght@300&family=Quicksand&family=Raleway:wght@300&family=Righteous&family=Roboto+Condensed:wght@300;400&family=Roboto:wght@300&family=Rubik&family=Titillium+Web:wght@200;400&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">

    <!--thư viện slide-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

   
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        require_once("./layout_site/header.php");
        require_once("./config.php");
        $vnp_SecureHash = isset($_GET['vnp_SecureHash']) ? $_GET['vnp_SecureHash'] : '';
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }    
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
         <div class="wrapper">

            <?php
                if ($secureHash == $vnp_SecureHash) {
                    if ($_GET['vnp_ResponseCode'] == '00') {
                        echo '
                        <div class="success-message active">
                            <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
                                <circle  cx="38" cy="38" r="36"/>
                                <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7"/>
                            </svg>
                            <h1 class="hi">Thanh toán thành công</h1>
                            <div class="content">
                                <p>Cảm ơn quý khách hàng đã tin tưởng </p>
                            <a href="https://localhost/">
                                <button type="button" class="btn btn-outline-success">
                                    Trang Chủ
                                    </button>
                            </a>
                                <a href="http://localhost/user/thongtindonhang">
                                    <button type="button" class="btn btn-outline-danger">
                                    Xem lịch sử
                                    </button>
                                </a>
                            </div>
                        </div>';
                          if(!empty($_SESSION['giohang'])){
                          $hoten = $_SESSION['thongtinthanhtoan']['hoten'];
                          $email = $_SESSION['thongtinthanhtoan']['email'];
                          $sdt = $_SESSION['thongtinthanhtoan']['sdt'];
                          $tinhthanhpho = $_SESSION['thongtinthanhtoan']['tinhthanhpho'];
                          $quanhuyen = $_SESSION['thongtinthanhtoan']['quanhuyen'];
                          $phuongxa = $_SESSION['thongtinthanhtoan']['phuongxa'];
                          $ghichu = $_SESSION['thongtinthanhtoan']['ghichu'];
                          $phivanchuyen = $_SESSION['thongtinthanhtoan']['phivanchuyen'];
                          $diachi = [$phuongxa , $quanhuyen , $tinhthanhpho];
                          $diachi = implode( ' - ' , $diachi);

                          $products = [];
                          if(!empty($_SESSION['giohang'])){
                                foreach($_SESSION['giohang'] as $item){
                                    $thanhtien = $item['Gia'] * $item['SoLuong'];
                                    $obj = [];
                                    $obj['name'] = $item['TenSP'] . ' - ' .$item['MauSac'] . ' - Size ' . $item['TenSize'] ;
                                    $obj['weight'] = 0.3;
                                    $obj['quantity'] = $item['SoLuong'];
                                    $obj['product_code'] = mt_rand();
                                    array_push($products , $obj);
                                }
                                }
                                $idDonHang = mt_rand();
                                $obj_order = [
                                        "id" => "$idDonHang",
                                        "pick_name" => "Trần Minh Cường",
                                        "pick_address"=>"Hẽm 119",
                                        "pick_province"=> "TP Hồ Chí Minh",
                                        "pick_district"=> "Quận 12",
                                        "pick_ward"=> "Phường Tân Thới Hiệp",
                                        "pick_tel"=> "0329497489",
                                        "tel"=> "$sdt",
                                        "name"=> "$hoten",
                                        "address"=> "$phuongxa",
                                        "province"=> "$tinhthanhpho",
                                        "district"=> "$quanhuyen",
                                        "ward"=> "$phuongxa",
                                        "street"=> "$phuongxa",
                                        "hamlet"=> "$phuongxa",
                                        "email"=> "$email",
                                        "pick_money"=> 0,
                                        "is_freeship" => 1,
                                        "note"=> "Khối lượng tính cước tối đa: 1.00 kg",
                                        "value"=> 1,
                                        "transport"=> "road",
                                        "pick_option"=>"cod",      
                                        "deliver_option" => "none",  
                                        "tags"=> ["Dễ vỡ"],
                                        "return_name"=> "Trần Minh Cường",
                                        "return_address"=> "Hẽm 119",
                                        "return_province"=> "TP Hồ Chí Minh",
                                        "return_district"=> "Quận 12",
                                        "return_tel"=> "0329497489",
                                        "return_email"=> "cuongtmps17955@gmail.com"
                            ];
                            $obj_order = (object) $obj_order;

                            $order = json_encode((object)[ "products"=>$products , "order"=>$obj_order]);
                            
                            $curl = curl_init();       
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/order",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => $order,
                                CURLOPT_HTTPHEADER => array(
                                    "Content-Type: application/json",
                                    "Token: ",
                                    "Content-Length: " . strlen($order),
                                ),
                            ));
                            
                            $response = curl_exec($curl);
                            curl_close($curl);
                            $response = json_decode($response);
                            if($response->success == true){
                                $MaHoaDon_vnpay = $_GET['vnp_Amount'];
                                $idNguoiDung = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
                                $label_id = $response->order->label;
                                $partner_id = $response->order->partner_id;
                                $thanhtoanModel = new thanhtoanModel();
                                $thanhtoanModel->set_size();
                                $thanhtoanModel->donhang_online( $label_id , $partner_id ,$MaHoaDon_vnpay,$tongtien , $hoten, $diachi , $sdt , $phivanchuyen , $ghichu , $idNguoiDung);       
                            }           
                       }
                    } else {
                        echo 
                        '
                        <div class="success-message active">
                        
                        <h1 class="hi" style="color:#dc3545">Giao dịch thất bại!</h1>
                        <div class="content">
                            <p >Vui lòng kiểm tra lại thông tin</p>
                           <a href="https://localhost/thanhtoan">
                                <button type="button" class="btn btn-outline-danger">
                                   Trở về trang thanh toán  
                                </button>
                           </a>
                        </div>
                    </div>     
                        ';
                    }
                } 

                if(isset($_SESSION['tienmat_sucess']) && $_SESSION['tienmat_sucess'] == 1){
                    unset($_SESSION['tienmat_sucess']);
                    echo '
                        <div class="success-message active">
                            <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
                                <circle  cx="38" cy="38" r="36"/>
                                <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7"/>
                            </svg>
                            <h1 class="hi">Tạo đơn hàng thành công.</h1>
                            <div class="content">
                                <p>Cảm ơn quý khách hàng đã tin tưởng </p>
                            <a href="https://localhost/">
                                <button type="button" class="btn btn-outline-success">
                                    Trang Chủ
                                    </button>
                            </a>
                                <a href="http://localhost/user/thongtindonhang">
                                    <button type="button" class="btn btn-outline-danger">
                                    Xem lịch sử
                                    </button>
                                </a>
                            </div>
                    </div>';
                }

            ?>
           
         </div>
         
            <?php
             require_once("./layout_site/footer.php");       
             ?>
        </div>  
    </body>
</html>
