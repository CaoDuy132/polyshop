<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Quản lý đơn hàng</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/admin_sanpham.css">
    <link rel="stylesheet" href="/wiew/public/css/quanlydonhang.css">
    <link rel="stylesheet" href="/wiew/public/css/load.css">
    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/wiew/public/js/quanlydonhang.js"></script>
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
<style>
    .thongtinchitiet{
        max-width: 50%;
        margin-bottom: 1em;
    }
    .thongtinchitiet p{
        margin-bottom: 0.7em;
    }
</style>
</head>
<body>
     <div class="container-fluid" style="margin: 0; padding: 0;">
        <?php require_once './wiew/admin/layout/header.php'; ?>
        <main class="content">
             <?php 
                require_once './wiew/admin/layout/menu.php';
                $item = mysqli_fetch_assoc($data['chitietdonhang']);
             ?>
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Quản lý đơn hàng</h1>
                        </div>
                          <div class="back-page">
                                 <a href="/admin/donhang">
                                     <button><i class="fas fa-sign-out-alt"></i></button>
                                 </a>
                        </div>
                        <div style="margin-bottom: 1em;" class="action">
                              <h5>Chi tiết đơn hàng : <?php echo $_SESSION['idDonHang'] ?></h5>
                        </div>
                        <div class="thongtinchitiet">
                             <p>Tên người nhận : <?php echo $item['TenNguoiNhan'] ?></p>
                             <p>Địa chỉ nhận : <?php echo $item['DiaChiNhan'] ?></p>
                             <p>SDT liên hệ : <?php echo $item['SDT'] ?></p>
                             <p>Ghi chú : <?php echo $item['GhiChu'] ?></p>
                        </div>
                       <div class="wrapper-content shadow-none p-3 mb-5 bg-light rounded" style="min-height: 450px;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Màu sắc</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>       
                                     <?php 
                                             echo '
                                             <tr>
                                                <th>'.$item['idCTDH'].'</th>
                                                <td><img src="/wiew/public/upload/'.$item['AnhDaiDien'].'" alt=""></td>
                                                <td>'.$item['TenSP'].'</td>
                                                <td>'.$item['MauSac'].'</td>
                                                <td>'.$item['TenSize'].'</td>      
                                                <td>'.$item['SoLuongDH'].'</td>
                                                <td>'.number_format($item['Gia']).' VND</td>
                                                <td>'.number_format($item['ThanhTien']).' VND</td>
                                             </tr>';
                                        
                                     ?>
                                    
                                </tbody>
                            </table>
                       </div>    
                        <div id="phantrang">
                            
                        </div>
                        <div class="bot" style="display:none">
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