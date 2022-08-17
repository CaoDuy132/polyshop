<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Thêm bài viết</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/admin_themsanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/dangxuatadmin.js"></script>
    <script src="/wiew/public/js/thembaiviet.js"></script>
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
                             <h1>Thêm bài viết</h1>
                        </div>
                        <div class="chitietsanpham">
                        <div class="back-page">
                              <a href="/admin/baiviet">
                                   <button><i class="fas fa-sign-out-alt"></i></button>
                              </a>
                        </div>
                           <form onsubmit="return false">
                              <div  class="top shadow-none p-3 mb-5 bg-light rounded">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Tiêu đề *</label>
                                     <input id="tieude" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tiêu đề">
                                     <small id="tieude-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group item-mausac">
                                                <label for="anhdaidien">Ảnh đại diện *</label>
                                                <input type="file" class="form-control input-anhdaidien" id="anhdaidien">
                                                <div class="wrapper-anhdaidien">
                                                       <div class="box-anhdaidien" >
                                                            <!-- <img style="display : none" class="anhdaidien" src="" class="rounded" alt=""> -->
                                                       </div>  
                                                </div>
                                                <small id="" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                        </div>    
                                <div class="form-group ">
                                     <label for="exampleFormControlTextarea1">Nội dung *</label>
                                     <textarea id="noidung"  rows="10"></textarea>
                                     <script>
                                          CKEDITOR.replace('noidung');
                                          var editor = CKEDITOR.instances['noidung'];
                                          editor.config.width="100%";
                                          editor.config.height="500px"
                                     </script>
                                     <div style="margin-top: 2em;" class="custom-control custom-checkbox my-1 mr-sm-2">
                                         <input id="checkbox" type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="checkbox">Bài viết nổi bật.</label>
                                    </div>   
                                </div>       
                             </div>                           
                             <button style="margin-top: 0;" id="submit-them" type="submit" class="btn btn-primary" >Thêm bài viết</button>
                           </form>
                        </div>
                   </div>
             </div>
        </main>
    </div>
</body>
</html>