<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Giỏ hàng</title>
     <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/giohang.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.js" integrity="sha512-ZewoOcnKwYlbLtvwOHyviu/wr3HeGa53p2HEwZBdCscAsQVnwbZZzLfaE2aDVmAJ7lzjujxKL2SgdP8uj69q7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/giohang.js"></script>


    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,200;0,700;1,200&family=Comfortaa&family=Encode+Sans+Condensed:wght@400&family=Inter:wght@300&family=Kanit:wght@300&family=Quicksand&family=Raleway:wght@300&family=Righteous&family=Roboto+Condensed:wght@300;400&family=Roboto:wght@300&family=Rubik&family=Titillium+Web:wght@200;400&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">

    <!--thư viện slide-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
     <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">


</head>
    <body>
        <div class="container-fluid" style=" margin:0; padding:0;">
           <?php require_once './wiew/layout_site/header.php'; ?>

             <div class="content">
                   <div class="top">
                        <h1>GIỎ HÀNG</h1>
                   </div>
                        <?php
                            if(isset($_SESSION['cart']) && $_SESSION['cart'] != ''){
                                echo '<h1 class="new-cart"><i class="fas fa-check"></i> “'.$_SESSION['cart'].'” đã được thêm vào giỏ hàng.</h1>';
                                $_SESSION['cart'] = '';
                            }
                        ?>
                   
                   <div class="main">   
                        <div class="left">
                              <div class="top">
                                   <h1 class="sp">SẢN PHẨM</h1>
                                   <h1 class="gia">GIÁ</h1>
                                   <h1 class="soluong">SỐ LƯỢNG</h1>
                                   <h1 class="tamtinh">TẠM TÍNH</h1>
                              </div>
                              <div class="bot">
                                    <ul id="card-loaded">
                                        <?php 
                                            if(!empty($_SESSION['giohang'])){
                                                 foreach($_SESSION['giohang'] as $item){
                                                     $tamtinh = $item['Gia'] * $item['SoLuong'];
                                                     echo 
                                                     '<li>
                                                            <span id="'.$item['id'].'" class="xoa">X</span>
                                                            <img src="/wiew/public/upload/'.$item['HinhAnh'].'" alt="">
                                                            <div class="box-thongtinsp">
                                                                 <p class="tensp">'.$item['TenSP'].' - '.$item['MauSac'].'</p>
                                                                 <p class="size">Size : '.$item['TenSize'].'</p>
                                                            </div>
                                                            <div class="right">
                                                                 <p class="giasp">'.number_format($item['Gia']).' VND</p>
                                                                 <span id="'.$item['id'].'" class="btn-tru">-</span>
                                                                 <input type="number" value="'.$item['SoLuong'].'" disabled>
                                                                 <span id="'.$item['id'].'" class="btn-cong">+</span>
                                                                 <p class="tamtinh">'.number_format($tamtinh).' VND</p>
                                                            </div>
                                                     </li>';
                                                 }
                                            }                     
                                        ?>
                                      
                                    </ul>
                              </div>
                        </div>
                        <div class="right">
                                <div class="top">
                                   <h1 class="sp">CỘNG GIỎ HÀNG</h1>
                               </div>
                               <div class="bot">
                                    <div class="tamtinh">
                                         <p>Tạm tính</p>
                                         <p id="TamTinh" style="font-weight: 700; font-size: 90%;" ></p>
                                    </div>
                                    <div class="rate">
                                         <p>Flat rate : <span style="font-weight: 700;">0.000 VND</span> </p>
                                         
                                    </div>
                                    <div class="hinhthuc">
                                         <p>Giao hàng</p>
                                         <p>Tùy chọn trong quá trình thanh toán.</p>
                                    </div>
                                    <!-- <div class="tinhphi" style="border-bottom: 1px solid rgb(230, 230, 230);padding-bottom: 5px;">
                                         <p>Tính phí giao hàng</p>
                                    </div> -->
                                    <div class="tong" >
                                         <p>Tổng</p>
                                         <p id="TongTien" style="font-weight: 700;"></p>
                                    </div>
                                    <div class="tienhanhthanhtoan">
                                        <a href="thanhtoan">TIẾN HÀNH THANH TOÁN</a>
                                    </div>
                               </div>
                        </div>
                   </div>
             </div>
             <?php require_once './wiew/layout_site/footer.php'; ?>
        </div>
    </body>
</html>