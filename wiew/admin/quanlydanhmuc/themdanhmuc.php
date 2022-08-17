<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Thêm danh mục</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/admin_themsanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/dangxuatadmin.js"></script>
    <script src="/wiew/public/js/themdanhmuc.js"></script>
    <script src="/wiew/public/js/bieudo.js"></script>
    <script src="/wiew/public/js/menu_admin.js"></script>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700&display=swap" rel="stylesheet"> 

    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</head>
<body>
     <div class="container-fluid" style="margin: 0; padding: 0;">
        <?php require_once './wiew/admin/layout/header.php'; ?>
        <main class="content">
             <?php require_once './wiew/admin/layout/menu.php'; ?>
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Thêm danh mục</h1>
                        </div>
                        <div class="chitietsanpham">
                           <div class="back-page">
                                 <a href="/admin/danhmuc">
                                     <button><i class="fas fa-sign-out-alt"></i></button>
                                 </a>
                            </div>
                           <form onsubmit="return false">
                              <div class="top shadow-none p-3 mb-5 bg-light rounded">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Tên danh mục *</label>
                                     <input id="tendanhmuc" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên danh mục">
                                     <small id="tendanhmuc-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <button  id="submit-them" type="submit" class="btn btn-primary" >Thêm</button>
                             </div>               
                           </form>
                        </div>
                   </div>
             </div>
        </main>
    </div>
</body>
</html>