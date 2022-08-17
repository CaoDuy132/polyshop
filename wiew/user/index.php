<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Thông tin tài khoản</title>
     <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/thongtintaikhoan.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="/wiew/public/js/danhmucsp.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/thongtintaikhoan.js"></script>


    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

 
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,200;0,700;1,200&family=Comfortaa&family=Encode+Sans+Condensed:wght@500&family=Inter:wght@300&family=Kanit:wght@300&family=Open+Sans&family=Quicksand&family=Raleway:wght@300&family=Righteous&family=Roboto+Condensed:wght@300;400&family=Rubik&family=Titillium+Web:wght@200;400&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">

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
          <?php require_once './wiew/layout_site/header.php';?>
           <main class="main">
                <div class="wrapper">
                     <div class="box-left">
                          <div class="top">
                               <input type="file" id="hinhanh" style="display:none">
                               <i id="edit-anhdaidien" class="fas fa-pencil-alt" onclick="$('#hinhanh').click()"></i>
                               <div class="box-img-user">
                                    <?php 
                                        if($user['Login_with'] == 'system'){
                                             echo '<img class="left-img-user" src="/wiew/public/upload/'.$user['AnhDaiDien'].'" alt="">';
                                        }else{
                                             echo '<img  src="'.$user['AnhDaiDien'].'" alt="">';
                                        }
                                    ?>
                               </div>
                               <div class="box-text-user">
                                    <h5><?php echo $user['HoTen'] ?></h5>
                                    <p>From : <?php echo $user['Login_with'] ?></p>
                               </div>
                          </div>
                          <div class="box-left-menu">
                                <div class="item">
                                   <a href="user">
                                        <div class="tieude">
                                             <i class="far fa-user"></i>
                                             <p>Thông tin tài khoản</p>
                                        </div>            
                                   </a>
                                </div>
                                <a href="user/thongtindonhang">
                                   <div class="item">
                                        <div class="tieude">
                                             <i class="fas fa-file-invoice"></i>
                                             <p>Thông tin đơn hàng</p>
                                        </div>
                                   </div>
                                </a>
                          </div>
                     </div>
                     <div class="box-right">
                          <div class="top">
                               <h5>Hồ sơ của tôi</h5>
                          </div>
                          <div class="mid">
                                <div class="wrapper-mid">
                                   <div class="action" >
                                        <button class="edit"><i id="icon-action" class="fas fa-user-edit "></i></button>
                                   </div>
                                   <div class="item">
                                        <label for="">HỌ TÊN</label>
                                        <input class="input" type="text" name="hoten" id="hoten" value="<?php echo $user['HoTen'] ?>" disabled>
                                        <p class="erro hoten-erro">Sai định dạng</p>
                                   </div>
                                   <div class="item">
                                        <label for="">EMAIL</label>
                                        <input type="text" name="email" id="email" value="<?php echo $user['Email'] ?>" disabled>
                                        <p class="erro email-erro">Sai định dạng</p>
                                   </div>
                                   <div class="item">
                                        <label for="">SDT</label>
                                        <input class="input" type="text" name="sdt" id="sdt" value="<?php echo $user['SDT'] ?>" disabled>
                                        <p class="erro sdt-erro">Sai định dạng</p>
                                   </div>
                                   <div class="item">
                                        <label for="">MẬT KHẨU</label>
                                        <input class="input" type="password" name="matkhau" id="matkhau" value="<?php echo $user['MatKhau'] ?>" disabled>
                                        <p class="erro matkhau-erro">Sai định dạng</p>
                                   </div>
                                   <div class="item box-xacthuc" style="display: none;">
                                        <label for="">MẬT KHẨU XÁC THỰC</label>
                                        <input class="input" type="password" name="matkhauxacthuc" id="matkhauxacthuc" value="" disabled>
                                        <p class="erro matkhauxacthuc-erro">Sai định dạng</p>
                                   </div>
                                   <div class="item box-submit" id="box-submit" style="display:none">
                                        <label for=""></label>
                                        <input type="submit" name="submit" id="luuchinhsua" value="Lưu chỉnh sửa" >
                                   </div>
                                </div>
                          </div>
                     </div>
                </div>
           </main>
          <?php require_once './wiew/layout_site/footer.php'; ?>
     </div>
</body>
</html>