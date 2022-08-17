<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/trangchu.css">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="/wiew/public/js/trangchu.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/muahang.js"></script>

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,200;0,700;1,200&family=Comfortaa&family=Inter:wght@300&family=Kanit:wght@300&family=Quicksand&family=Raleway:wght@300&family=Righteous&family=Roboto+Condensed:wght@300;400&family=Roboto:wght@300&family=Rubik&family=Titillium+Web:wght@200;400&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">

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
          <section id="slide" class="slide">
                <?php 
                    if(!empty($data['banner'])){
                         foreach($data['banner'] as $item){  
                          echo '<div class="slide-item">
                                   <img src="/wiew/public/upload/'.$item['src'].'" alt="">
                              </div>';
                         }
                    }
                ?>
          </section>
          <section class="slide-danhmuc">
                <div class="tieude">
                     <h1>DANH MỤC SẢN PHẨM</h1>
                </div>
                <div class="content">  
                         <?php 
                             foreach($data['listDanhMuc'] as $item){
                                  if($item['TenDanhMuc'] == 'Áo polo nam'){
                                        echo 
                                        '<a href="sanpham/ao-polo-nam">
                                             <div class="box-slide-danhmuc">
                                                       <img src="https://storage.googleapis.com/cdn.nhanh.vn/store/3138/ps/20210418/APM4107_DEN__2_.jpg" alt="">
                                                       <div class="tendanhmuc">
                                                            <h5>'.mb_strtoupper($item['TenDanhMuc']).'</h5>
                                                            <p>'.$item['SoLuongSP'].' SẢN PHẨM</p>
                                                       </div>
                                             </div>
                                        </a>';
                                  }else if($item['TenDanhMuc'] == 'Áo sơ mi nam'){
                                        echo 
                                        '<a href="sanpham/ao-so-mi-nam">
                                             <div class="box-slide-danhmuc">
                                                       <img src="https://storage.googleapis.com/cdn.nhanh.vn/store/3138/ps/20210726/SMM3049_DEN__6_.jpg" alt="">
                                                       <div class="tendanhmuc">
                                                            <h5>'.mb_strtoupper($item['TenDanhMuc']).'</h5>
                                                            <p>'.$item['SoLuongSP'].' SẢN PHẨM</p>
                                                       </div>
                                             </div>
                                        </a>';
                                  }
                                  else if($item['TenDanhMuc'] == 'Áo polo nữ'){
                                        echo 
                                        '<a href="sanpham/ao-polo-nu">
                                             <div class="box-slide-danhmuc">
                                             <img src="https://storage.googleapis.com/cdn.nhanh.vn/store/3138/ps/20210703/APN4014_7.jpg" alt="">
                                             <div class="tendanhmuc">
                                                            <h5>'.mb_strtoupper($item['TenDanhMuc']).'</h5>
                                                            <p>'.$item['SoLuongSP'].' SẢN PHẨM</p>
                                                       </div>
                                             </div>
                                        </a>';
                                   }
                                   else if($item['TenDanhMuc'] == 'Quần tây nam'){
                                        echo 
                                        '<a href=sanpham/quan-tay-nam">
                                             <div class="box-slide-danhmuc">
                                             <img src="https://storage.googleapis.com/cdn.nhanh.vn/store/3138/ps/20210322/QAM3127_DEN__APM3699_NAU__2_.jpg" alt="">
                                             <div class="tendanhmuc">
                                                            <h5>'.mb_strtoupper($item['TenDanhMuc']).'</h5>
                                                            <p>'.$item['SoLuongSP'].' SẢN PHẨM</p>
                                                       </div>
                                             </div>
                                        </a>';
                                  }
                                   else if($item['TenDanhMuc'] == 'Quần âu nữ'){
                                        echo 
                                        '<a href="sanpham/quan-au-nu">
                                             <div class="box-slide-danhmuc">
                                             <img src="https://storage.googleapis.com/cdn.nhanh.vn/store/3138/ps/20210920/QAN4801_DEN__3_.JPG" alt="">
                                             <div class="tendanhmuc">
                                                            <h5>'.mb_strtoupper($item['TenDanhMuc']).'</h5>
                                                            <p>'.$item['SoLuongSP'].' SẢN PHẨM</p>
                                                       </div>
                                             </div>
                                        </a>';
                                   }
                             }
                         ?>  
               </div>
          </section>
          <section class="list-sanpham">
                <div class="top">
                      <div class="tieude">
                           <h1>BỘ SƯU TẬP</h1>
                      </div>
                      <div class="gach">
                           <span></span>
                           <span class="span-mid"></span>
                           <span></span>
                      </div>
                </div>
                <div class="list-danhmuc">
                      <h5 class="show-sanpham" id="nữ">THỜI TRANG NỮ</h5>
                      <h5 class="show-sanpham" id="nam">THỜI TRANG NAM</h5>
                      <h5 class="show-sanpham" id="noibat">NỔI BẬT</h5>
                </div>
                <div class="content" id="show-sanpham-content">
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
                </div>
          </section>
          <section class="picture">
               <img src="https://theme.hstatic.net/200000276673/1000671655/14/home_banner_image.jpg?v=201" alt="">
          </section>
          <section class="list-sanpham">
                <div class="top">
                      <div class="tieude">
                           <h1>SẢN PHẨM NỔI BẬT</h1>
                      </div>
                      <div class="gach">
                           <span></span>
                           <span class="span-mid"></span>
                           <span></span>
                      </div>
                </div>
                <div class="content" id="show-sanpham-content">
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
                         foreach($data['SanPhamNoiBat'] as $item){
                              if($item['TongSaoDanhGia'] > 0 && $item['LuotDanhGia'] > 0){
                                   $SoLuongSao = $item['TongSaoDanhGia'] / $item['LuotDanhGia'];
                              }
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
          <section class="list-sanpham">
                <div class="top">
                      <div class="tieude">
                           <h1>VỀ CHÚNG TÔI</h1>
                      </div>
                      <div class="gach">
                           <span></span>
                           <span class="span-mid"></span>
                           <span></span>
                      </div>
                </div>
                <div class="list-sanpham-content">
                    <div class="left">
                         <img src="https://theme.hstatic.net/200000276673/1000671655/14/home_about_image.jpg?v=201" alt="">
                    </div> 
                    <div class="right">
                         <p>
                              Với khởi nguồn từ lòng đam mê thời trang, khát khao mang đến cái đẹp cho mọi nguòi và hơn 
                              thế nữa là mong muốn được góp phần tạo dựng hình ảnh mới lạ cho ngành công nghiệp thời trang Việt
                              Nam, Fpoly Fashion đã tập trung đầu tư vào chất lượng và kiểu dáng sản phẩm để thương hiệu Fpoly Fashion trở 
                              thành một cái tên gần gũi hơn với khách hàng.
                         </p>
                         <p>
                              Với phương châm “Thời trang là nguồn sống”, Fpoly Fashion mong muốn mang lại cho khách hàng những sản phẩm tốt nhất để
                              các bạn không chỉ thể hiện cá tính bản thân mà còn lan toả nguồn năng lượng tích cực, mạnh mẽ đến xung quanh.
                         </p>
                         <div class="box-btn">
                               <a href=""><button>XEM NGAY</button></a>
                         </div>
                    </div>   
               </div>                     
          </section>
          <section class="list-sanpham">
                <div class="top">
                      <div class="tieude">
                           <h1>TIN TỨC MỚI NHẤT</h1>
                      </div>
                      <div class="gach">
                           <span></span>
                           <span class="span-mid"></span>
                           <span></span>
                      </div>
                </div>
                <div class="slide-baiviet" id="slide-baiviet">
                     <?php
                        if(!empty($data['baiviet'])){
                             foreach($data['baiviet'] as $item){
                                 echo 
                                 ' <a href="baiviet/'.$item['idBaiViet'].'">
                                        <div class="slide-baiviet-item">
                                             <div class="top">
                                                  <img src="/wiew/public/upload/'.$item['HinhAnh'].'" alt="">
                                                  <div class="top-sub">
                                                       <i class="fa fa-calendar"></i>
                                                       <p class="thoigian">'.$item['NgayThem'].'</p>
                                                       <p class="nguoidang"> <span>Đăng bởi :</span>'.$item['HoTen'].'</p>
                                                  </div>
                                             </div>   
                                             <div class="baiviet-content">
                                                  <h5 class="tieude">'.$item['TieuDe'].'</h5>
                                                  <div class="noidung" >
                                                       '.$item['NoiDung'].'    
                                                  </div>
                                             </div>
                                        </div>
                                   </a>';
                             }
                        }
                     
                     ?>       
                     <!-- <div class="slide-baiviet-item">
                          <div class="top">
                               <img src="https://file.hstatic.net/200000276673/article/1_224fe8e2239345288053652c5fabbd28.jpg" alt="">
                               <div class="top-sub">
                                   <i class="fa fa-calendar"></i>
                                   <p class="thoigian">30/12/2020</p>
                                   <p class="nguoidang"> <span>Đăng bởi :</span> Admin</p>
                               </div>
                          </div>   
                          <div class="baiviet-content">
                               <h5 class="tieude">Cách chọn đồ công sở nữ</h5>
                               <div class="noidung" >
                                    <p >Một trong những nhiệm vụ quan trọng nhất của quần áo, đó là giúp bạn tôn lên những điểm mạnh của Một trong những nhiệm vụ quan trọng nhất của quần áo, đó là giúp bạn tôn lên những điểm mạnh của ...</p>
                               </div>
                          </div>
                     </div> -->
                </div>               
          </section>
          <?php require_once './wiew/layout_site/footer.php'; ?>
     </div>
</body>
</html>