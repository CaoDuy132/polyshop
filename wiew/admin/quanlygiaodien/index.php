<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Banner</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/admin_themsanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/dangxuatadmin.js"></script>
    <script src="/wiew/public/js/bieudo.js"></script>
    <script src="/wiew/public/js/menu_admin.js"></script>
    <script src="/wiew/public/js/quanlygiaodien.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700&display=swap" rel="stylesheet"> 

    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<style>
     .box-banner{
         display: flex;
         flex-wrap: wrap;
         align-items: center;
         margin-top: 2em;
     }
     .wrapper-item-banner{
        display: flex;
         flex-wrap: wrap;
     }
     .box-banner .item{
        position: relative;
        margin: 1em;
        margin-left: 0;
        margin-right: 2em;
     }
     .box-banner .item button{
        position: absolute;
        right: -18px;
        top: -18px;
     }
     .banner{
         width: 500px;
         height: 250px;
     }
     .add-banner{ 
          display: flex;
          border: 2px dashed silver;
          display: flex;
          align-items: center;
          justify-content: center;
          width: 500px;
          height: 250px;
          cursor: pointer;
          
     }
     .add-banner i{
          color: silver;
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
                             <h1>Quản lý giao diện</h1>
                        </div>
                        <div class="chitietsanpham">
                           <form onsubmit="return false">
                                <div id="wrapper-box-mausac">
                                        <h5>Banner</h5>     
                                        <div class="form-group item-mausac">
                                                <label for="exampleInputEmail1">Tải banner *</label>
                                                <div class="wrapper-anhdaidien">
                                                        <div class="box-banner" >
                                                            <div class="wrapper-item-banner" id="list-banner">
                                                                <?php 
                                                                    if(!empty($data['banner'])){
                                                                        foreach($data['banner'] as $item){
                                                                             echo 
                                                                             '<div class="item">
                                                                                   <img class="banner" class="anhdaidien" src="/wiew/public/upload/'.$item['src'].'" class="rounded" alt="">
                                                                                   <button data-id="'.$item['id'].'" type="button" class="btn-close close-box-mausac xoa-banner" aria-label="Close"></button>
                                                                             </div>';
                                                                        }
                                                                    }
                                                                ?>
                                                             </div>
                                                             <input id="input-banner" type="file" style="display: none;">
                                                             <div class="add-banner" onclick="$(this).prev().click()">
                                                                     <i class="fas fa-plus"></i>
                                                            </div>
                                                        </div>  
                                                </div>
                                                <small id="banner-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                        </div>      
                                         
                                    </div>      
                                </div>   
                                <!-- <button id="submit-them" type="submit" class="btn btn-primary" >Thêm</button> -->
                           </form>
                        </div>
                   </div>
             </div>
        </main>
    </div>
</body>
</html>