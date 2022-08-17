<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Giới thiệu</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/gioithieu.css">
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
            <?php 
                require_once './wiew/layout_site/header.php'; 
                $tin = mysqli_fetch_assoc($data['gioithieu']);
            ?>
            <section class="menu-back">
                <div class="content">
                        <a href=""><p>Trang chủ</p></a>
                        <span>/</span>
                        <a href=""><p>Giới thiệu</p></a>
                </div>
            </section>
            <div class="content-gioithieu">
                 <div class="left">
                        <div class="noidung">
                            <div class="gioithieu-text">
                                  <?php echo $tin['Gioithieu'] ?>
                            </div>
                            <div class="noidung-text">
                                  <?php echo $tin['NoiDung'] ?>
                            </div>
                            <div class="loiket-text">
                                  <?php echo $tin['LoiKet'] ?>
                            </div>
                        </div>
                 </div>
                 <div class="right">
                      <div class="box-tieude">
                           <h1>DANH MỤC TRANG</h1>
                      </div>
                      <nav class="menu-right">
                          <ul>
                              <li>Tìm kiếm</li>
                              <li>Giới thiệu</li>
                              <li>Chính sách đổi trả</li>
                              <li>Chính sách bảo mật</li>
                              <li>Điều khoản dịch vụ</li>
                          </ul>
                      </nav>
                      <div class="box-img">
                            <img src="https://theme.hstatic.net/200000276673/1000671655/14/page_banner_img.jpg?v=201" alt="">
                      </div>
                 </div>
            </div>
             <?php require_once './wiew/layout_site/footer.php'; ?>
        </div>
</body>
</html>