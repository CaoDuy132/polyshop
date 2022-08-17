
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Thanh toán</title>
     <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/thanhtoan.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="/wiew/public/js/danhmucsp.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/thanhtoan.js"></script>


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
      <div class="container-fluid" style=" margin:0; padding:0;">
           <?php require_once './wiew/layout_site/header.php'; ?>
           <?php require_once('./vnpay_php/config.php') ?>
           <?php
            if(isset($_SESSION['id_user'])){
                 echo "<script> sessionStorage['check_login'] = 'true' ; console.log(sessionStorage['check_login']) </script>";
            }else{
                echo "<script> sessionStorage['check_login'] = 'false' ; console.log(sessionStorage['check_login']) </script>";
            }
             
           ?>
           
           <!-- /vnpay_php/vnpay_create_payment.php -->
           <form class="content-thanhtoan"  action="/vnpay_php/vnpay_create_payment.php" id="form-thanhtoan" method="post" onsubmit="return false">
                <div class="left">
                     <div class="tieude">
                          <h1>THÔNG TIN THANH TOÁN</h1>
                     </div>
                     <div style="margin-top: 1.5em;">
                          <label for="">Họ tên *</label>
                          <input id="hoten" class="form-input" type="text"  autocomplete="off" >
                          <p class="vld" id="vld-hoten"></p>
                     </div>
                     <div class="diachi">
                         <label  for="">Tỉnh / thành phố *</label>
                         <div class="box-timkiem-tinhthanhpho">
                               <div class="tieude show-tinhthanhpho">
                                     <p id="thanhpho">Vui lòng chọn tỉnh/thành phố</p>
                                     <i class="fas fa-angle-down"></i>
                               </div>
                              <div class="content">
                                   <input type="text" id="timkiem-tinhthanhpho" placeholder="Tìm kiếm..." autocomplete="off">
                                   <ul id="list-thanhpho">
                                        
                                   </ul>
                              </div>
                         </div>
                         <p class="vld" id="vld-tinhthanhpho" style="bottom: -22px;"></p>
                     </div>
                     <div class="diachi">
                         <label  for="">Quận / huyện *</label>
                         <div class="box-timkiem-quanhuyen">
                               <div class="tieude show-quanhuyen">
                                     <p id="quanhuyen">Vui lòng chọn quận/huyện</p>
                                     <i class="fas fa-angle-down"></i>
                               </div>
                              <div class="content">
                                   <input type="text" id="timkiem-quanhuyen" placeholder="Tìm kiếm..." autocomplete="off">
                                   <ul id="list-quanhuyen">
                                       
                                   </ul>
                              </div>
                         </div>
                         <p class="vld" id="vld-quanhuyen" style="bottom: -22px;"></p>
                     </div>
                     <div class="diachi">
                         <label  for="">Phường / xã *</label>
                         <div class="box-timkiem-phuongxa">
                               <div class="tieude show-phuongxa">
                                     <p id="phuongxa">Vui lòng chọn phường/xã</p>
                                     <i class="fas fa-angle-down"></i>
                               </div>
                              <div class="content">
                                   <input type="text" id="timkiem-phuongxa" placeholder="Tìm kiếm..." autocomplete="off">
                                   <ul id="list-phuongxa">          
                                   </ul>
                              </div>
                         </div>
                         <p class="vld" id="vld-phuongxa" style="bottom: -22px;"></p>
                     </div>
                     <div>    
                         <label for="">SDT *</label>
                         <input id="sdt" class="form-input"  type="text" id="sdt" autocomplete="off" >
                         <p class="vld" id="vld-sdt"></p>
                     </div>
                     <div>
                         <label for="">Email *</label>
                         <input id="email" class="form-input"  type="text" id="email" autocomplete="off">
                         <p class="vld" id="vld-email"></p>
                     </div>
                     <div>
                         <label for="">Thông tin khác *</label>
                         <textarea name="" id="ghichu" cols="30" rows="10" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay địa chỉ giao hàng chi tiết hơn"></textarea>
                     </div>

                </div>
                <div class="right">
                    <h1 class="tieude">ĐƠN HÀNG CỦA BẠN</h1>
                    <div class="top">
                         <h1>SẢN PHẨM</h1>
                         <h1>TẠM TÍNH</h1>
                    </div>
                    <div class="main">
                         <ul>
                              <!-- <li>
                                 <img src="https://hidanz.com/wp-content/uploads/2021/06/1-5.jpg" alt="">
                                 <p class="tensp">Áo Polo Cotton Mix Color - White x Dark Blue <span class="x"></span><span>Size S x 2</span></p>
                                 <p class="giasp">700.000 VNĐ</p>
                             </li> -->
                         
                             <?php
                                $tongtien = 0;
                                if(!empty($_SESSION['giohang'])){
                                     foreach($_SESSION['giohang'] as $item){
                                          $tamtinh = $item['Gia'] * $item['SoLuong'];
                                          $tongtien += $tamtinh;
                                          echo 
                                          '<li>
                                              <div class="box-left"> 
                                                  <img src="/wiew/public/upload/'.$item['HinhAnh'].'" alt="">
                                                  <p class="tensp">'.$item['TenSP'].' - '.$item['MauSac'].'<span class="x"></span><span>Size '.$item['TenSize'].' x '.$item['SoLuong'].'</span></p>
                                              </div>
                                              <p class="giasp">'.number_format($tamtinh).' VNĐ</p>
                                          </li>';
                                     }
                                }
                             ?>
                         </ul>
                         <div class="tamtinh">
                             <p>Tạm tính</p>
                             <p id="TamTinhDonHang" data-price="<?php echo $tongtien; ?>"><?php echo number_format($tongtien) . ' VNĐ';  ?></p>
                         </div>
                         <div class="hinhthucgiaohang">
                             <p>Giao Hàng</p>
                             <p id="phivanchuyen">Chưa cập nhật</p>
                         </div>
                         <div class="tong">
                             <p>Tổng</p>
                             <p id="TongThanhTienDonHang" data-price="<?php echo $tongtien ?>">...</p>
                         </div>
                    </div>
                    <div class="bot">
                           <div class="box">
                               <div>
                                    <input class="radio" id="tienmat" type="radio" name="hinhthucthanhtoan" value="tienmat" checked>
                                    <label  for="tienmat">Trả tiền mặt khi nhận hàng</label>
                               </div>
                               <div id="text-tienmat">
                                    <p>Trả tiền mặt khi giao hàng</p>
                               </div>
                           </div>
                           <div class="box">
                               <div>
                                    <input class="radio" id="thanhtoanonline" type="radio" name="hinhthucthanhtoan" value="online">
                                    <label for="thanhtoanonline">Chuyển khoản ngân hàng</label>
                               </div>
                               <div style="border-bottom: none;display: none;" id="chuyenkhoan">
                                    <p>
                                       Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi.
                                       Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán.
                                       Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.
                                    </p>
                               </div>
                           </div>
                           <div>
                                <input id="price-vnpay" type="hidden" value="200000" name="amount">
                                <input type="hidden" value="<?php echo mt_rand() ?>" name="order_id">
                                <input class="form-control" id="txtexpire"name="txtexpire" type="hidden" value="<?php echo $expire; ?>"/>
                                <input type="submit" name="redirect" id="submit-thanhtoan" value="ĐẶT HÀNG">
                           </div>
                          
                    </div>
                </div>
           </form>
           <?php require_once './wiew/layout_site/footer.php'; ?>
      </div>
</body>
</html>