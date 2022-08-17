<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Chỉnh sửa sản phẩm</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/admin_themsanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/dangxuatadmin.js"></script>
    <script src="/wiew/public/js/chinhsuasanpham.js"></script>
    <script src="/wiew/public/js/bieudo.js"></script>
    <script src="/wiew/public/js/menu_admin.js"></script>



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
</head>
<body>
     <div class="container-fluid" style="margin: 0; padding: 0;">
        <?php require_once './wiew/admin/layout/header.php'; ?>
        <main class="content">
             <?php require_once './wiew/admin/layout/menu.php'; ?>

             <?php 
                 $sanpham = !empty($data['sanpham']) ? mysqli_fetch_assoc($data['sanpham']) : '';
                 $size = !empty($data['size']) ? mysqli_fetch_assoc($data['size']) : '';
             ?>
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Chỉnh sửa sản phẩm</h1>
                        </div>
                        <div class="chitietsanpham">
                            <div class="back-page">
                                 <a href="/admin">
                                     <button><i class="fas fa-sign-out-alt"></i></button>
                                 </a>
                            </div>
                           <form onsubmit="return false">
                              <div class="top shadow-none p-3 mb-5 bg-light rounded">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Tên sản phẩm *</label>
                                     <input id="tensp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $sanpham['TenSP'] ?>" placeholder="Tên sản phẩm">
                                     <small id="tensp-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Giá *</label>
                                     <input id="gia" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $sanpham['Gia'] ?>" placeholder="Giá">
                                     <small id="gia-erro" class="form-text text-muted erro">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Danh mục *</label>
                                     <input id="danhmuc" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $sanpham['TenDanhMuc'] ?>" placeholder="Giá" disabled>
                                </div>
                             </div>
                                <div id="wrapper-box-mausac">
                                     <?php 
                                         foreach($data['color'] as $item){
                                             echo
                                         '<div data-id="'.$item['id'].'" class="box-mausac shadow-none p-3 mb-5 bg-light rounded">
                                             <button data-id="'.$item['id'].'" type="button" class="btn-close close-box-mausac" aria-label="Close"></button>
                                             <h5>Màu sắc *</h5>
                                             <div class="form-group item-mausac  ">
                                                     <label for="exampleInputEmail1">Tên màu *</label>
                                                     <input data-id="'.$item['id'].'"  type="text" class="form-control tenmau" id="exampleInputPassword1" value="'.$item['MauSac'].'" placeholder="Tên màu">
                                                     <small id="" class="form-text text-muted erro"></small>
                                             </div>
                                             <div class="form-group item-mausac">
                                                     <label for="exampleInputEmail1">Ảnh đại diện *</label>
                                                     <input data-id="'.$item['id'].'" type="file" class="form-control input-anhdaidien" id="inputGroupFile02">
                                                     <div class="wrapper-anhdaidien">
                                                             <div class="box-anhdaidien" >
                                                                    <img data-id="'.$item['id'].'"  src="/wiew/public/upload/'.$item['AnhDaiDien'].'" class="rounded img-anhdaidien" alt=""> 
                                                             </div>  
                                                             <div class="form-group  box-mamau">
                                                                     <label for="exampleColorInput" class="form-label">Mã màu *</label>
                                                                     <input data-id="'.$item['id'].'" type="color" class="form-control form-control-color mamau" id="exampleColorInput" value="'.$item['MaMau'].'" title="Choose your color">
                                                             </div>
                                                     </div>
                                                     <small id="" class="form-text text-muted erro"></small>
                                             </div>      
                                             <div class="form-group item-mausac">
                                                    <label for="exampleInputEmail1">Ảnh mô tả (nhiều ảnh) *</label>
                                                    <div class="wrapper-box-anhmota">
                                                        <div data-id="'.$item['id'].'" class="box-listanhmota" >';
                                                        $list_anhmota = explode('&' , $item['AnhMoTa']);
                                                        foreach($list_anhmota as $value){
                                                            echo
                                                            '
                                                            <div class="box-anhmota">
                                                                <button data-id='.$item['id'].' src-delete="'.$value.'"1 type="button" class="btn-close close-anhmota" aria-label="Close"></button> 
                                                                <img src="/wiew/public/upload/'.$value.'"  class="rounded" alt="">
                                                            </div>    ';
                                                        }                 
                                                    echo'     
                                                        </div>
                                                        <input style="display:none;"  data-id="'.$item['id'].'" type="file" class="form-control form-control-color them-anh" id="exampleColorInput" value="" title="Choose your color">
                                                        <div data-id="'.$item['id'].'" class="box-themanh" onclick="$(this).prev().click()">
                                                            <i class="fas fa-plus"></i>
                                                        </div>          
                                                    </div> 
                                                     <small id="" class="form-text text-muted erro"></small>
                                             </div>
                                             <div class="form-group item-mausac">
                                                     <h5>Size *</h5>';
                                                foreach($data['size'] as $size){
                                                    if($size['idChiTietSanPham'] == $item['id']){
                                                        echo 
                                                        '<div class="form-group box-item-size">
                                                            <div class="box-input-size">
                                                                    <label for="exampleInputPassword1">Size '.$size['TenSize'].'</label>
                                                                    <input data-id="'.$size['idSize'].'"  type="text" class="form-control size Size'.$size['TenSize'].'" id="exampleInputPassword1" value="'.$size['SoLuong'].'" placeholder="Nhập số lượng">
                                                            </div>
                                                            <small id="emailHelp" class="form-text text-muted  erro-size"></small>
                                                       </div>';
                                                    }
                                                }
                                            echo '         
                                             </div>   
                                         </div> ';
                                         }
                                     ?>     
                                </div>   
                                <div class="form-group mota shadow-none p-3 mb-5 bg-light rounded">
                                     <label for="exampleFormControlTextarea1">Mô tả *</label>
                                     <textarea id="mota" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                     <script>
                                          CKEDITOR.replace('mota');
                                          $(document).ready(function(){           
                                                  $.ajax({
                                                       url : 'admin/get_motasp_for_ckeditor',
                                                       type : 'post',
                                                  }).done(function(res){
                                                       var editor = CKEDITOR.instances['mota'];
                                                       editor.setData(res);
                                                       editor.config.width="100%";
                                                       editor.config.height="300px";
                                                  })
                                             }) 
                                    </script>
                                </div>
                                <div class="box-btn-themmausac">
                                     <a href="admin/quanlysanpham/themmausac/<?php echo $sanpham['idSP'] ?>"><button id="themmausac" type="button" class="btn btn-success">+ Thêm màu sắc</button></a>
                                </div>     
                                <button id="submit-them" type="submit" class="btn btn-primary" >Lưu chỉnh sửa</button>
                           </form>
                        </div>
                   </div>
             </div>
        </main>
    </div>
</body>
</html>