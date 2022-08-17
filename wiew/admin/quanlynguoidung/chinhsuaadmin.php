<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Thêm admin</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/admin_themsanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/dangxuatadmin.js"></script>
    <script src="/wiew/public/js/chinhsuaadmin.js"></script>
    <script src="/wiew/public/js/bieudo.js"></script>
    <script src="/wiew/public/js/menu_admin.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700&display=swap" rel="stylesheet"> 

    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<style>
    .form-check{
        margin-bottom: 1em;
    }
</style>
</head>
<body>
     <div class="container-fluid" style="margin: 0; padding: 0;">
        <?php require_once './wiew/admin/layout/header.php'; ?>
        <main class="content">
             <?php require_once './wiew/admin/layout/menu.php';
                $nguoidung = mysqli_fetch_assoc($data['chitietadmin']);
              ?>
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Chỉnh sửa người dùng</h1>
                        </div>
                        <div class="back-page">
                              <a href="/admin/nguoidung/quantri">
                                   <button><i class="fas fa-sign-out-alt"></i></button>
                              </a>
                         </div>
                        <div class="chitietsanpham">
                           <h6 style="margin: 1em 0;">Thông tin quản trị viên : <?php echo ucwords($nguoidung['HoTen']) ?></h6>
                           <form onsubmit="return false">
                              <div class="top shadow-none p-3 mb-5 bg-light rounded">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Họ tên*</label>
                                     <input id="hoten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ" value="<?php echo $nguoidung['HoTen'] ?>">
                                     <small id="hoten-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">SDT *</label>
                                     <input id="sdt" type="text" class="form-control" id="exampleInputPassword1" placeholder="SDT" value="<?php echo $nguoidung['SDT'] ?>">
                                     <small id="sdt-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Email *</label>
                                     <input id="email" type="text" class="form-control" id="exampleInputPassword1" placeholder="Email" value="<?php echo $nguoidung['Email'] ?>">
                                     <small id="email-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Mật khẩu *</label>
                                     <input id="matkhau" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu" value="<?php echo $nguoidung['MatKhau'] ?>">
                                     <small id="matkhau-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group item-mausac">
                                        <label for="exampleInputEmail1">Ảnh đại diện *</label>
                                        <input type="file" class="form-control input-anhdaidien" id="anhdaidien">
                                        <div class="wrapper-anhdaidien">
                                                <div class="box-anhdaidien" >
                                                        <img  class="anhdaidien" src="/wiew/public/upload/<?php echo $nguoidung['AnhDaiDien'] ?>" class="rounded" alt="">
                                                </div>  
                                        </div>
                                        <small id="" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>         
                             </div>
                              
                                <div id="wrapper-box-mausac">
                                    <?php $list_chucvu = explode('&' , $nguoidung['ChucVu']);?>
                                    <h6>Đang quản lý các danh mục *</h6>
                                    <div style="margin-top: 1em;" class="box-mausac shadow-none p-3 mb-5 bg-light rounded">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="quanlysanpham" data-value="sanpham&danhmuc"
                                               <?php
                                                  foreach($list_chucvu as $item){
                                                      if(strcmp($item , 'danhmuc') == 0 ){
                                                          echo 'checked';
                                                      }
                                                  }
                                               ?>
                                            >
                                            <label class="form-check-label" for="quanlysanpham">Quản lý sản phẩm , danh mục sản phẩm.</label>       
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="quanlydonhang" data-value="donhang" 
                                            <?php
                                                  foreach($list_chucvu as $item){
                                                      if(strcmp($item , 'donhang') == 0 ){
                                                          echo 'checked';
                                                      }
                                                  }
                                               ?>
                                            >
                                            <label class="form-check-label" for="quanlydonhang">Quản lý đơn hàng.</label>       
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"  id="quanlybinhluan" data-value="binhluan"
                                            <?php
                                                  foreach($list_chucvu as $item){
                                                      if(strcmp($item , 'binhluan') == 0 ){
                                                          echo 'checked';
                                                      }
                                                  }
                                               ?>
                                               >
                                            <label class="form-check-label" for="quanlybinhluan">Quản lý bình luận.</label>       
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"  id="quanlybaiviet" data-value="baiviet"
                                            <?php
                                                  foreach($list_chucvu as $item){
                                                      if(strcmp($item , 'baiviet') == 0 ){
                                                          echo 'checked';
                                                      }
                                                  }
                                               ?>
                                            >
                                            <label class="form-check-label" for="quanlybaiviet">Quản lý bài viết.</label>       
                                        </div>
                                        <small  style="display: none;" id="chucvu-null" class="form-text text-muted erro">We'll never share your email with anyone else.</small>  
                                    </div>    
                                </div>   
                                <button id="submit-them" data-id="<?php echo $nguoidung['id'] ?>" type="submit" class="btn btn-primary" >Lưu chỉnh sửa</button>
                           </form>
                        </div>
                   </div>
             </div>
        </main>
    </div>
</body>
</html>