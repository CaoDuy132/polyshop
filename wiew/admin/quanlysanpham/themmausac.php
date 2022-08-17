<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Thêm màu sắc</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/admin_themsanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/dangxuatadmin.js"></script>
    <script src="/wiew/public/js/themmausac.js"></script>
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
             <?php 
                  $user = mysqli_fetch_assoc($data['user']);
                  $sanpham = !empty($data['sanpham']) ? mysqli_fetch_assoc($data['sanpham']) : '';
                  $idSP = $sanpham['idSP'];
                  echo "<script>sessionStorage['idSP'] = $idSP </script>";
             ?>
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Thêm màu sắc</h1>
                        </div>
                        <div class="chitietsanpham">
                            <div class="back-page">
                                 <a href="/admin">
                                     <button><i class="fas fa-sign-out-alt"></i></button>
                                 </a>
                            </div>
                           <form onsubmit="return false">
                             
                                <div id="wrapper-box-mausac">
                                    <div class="box-mausac shadow-none p-3 mb-5 bg-light rounded">
                                        <h5> Sản phẩm : <?php echo $sanpham['TenSP'] ?></h5>
                                        <div class="form-group item-mausac  ">
                                                <label for="exampleInputEmail1">Tên màu *</label>
                                                <input  type="text" class="form-control tenmau" id="exampleInputPassword1" placeholder="Tên màu">
                                                <small id="" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group item-mausac">
                                                <label for="exampleInputEmail1">Ảnh đại diện *</label>
                                                <input type="file" class="form-control input-anhdaidien" id="inputGroupFile02">
                                                <div class="wrapper-anhdaidien">
                                                        <div class="box-anhdaidien" >
                                                                <!-- <img style="display : none" class="anhdaidien" src="" class="rounded" alt=""> -->
                                                        </div>  
                                                        <div class="form-group  box-mamau">
                                                                <label for="exampleColorInput" class="form-label">Mã màu *</label>
                                                                <input type="color" class="form-control form-control-color mamau" id="exampleColorInput" value="#FFFFFF" title="Choose your color">
                                                        </div>
                                                </div>
                                                <small id="" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                        </div>      
                                        <div class="form-group item-mausac">
                                                <label for="exampleInputEmail1">Ảnh mô tả (nhiều ảnh) *</label>
                                                <input type="file" class="form-control anhmota" id="inputGroupFile02" multiple>
                                                <div class="box-listanhmota" >
                                                        <!-- <img src="" class="rounded" alt=""> -->
                                                        <!-- <div class="box-anhmota" style="display: none;"> -->
                                                             <!-- <button type="button" class="btn-close close-anhmota" aria-label="Close"></button> -->
                                                             <!-- <img src="" class="rounded" alt=""> -->
                                                        <!-- </div>                       -->
                                                </div>
                                                <small id="" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group item-mausac">
                                                <h5>Size cho màu sắc *</h5>
                                                <div class="form-group box-item-size">
                                                        <div class="box-input-size">
                                                                <label for="exampleInputPassword1">Size S</label>
                                                                <input  type="text" class="form-control size SizeS" id="exampleInputPassword1" placeholder="Nhập số lượng">
                                                        </div>
                                                        <small id="emailHelp" class="form-text text-muted  erro-size">We'll never share your email with anyone else.</small>
                                                </div>
                                                <div class="form-group box-item-size">
                                                        <div class="box-input-size">
                                                                <label for="exampleInputPassword1">Size M</label>
                                                                <input type="text" class="form-control size SizeM" id="exampleInputPassword1" placeholder="Nhập số lượng">
                                                        </div>
                                                        <small id="emailHelp" class="form-text text-muted erro-size">We'll never share your email with anyone else.</small>
                                                </div>
                                                <div class="form-group box-item-size">
                                                        <div class="box-input-size">
                                                                <label for="exampleInputPassword1">Size L</label>
                                                                <input type="text" class="form-control size SizeL" id="exampleInputPassword1" placeholder="Nhập số lượng">
                                                        </div>
                                                        <small id="emailHelp" class="form-text text-muted erro-size">We'll never share your email with anyone else.</small>
                                                </div>
                                                <div class="form-group box-item-size">
                                                        <div class="box-input-size">
                                                                <label for="exampleInputPassword1">Size XL</label>
                                                                <input type="text" class="form-control size SizeXL" id="exampleInputPassword1" placeholder="Nhập số lượng">
                                                        </div>
                                                        <small id="emailHelp" class="form-text text-muted erro-size">We'll never share your email with anyone else.</small>
                                                </div>
                                        </div>   
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