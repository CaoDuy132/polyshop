<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Danh mục sản phẩm</title>
     <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/danhmucsp.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="/wiew/public/js/danhmucsp.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/muahang.js"></script>


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
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">


</head>
<body>
     <div class="container-site">
          <?php require_once './wiew/layout_site/header.php'; ?>
          <section class="menu-back">
               <div class="content">
                    <a href=""><p>Trang chủ</p></a>
                    <span>/</span>
                    <a href=""><p>Danh mục</p></a>
                    <span>/</span>
                    <a href=""><p>Tất cả sản phẩm</p></a>
               </div>
          </section>
          <main class="main">
                <div class="left">
                     <div class="box-danhmuc">
                           <div class="title">
                                <h1>DANH MỤC</h1>
                                <i class="fas fa-angle-down show-sub-danhmuc"></i>
                           </div>
                           <div class="content">
                                <ul>
                                     <li>
                                         <div class="top">
                                            <a href="javascrip:">Thời trang nam</a>
                                            <i class="fas fa-angle-down show-sub-danhmuc"></i>
                                         </div>
                                         <ul class="sub-menu">
                                               <li><a href="sanpham/ao-polo-nam">Áo polo nam</a></li>
                                               <li><a href="sanpham/ao-so-mi-nam">Áo sơmi nam</a></li>
                                               <li><a href="sanpham/quan-tay-nam">Quần tây nam</a></li>
                                         </ul>
                                     </li> 
                                     <li>
                                         <div class="top">
                                            <a href="javascrip:">Thời trang nữ</a>
                                            <i class="fas fa-angle-down show-sub-danhmuc"></i>
                                         </div>
                                         <ul class="sub-menu">
                                               <li><a href="sanpham/ao-polo-nu">Áo polo nữ</a></li>
                                               <li><a href="sanpham/quan-au-nu">Quần âu nữ</a></li>
                                         </ul>
                                     </li>  
                                     <li><a href="sanpham/giam-gia">Sản phẩm giảm giá</a></li>         
                                </ul>
                           </div>
                     </div>
                    
                     <div class="box-danhmuc">
                           <div class="title">
                                <h1>MÀU SẮC</h1>
                                <i class="fas fa-angle-down show-sub-danhmuc"></i>
                           </div>
                           <div class="content list-mausac">
                                 <ul>
                                    <li>           
                                        <input class="input-checkbox" id="den" value="đen" type="checkbox">
                                        <label class="show-sanpham-color" data-color="đen" for="den">Đen<span style="background-color: black;"></span></label>
                                   </li>
                                   <li>           
                                        <input class="input-checkbox" id="trang" value="trắng" type="checkbox">
                                        <label class="show-sanpham-color" data-color="trắng" for="trang">Trắng<span style="background-color: rgb(226, 225, 225);"></span></label>
                                   </li>
                                   <li>           
                                        <input class="input-checkbox" id="do" value="đỏ" type="checkbox">
                                        <label class="show-sanpham-color" data-color="đỏ" for="do">Đỏ<span style="background-color:#b80a0d;"></span></label>
                                   </li>
                                   <li>           
                                        <input class="input-checkbox" id="vang" value="vàng" type="checkbox">
                                        <label class="show-sanpham-color" data-color="vàng" for="vang">Vàng<span style="background-color:yellow;"></span></label>
                                   </li>
                                   <li>           
                                        <input class="input-checkbox" id="cam" value="cam" type="checkbox">
                                        <label class="show-sanpham-color" data-color="cam" for="cam">Cam<span style="background-color:orange;"></span></label>
                                   </li>
                                   <li>           
                                        <input class="input-checkbox" id="xanh" value="xanh" type="checkbox">
                                        <label class="show-sanpham-color" data-color="xanh "  for="xanh">Xanh<span  style="background-color:rgb(36, 81, 99);"></span></label>
                                   </li>
                                 </ul>
                           </div>
                     </div>
                     <div class="box-danhmuc">
                           <div class="title">
                                <h1>KÍCH THƯỚC</h1>
                                <i class="fas fa-angle-down show-sub-danhmuc"></i>
                           </div>
                           <div class="content list-size">
                                 <ul>
                                       <li>
                                           <input id="s" type="radio" name="size">
                                           <label class="show-sanpham-size" data-size="s" for="s"><div><span></span></div>Size S</label>
                                      </li>
                                       <li>
                                            <input id="m" type="radio" name="size">
                                            <label class="show-sanpham-size" data-size="m" for="m"><div><span></span></div>Size M</label>
                                       </li>
                                       <li>
                                           <input id="x" type="radio" name="size">
                                           <label class="show-sanpham-size" data-size="l" for="x"><div><span></span></div>Size L</label>
                                      </li>
                                       <li>
                                            <input id="xl" type="radio" name="size">
                                            <label class="show-sanpham-size" data-size="xl" for="xl"><div><span></span></div>Size XL</label>
                                       </li>
                                 </ul>
                           </div>
                     </div>
                     <div class="box-danhmuc">
                           <div class="title">
                                <h1>GIÁ SẢN PHẨM</h1>
                                <i class="fas fa-angle-down show-sub-danhmuc"></i>
                           </div>
                           <div class="content" style="display: flex;flex-direction: column;align-items: center;justify-content: center;">
                                <div class="box-input-range">
                                      <div class="box-thumb">
                                           <i class="value-input"></i>
                                           <span id="thumb-left"></span>
                                           <span id="thumb-right"></span>
                                      </div>
                                      <input id="range-left" type="range" min="0" max="1000000" value="0" step="10000">
                                      <input id="range-right" type="range" min="0" max="1000000" value="1000000" step="10000">
                                      <div class="bot">
                                          <button id="btn-loc-gia" class="btn-loc">Lọc</button>
                                          <p>Từ<span style="margin-left: 5px;" id="Gia-BatDau">0đ</span> <span>-</span> <span id="Gia-KetThuc">1.000.000đ</span></p>
                                      </div>
                                </div>
                           </div>
                     </div>
                </div>
                <div class="right">
                      <div class="top">
                            <p id="show_soluongsp_hienthi">Hiển thị 1-9 của 12 sản phẩm</p>
                           <select name="tieuchi" id="tieuchi">
                                 <option selected value="macdinh">Theo thứ tự mặc định</option>
                                 <option value="giaAZ">Theo giá từ A-Z</option>
                                 <option value="giaZA">Theo giá từ Z-A</option>
                                 <option value="luotmua">Theo lượt mua</option>
                                 <option value="luotxem">Theo Lượt Xem</option>
                           </select>
                      </div>
                      <div class="content">
                      <section id="load">
                         <div class="loader loader-1">
                              <div class="loader-outter"></div>
                              <div class="loader-inner"></div>
                         </div>
                     </section>
                            <!-- <div class="box-item">
                                        <div class="box-img">
                                             <a href=""><img src="https://product.hstatic.net/200000276673/product/1_4934a58e584f439a838bfdfd3034e89b_grande.jpg" alt=""></a>
                                             <span class="giamgia">25%</span>
                                             <div class="action">
                                                  <button>THÊM VÀO GIỎ</button>
                                                  <button>MUA NGAY</button>
                                             </div>
                                        </div>
                                   <a href="">
                                        <div class="box-text">
                                             <p class="tensp">Áo thun nam cổ tròn tay ngắn Just For</p>
                                             <div class="gia">
                                                  <p>350.000đ</p>
                                                  <p class="giakm"><strike>350.000đ</strike></p>
                                             </div>
                                        </div>
                                   </a>
                            </div> -->
                            <?php
                                if(is_object($data['sanpham']) == true && $data['sanpham']->num_rows > 0){
                                    foreach($data['sanpham'] as $item){
                                         $giakm = ($item['Gia'] / 100) * (100 - $item['PhanTramKhuyenMai']);
                                         echo '
                                            <div class="box-item">
                                                  <div class="box-img">
                                                       <a href="chitietsanpham/'.$item['idSP'].'"><img src="/wiew/public/upload/'.$item['AnhDaiDien'].'" alt=""></a>';
                                                      if($item['PhanTramKhuyenMai'] > 0){
                                                           echo '<span class="giamgia">-'.$item['PhanTramKhuyenMai'].'%</span>';
                                                      }
                                                  echo '
                                                       <div class="action">
                                                            <button data-id="'.$item['idSP'].'" class="themvaogio">THÊM VÀO GIỎ</button>
                                                            <button data-id="'.$item['idSP'].'" class="muangay">MUA NGAY</button>
                                                       </div>
                                                  </div>
                                              <a href="chitietsanpham/'.$item['idSP'].'">
                                                  <div class="box-text">
                                                       <p class="tensp">'.$item['TenSP'].'</p>
                                                       <div class="gia">
                                                            <p>'.number_format($item['Gia']).'đ</p>';
                                                       if($item['PhanTramKhuyenMai'] > 0){
                                                            echo '<p class="giakm"><strike>350.000đ</strike></p>';
                                                       }
                                                       echo '     
                                                       </div>
                                                  </div>
                                             </a>
                                           </div>';
                                    }
                                }
                            ?>
                      </div>
                      <div class="box-btn">
                           <!-- <span class="btn-phantrang" data-page="1">1</span>
                           <span class="btn-phantrang">2</span>
                           <span class="btn-phantrang">3</span> -->
                      </div>
                </div>
          </main>
          <?php require_once './wiew/layout_site/footer.php'; ?>
     </div>
</body>
</html>