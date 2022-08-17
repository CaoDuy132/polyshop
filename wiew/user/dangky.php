<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Đăng ký</title>
     <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/dangky.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="/wiew/public/js/danhmucsp.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/dangky.js"></script>


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
           <main class="main">
                <div class="wrapper">
                     <div class="tieude">
                          <h1>ĐĂNG KÝ</h1>
                     </div>
                     <form action="" onsubmit="return false">
                          <div class="box-ho">
                               <input type="text" name="ho" id="ho" placeholder="Họ" autocomplete="off">    
                               <p class="erro ho-erro">Sai định dạng</p>
                          </div>
                          <div class="box-ten">
                               <input type="text" name="ten" id="ten" placeholder="Tên" autocomplete="off">
                               <p class="erro ten-erro">Sai định dạng</p>
                          </div>
                          <div class="box-email">
                               <input type="text" name="email" id="email" placeholder="Email" autocomplete="off">
                               <p class="erro email-erro">Sai định dạng</p>
                          </div>
                          <div class="box-sdt">
                               <input type="text" name="sdt" id="sdt" placeholder="SDT" autocomplete="off">
                               <p class="erro sdt-erro">Sai định dạng</p>
                          </div>
                          <div class="box-matkhau">
                               <input type="text" name="matkhau" id="matkhau" placeholder="Mật khẩu" autocomplete="off">
                               <p class="erro matkhau-erro">Sai định dạng</p>
                          </div>
                          <div class="box-matkhau">
                                <input type="file" id="hinhanh" name="hinhanh" style="display:none;">
                                <div class="box-input-anhdaidien" onclick="$('#hinhanh').click()">
                                     <i class="far fa-image"></i>
                                     <p id="text-anhdaidien">Ảnh đại diện</p>
                                </div>
                               <p class="erro hinhanh-erro">Sai định dạng</p>
                          </div>
                          <div class="box-maxacnhan" style="display:none">
                                <p>Nhập mã xác nhận từ email của bạn. <span id="thoigiantontai">(60)</span></p>
                               <input type="text" name="xacnhan" id="maxacnhan" placeholder="Nhập mã" autocomplete="off">
                               <p class="erro">Sai định dạng</p>
                          </div>
                          <div class="box-submit">
                               <input type="submit" name="submit" id="submit" value="Đăng ký" >
                          </div>
                          <div class="back-page">
                               <a href="/">
                                   <i class="fa fa-long-arrow-left"></i>
                                   <p>Quay lại trang chủ.</p>
                               </a>
                          </div>
                     </form>
                </div>
           </main>
          <?php require_once './wiew/layout_site/footer.php'; ?>
     </div>
</body>
</html>