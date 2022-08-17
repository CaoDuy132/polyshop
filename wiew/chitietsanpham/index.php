<?php  $sanpham = mysqli_fetch_assoc($data['sanpham']);  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Chi tiết sản phẩm</title>
     <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/trangchu.css">
    <link rel="stylesheet" href="/wiew/public/css/chitietsanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.js" integrity="sha512-ZewoOcnKwYlbLtvwOHyviu/wr3HeGa53p2HEwZBdCscAsQVnwbZZzLfaE2aDVmAJ7lzjujxKL2SgdP8uj69q7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script type="module" src="/wiew/public/js/chitietsanpham.js"></script>
    <script src="/wiew/public/js/binhluan.js"></script>
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
    
     <!-- sweetalert2 -->
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
                    <a href=""><p><?php echo $sanpham['TenSP'] ?></p></a>
               </div>
          </section>
          <main class="main">
                <div class="box-left">
                     <div class="box-anhdaidien">
                          <img id="img-zoom"  src="<?php echo '/wiew/public/upload/'.$sanpham['AnhDaiDien'].''; ?>"  data-zoom-image="<?php echo '/wiew/public/upload/'.$sanpham['AnhDaiDien'].''; ?>" alt="">
                     </div>
                     <div class="box-anhmota" id="box-anhmota">
                         <!-- <a class="item" href="#" data-image="https://localhost/wiew/public/upload/apn3890_nav__4_.jpg" data-zoom-image="https://localhost/wiew/public/upload/apn3890_nav__4_.jpg">
                             <img id="img_01" src="https://localhost/wiew/public/upload/apn3890_nav__4_.jpg" />
                         </a> -->
                         <?php 
                             $list_anhmota = explode('&' , $sanpham['AnhMoTa']);
                             echo 
                              '<a class="item" href="#" data-image="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'" data-zoom-image="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'">
                                    <img id="img_01" src="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'" />
                              </a>';
                             foreach($list_anhmota as $item){
                                  if($item == $sanpham['AnhDaiDien']) continue;
                                  echo 
                                  '<a class="item" href="#" data-image="/wiew/public/upload/'.$item.'" data-zoom-image="/wiew/public/upload/'.$item.'">
                                        <img id="img_01" src="/wiew/public/upload/'.$item.'" />
                                  </a>';
                             }

                         ?>          
                     </div>
                </div>
                <div class="box-right">
                      <div class="wrapper-top">
                         <div class="tensp">
                              <h1><?php  echo $sanpham['TenSP'] ?></h1>
                         </div>
                         <div class="box-gia">
                              <div class="gia">
                                   <p>
                                       <?php 
                                           if($sanpham['PhanTramKhuyenMai'] > 0){
                                                $giakm = ($sanpham['Gia'] / 100) * (100 - $sanpham['PhanTramKhuyenMai']) ;
                                                echo number_format($giakm).' ₫';
                                           }else{
                                                echo number_format($sanpham['Gia']).' ₫';
                                           }
                                       ?>
                                   </p>
                                   <p style="font-size: 75%;">
                                        <?php
                                            if($sanpham['PhanTramKhuyenMai'] > 0){
                                                 echo '<strike>'.number_format($sanpham['Gia']).' ₫</strike>';
                                            }
                                        ?> 
                                   </p>   
                              </div>
                              <div>
                                  <p class="SoLuongSize"></p>
                             </div>
                         </div>
                        
                         <div class="LuotDanhGia">
                              <?php
                                  $danhgia = mysqli_fetch_assoc($data['danhgia']);
                                  if($danhgia != null && $danhgia['TongSaoDanhGia'] > 0){
                                        $TrungBinhSao = $danhgia['TongSaoDanhGia'] / $danhgia['LuotDanhGia'];
                                        $SoLuongSaoChan = floor($TrungBinhSao);
                                        for($i = 0; $i<$SoLuongSaoChan; $i++){
                                            echo '<img src="/wiew/public/upload/danhgia100.ico" alt="">';
                                        }

                                        $SoLuongSaoLe = ceil($TrungBinhSao - $SoLuongSaoChan);
                                        if($SoLuongSaoLe > 0){
                                             echo '<img src="/wiew/public/upload/danhgia50.ico" alt="">';
                                        }

                                        $SaoConLai = 5 - ceil($TrungBinhSao);
                                        for($i = 0; $i<$SaoConLai; $i++){
                                             echo '<img src="/wiew/public/upload/chuadanhgia.ico" alt="">';
                                        }
                                  }
                                 else{
                                        for($i = 0; $i<5; $i++){
                                             echo '<img src="/wiew/public/upload/chuadanhgia.ico" alt="">';
                                        }
                                  }
                              ?>
                              <p>
                              <?php 
                                   if($danhgia != null && $danhgia['TongSaoDanhGia'] > 0) {
                                        echo '(' . $danhgia['LuotDanhGia'] . ')';
                                   }else{
                                        echo '(0)';
                                   } 
                              ?> đánh giá</p> 

                               <!-- <img src="/wiew/public/upload/danhgia100.ico" alt="">
                              <img src="/wiew/public/upload/danhgia100.ico" alt="">
                              <img src="/wiew/public/upload/danhgia100.ico" alt="">
                              <img src="/wiew/public/upload/danhgia100.ico" alt="">
                              <img src="/wiew/public/upload/danhgia100.ico" alt=""> -->
                         </div>
                      </div>
                      <div class="wrapper-mid">
                              <div class="tenmau">
                                   <p>Màu sắc : <span id="TenMau"><?php echo $sanpham['MauSac'] ?></span></p>        
                                    <?php echo '<script>  sessionStorage["idCTSP_default"] = "'.$sanpham['idCTSP'].'";console.log( sessionStorage["idCTSP_default"])</script>'?>
                              </div>
                              <div class="list-color">
                                   <?php 
                                        foreach($data['list_color'] as $item){
                                             echo '<div data-id="'.$item['idCTSP'].'" data-tenmau="'.$item['MauSac'].'" class="item-color"><span style="background-color: '.$item['MaMau'].';"></span></div>';
                                        }    
                                   ?>
                                   <!-- <div class="item-color"><span></span></div>
                                   <div class="item-color"><span></span></div>
                                   <div class="item-color"><span></span></div>                 -->
                              </div>
                              <div class="tenmau">
                                   <p>Kích thước : <span id="TenSize"></span></p>
                              </div>
                              <div class="wrapper-size">
                                   <div class="list-size">
                                             <!-- <div class="item-size">S</div>
                                             <div class="item-size">M</div>
                                             <div class="item-size">L</div>
                                             <div class="item-size">XL</div> -->
                                             <?php 
                                             foreach($data['list_size'] as $item){     
                                                  echo '<div class="item-size" data-id="'.$item['idSize'].'" data-size="'.$item['TenSize'].'">'.$item['TenSize'].'</div>';
                                             }
                                             ?>
                                   </div>
                                   <p class="themvaogio-erro">Hãy chọn size cho sản phẩm!</p>  
                              </div>                         
                      </div>
                     <div class="ChonSoLuong">
                           <form action="" onsubmit="return false">
                               <div class="action">
                                   <span id="GiamSL">-</span>
                                   <input id="SLSP" type="number" value="1">
                                   <span id="TangSL">+</span>
                               </div>    
                           </form>
                           <button id="ThemVaoGio">THÊM VÀO GIỎ</button>
                           <!-- <button>MUA NGAY</button> -->
                     </div>
                     <div class="mota">
                            <div class="tieude">
                                 <i class="fas fa-chevron-up"></i>
                                 <h5>Mô tả sản phẩm</h5>
                                
                            </div>
                            <div class="content">
                                 <?php echo $sanpham['MoTa'] ?>
                            </div>
                     </div>
                </div>
          </main>
          <section class="DanhGiaSP">
                <div class="action">
                      <button class="btn-show-action button-active" action="danhgia">ĐÁNH GIÁ</button>
                      <button class="btn-show-action show-action-top" action="binhluan">BÌNH LUẬN</button>
                </div>
                <div class="sao-action">
                      <div class="top">
                              <h5 class="tieude">Bạn đánh giá sản phẩm thế nào?</h5>
                              <div class="noidung">
                                   <div>
                                        <h5 class="trang-thai-vote"></h5>
                                   </div>
                                   <div class="list-sao-vote">
                                        <img class="sao-item" data-index="1" data-idSanPham ="<?php echo $sanpham['idSP'] ?>" data-dangthai="Tệ" src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img class="sao-item" data-index="2" data-idSanPham ="<?php echo $sanpham['idSP'] ?>" data-dangthai="Tạm ổn" src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img class="sao-item" data-index="3" data-idSanPham ="<?php echo $sanpham['idSP'] ?>" data-dangthai="Khá" src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img class="sao-item" data-index="4" data-idSanPham ="<?php echo $sanpham['idSP'] ?>" data-dangthai="Tốt" src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img class="sao-item" data-index="5" data-idSanPham ="<?php echo $sanpham['idSP'] ?>" data-dangthai="Xuất sắc" src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                   </div>
                              </div>
                      </div>
                      <div class="bot">
                            <button id="gui-danh-gia">Gửi đánh giá</button>
                      </div>
                </div>
                 <div class="binhluan-action">
                       <h5 class="tieude" >Tất cả bình luận về sản phẩm.</h5>
                       <div class="content" id="list-bl">
                             <?php
                                $list = [];
                                foreach($data['binhluan'] as $item){
                                   array_push($list , $item);
                                }
                                if(empty($list)){
                                     echo '<p class="binhluan-trong" >Chưa có bình luận nào cho sản phẩm này.</p>';
                                }
                                function menu($List , $parentID){   
                                    echo '<ul>';                                
                                    foreach($List as $item){ 
                                        if($item['ParentID'] == $parentID){      
                                           echo '<li class="box-bl" data-id="'.$item['idBinhLuan'].'">';
                                           // box chứa ảnh
                                           echo 
                                           '<div class="item"> 
                                                <div class="box-left">';
                                                  if($item['Login_with'] == 'google' || $item['Login_with'] == 'facebook'){
                                                       echo '<img src="'.$item['AnhDaiDien'].'" alt="">';
                                                  }
                                          echo '</div>
                                                <div class="box-right">
                                                     <div class="noidung" id="'.$item['idBinhLuan'].'">
                                                           <p id="'.$item['idBinhLuan'].'" class="TenNguoiDung">'.$item['HoTen'].'</p>
                                                           <p class="NgayBL">'.$item['NgayBL'].'</p>
                                                           <p id="'.$item['idBinhLuan'].'" class="NoiDungBL">'.$item['NoiDung'].'</p>
                                                           <button class="show-action" data-id="'.$item['idBinhLuan'].'">...</button>
                                                           <div class="action" id="'.$item['idBinhLuan'].'">
                                                                 <p id="'.$item['idBinhLuan'].'" class="phanhoi">Phản hồi</p>';
                                                                 if(isset($_SESSION['id_user']) && $_SESSION['id_user'] == $item['idNguoiDung']){
                                                                      echo 
                                                                      '<p id="'.$item['idBinhLuan'].'" class="chinhsua">Chỉnh sửa</p>
                                                                       <p id="'.$item['idBinhLuan'].'" class="xoa">Xóa</p>';
                                                                 }
                                                      echo '</div>
                                                     </div>
                                                     <div class="box-chinhsua" id="'.$item['idBinhLuan'].'">
                                                           <input id="'.$item['idBinhLuan'].'" class="chinhsua-bl" type="text"">
                                                           <button id="'.$item['idBinhLuan'].'" class="close-chinhsua-bl">X</button>
                                                     </div>
                                                     <div class="box-phanhoi" id="'.$item['idBinhLuan'].'">
                                                          <input id="'.$item['idBinhLuan'].'" class="input-phanhoi" type="text" placeholder="Trả lời minh cường">
                                                          <button class="fas fa-times close-phanhoi"></button>
                                                     </div>
                                                </div>
                                           </div>';         
                                            //           
                                           $id = $item['idBinhLuan'];
                                           unset($item);
                                           menu($List , $id);
                                        } 
                                    }  
                                    echo '</li>';
                                    echo '</ul>';
                                }    
                                menu($list , 0);                           
                             ?>
                       </div>
                       <?php 
                           if(isset($_SESSION['id_user'])){
                                if($user['Login_with'] != 'google' && $user['Login_with'] != 'facebook'){
                                     $src = '/wiew/public/upload/'.$user['AnhDaiDien'].'';
                                }else{
                                     $src = $user['AnhDaiDien'];
                                }
                                echo '
                                <div class="form-binhluan">
                                     <div class="user-binhluan">
                                          <img src="'.$src.'" alt="">
                                     </div>
                                     <form action="" onsubmit="return false">
                                          <input id="value-binhluan" type="text" placeholder="Bình luận với tư cách '.$user['HoTen'].'" autocomplete="off">
                                          <input id="submit-binhluan" type="submit" value="Đăng">
                                     </form>                
                                </div>';
                           }else{
                                echo ' <p class="tieude-bot">Bạn cần đăng nhập để bình luận.</p>';
                           }
                       ?>
                 </div>
          </section>
          <section class="list-sanpham" >
                <div class="top">
                      <div class="tieude">
                           <h1>SẢN PHẨM LIÊN QUAN</h1>
                      </div>
                      <div class="gach">
                           <span></span>
                           <span class="span-mid"></span>
                           <span></span>
                      </div>
                </div>
                <div class="content" id="show-sanpham-content" style="justify-content: space-between;">
                     <!-- <div class="box-item">
                         <div class="top">
                              <a href=""><img src="https://product.hstatic.net/200000276673/product/1de5_b6f3b18dbc6b428688ad1ff9df92ed41_bbe6e2ac5ce84496991b0d603f336078_ff66c1e7ffad4cf3ac6ea9bc06d46cf7_grande.jpg" alt=""></a>
                              <div class="action">
                                   <span>THÊM VÀO GIỎ</span>
                                   <span>MUA NGAY</span>
                              </div>
                         </div>
                         <div class="bot">
                              <a href=""><p class="tensp">Áo có slogan</p></a>
                              <div class="giasp">
                                   <p class="gia">360,000 <u>đ</u></p>
                                   <p class="giakp"><strike>360,000 <u>đ</u></strike></p>
                              </div>
                         </div>
                         <div class="danhgia">
                                   <div class="sao">
                                        <img src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                        <img src="/wiew/public/upload/chuadanhgia.ico" alt="">
                                   </div>
                                   <div class="text">
                                        <p>0 đánh giá</p>
                                   </div>
                          </div>
                     </div>                            -->
                     <?php
                         foreach($data['sanphamlienquan'] as $item){
                              if($item['PhanTramKhuyenMai'] > 0){
                              $GiaKhuyenMai = ($item['Gia'] / 100) * (100 - $item['PhanTramKhuyenMai']);
                              }
                              echo '
                              <div class="box-item fadeIn">
                                   <div class="top">
                                        <a href="chitietsanpham/'.$item['idSP'].'"><img src="/wiew/public/upload/'.$item['AnhDaiDien'].'" alt=""></a>';
                                   if($item['PhanTramKhuyenMai'] > 0){
                                        echo '
                                        <div class="giamgia">
                                             <p style="color:white;"> -'.$item['PhanTramKhuyenMai'].'%</p>
                                        </div>
                                        ';
                                   }    
                                   echo'   
                                        <div class="action">
                                             <span data-id="'.$item['idSP'].'" class="themvaogio">THÊM VÀO GIỎ</span>
                                             <span data-id="'.$item['idSP'].'" class="muangay">MUA NGAY</span>
                                        </div>
                                   </div>
                                   <div class="bot">
                                        <a href="chitietsanpham/'.$item['idSP'].'"><p class="tensp">'.$item['TenSP'].'</p></a>';
                              if($item['PhanTramKhuyenMai'] > 0){
                                        echo '
                                        <div class="giasp">
                                             <p class="gia">'.number_format($GiaKhuyenMai).' <u>đ</u></p>
                                             <p class="giakp"><strike>'.number_format($item['Gia']).'<u>đ</u></strike></p>
                                        </div>
                                   </div>
                                   
                              </div>   ';
                              }else{
                                   echo '
                                        <div class="giasp">
                                        <p class="gia">'.number_format($item['Gia']).' <u>đ</u></p>
                                   </div>
                                   </div>
                                   
                              </div>  ';
                              }                             
                         }
                     ?>
                </div>
          </section>
          <?php require_once './wiew/layout_site/footer.php'; ?>
     </div>
</body>
</html>