<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Quản lý bình luận</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">
    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/chitietbinhluan.js"></script>
    <script src="/wiew/public/js/dangxuatadmin.js"></script>
    <script src="/wiew/public/js/bieudo.js"></script>
    <script src="/wiew/public/js/menu_admin.js"></script>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700&display=swap" rel="stylesheet"> 


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
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Chi tiết bình luận</h1>
                        </div>
                        <div class="back-page">
                                 <a href="/admin/binhluan">
                                     <button><i class="fas fa-sign-out-alt"></i></button>
                                 </a>
                        </div>
                        <div class="action">
                              <h5>Thuộc sản phẩm : 	<?php echo  $_SESSION['TenSP'] ?></h5>
                              <div class="tieuchi">
                                <!-- <p>Chọn kiểu hiển thị</p>
                                <select name="" id="select">
                                    <option value="all" selected>Tất cả</option>
                                    <option value="muanhieu" >Lượt Mua nhiều nhất</option>
                                    <option value="xemnhieu" >Lượt Xem nhiều nhất</option>
                                   
                                </select> -->
                              </div>
                        </div>
                        <table class="table table-striped" style="margin-top: 2em;">
                             <thead>
                                <td></td>
                                <th scope="col">ID</th>
                                <th scope="col">Nội Dung</th>
                                <th scope="col">Ngày BL</th>
                                <th scope="col">Thuộc bình luận</th>
                                <th scope="col">Người BL</th>
                             </thead>
                             <tbody id="hienthisanpham">
                                 <!-- <tr>
                                     <td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>
                                     <td>1</td>
                                     <td>Áo polo</td>
                                     <td>Áo Polo Cotton Mix Color – White x Dark Blue</td>
                                     <td>350,000 VNĐ</td>
                                     <td>Còn hàng</td>
                                     <td>1</td>
                                     <td>1</td>
                                     <td><button type="button" style="background-color: #35bd9a;" class="btn btn-success chinhsua">Sửa</button></td> 
                                 </tr> -->
                                 <?php 
                                      if(!empty($data['list_binhluan'])){
                                           foreach($data['list_binhluan'] as $item){
                                              echo 
                                               '<tr>
                                                    <td><input data-id="'.$item['idBL'].'" type="checkbox" class="input-checkbox" id="exampleCheck1" ></td>
                                                    <td>'.$item['idBL'].'</td>
                                                    <td>'.$item['NoiDung'].'</td>
                                                    <td>'.$item['NgayBL'].'</td>
                                                    <td>'.$item['ParentID'].'</td>
                                                    <td>'.$item['HoTen'].'</td>
                                               </tr>';
                                           }
                                      }
                                 ?>
                             </tbody>
                        </table>
                        <div id="phantrang">

                        </div>
                        <div class="bot">
                              <div class="chontatca">
                                  <button id="chontatca" type="button"  class="btn btn-primary chon-all">Chọn tất cả</button>
                                  <button id="bochontatca" type="button"  class="btn btn-primary bochon-all">Bỏ chọn tất cả</button>
                                  <button id="xoa" type="button" class="btn btn-danger xoa-all">Xóa</button>
                            </div>
                        </div>
                   </div>
             </div>
        </main>
    </div>
</body>
</html>