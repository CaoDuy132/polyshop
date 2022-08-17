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
    <script src="/wiew/public/js/themadmin.js"></script>
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
             <?php require_once './wiew/admin/layout/menu.php'; ?>
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Thêm admin</h1>
                        </div>
                        <div class="back-page">
                              <a href="/admin/nguoidung/quantri">
                                   <button><i class="fas fa-sign-out-alt"></i></button>
                              </a>
                         </div>
                        <div class="chitietsanpham">
                           <h6 style="margin: 1em 0;">Thêm thông tin cá nhân *</h6>
                           <form onsubmit="return false">
                              <div class="top shadow-none p-3 mb-5 bg-light rounded">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Họ tên*</label>
                                     <input id="hoten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ">
                                     <small id="hoten-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">SDT *</label>
                                     <input id="sdt" type="text" class="form-control" id="exampleInputPassword1" placeholder="SDT">
                                     <small id="sdt-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Email *</label>
                                     <input id="email" type="text" class="form-control" id="exampleInputPassword1" placeholder="Email">
                                     <small id="email-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Mật khẩu *</label>
                                     <input id="matkhau" type="text" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu">
                                     <small id="matkhau-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group item-mausac">
                                        <label for="exampleInputEmail1">Ảnh đại diện *</label>
                                        <input type="file" class="form-control input-anhdaidien" id="anhdaidien">
                                        <div class="wrapper-anhdaidien">
                                                <div class="box-anhdaidien" >
                                                        <!-- <img style="display : none" class="anhdaidien" src="" class="rounded" alt=""> -->
                                                </div>  
                                        </div>
                                        <small id="" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>         
                             </div>
                              
                                <div id="wrapper-box-mausac">
                                    <h6 >Chọn những quyền mà admin được sử dụng *</h6>
                                    <div style="margin-top: 1em;" class="box-mausac shadow-none p-3 mb-5 bg-light rounded">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="quanlysanpham" data-value="sanpham&danhmuc">
                                            <label class="form-check-label" for="quanlysanpham">Quản lý sản phẩm , danh mục sản phẩm.</label>       
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="quanlydonhang" data-value="donhang">
                                            <label class="form-check-label" for="quanlydonhang">Quản lý đơn hàng.</label>       
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="quanlybinhluan" data-value="binhluan">
                                            <label class="form-check-label" for="quanlybinhluan">Quản lý bình luận.</label>       
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="quanlybaiviet" data-value="baiviet">
                                            <label class="form-check-label" for="quanlybaiviet">Quản lý bài viết.</label>       
                                        </div>
                                        <small  style="display: none;" id="chucvu-null" class="form-text text-muted erro">We'll never share your email with anyone else.</small>  
                                    </div>    
                                </div>   
                                <button id="submit-them" type="submit" class="btn btn-primary" >Thêm</button>
                           </form>
                        </div>
                   </div>
             </div>
        </main>
    </div>
</body>
</html>