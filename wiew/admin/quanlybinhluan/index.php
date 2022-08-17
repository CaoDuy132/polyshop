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
    <script src="/wiew/public/js/quanlybinhluan.js"></script>
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
                             <h1>Quản lý bình luận</h1>
                        </div>
                        <div class="action" style="justify-content: flex-end;">
                              <div class="tieuchi">
                                <p>Sắp xếp theo</p>
                                <select name="" id="select">
                                    <option value="" selected>Mặc định</option>
                                    <option value="DESC" >Số lượng bình luận A-Z</option>
                                    <option value="ASC" >Số lượng bình luận Z-A</option>
                                </select>
                              </div>
                        </div>
                        <table class="table table-striped" style="margin-top: 2em;">
                             <thead>
                                <th scope="col">IDSP </th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng BL</th>
                                <th scope="col">BL mới nhất</th>
                                <th scope="col">BL cũ nhất</th>
                                <th scope="col">Xem chi tiết</th>
                             </thead>
                             <tbody id="hienthibinhluan">
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
                                      if(!empty($data['binhluan'])){
                                           foreach($data['binhluan'] as $item){
                                              echo 
                                               '<tr>
                                                    <td>'.$item['idSP'].'</td>
                                                    <td>'.$item['TenSP'].'</td>
                                                    <td>'.$item['SoLuongBL'].'</td>
                                                    <td>'.$item['MoiNhat'].'</td>
                                                    <td>'.$item['CuNhat'].'</td>
                                                    <td><a href="admin/binhluan/chitiet/'.$item['idSP'].'"><button type="button"  class="btn btn-info chinhsua"><i class="far fa-eye"></i></button></a></td>
                                               </tr>';
                                           }
                                      }
                                 ?>
                             </tbody>
                        </table>
                        <div id="phantrang">
                           <?php             
                                   $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                   $sotrang = ceil($_SESSION['SoLuongBL'] / 10);
                                   if($sotrang > 1){
                                        $prev = (int)$page - 1;
                                        $next = (int)$page + 1;
                                        if($page > 1){
                                             echo '<a href="admin/binhluan/&page='.$prev.'"><button class="btn_phantrang btn btn-info " data-page="'.$prev.'"><i class="fas fa-angle-left"></i></button></a>';

                                        }
                                        for($i = 1; $i<=$sotrang; $i++){
                                             if($page == $i){
                                                  echo '<a href="admin/binhluan/&page='.$i.'"><button  class="btn_phantrang btn btn-primary " data-page="'.$i.'">'.$i.'</button></a>';    
                                             }else{
                                                  echo '<a href="admin/binhluan/&page='.$i.'"><button  class="btn_phantrang btn btn-info " data-page="'.$i.'">'.$i.'</button></a>';
                                             }

                                        }
                                        if($page < $sotrang){
                                             echo '<a href="admin/binhluan/&page='.$next.'"><button class="btn_phantrang btn btn-info " data-page="'.$next.'"><i class="fas fa-angle-right"></i></button></a>';
                                        }
                                   }

                            ?>
                        </div>
                        <!-- <div class="bot">
                              <div class="chontatca">
                                  <button id="chontatca" type="button"  class="btn btn-primary chon-all">Chọn tất cả</button>
                                  <button id="bochontatca" type="button"  class="btn btn-primary bochon-all">Bỏ chọn tất cả</button>
                                  <button id="xoa" type="button" class="btn btn-danger xoa-all">Xóa</button>
                            </div>
                        </div> -->
                   </div>
             </div>
        </main>
    </div>
</body>
</html>