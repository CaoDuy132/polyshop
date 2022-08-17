<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion | Thông tin đơn hàng</title>
     <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/thongtintaikhoan.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="/wiew/public/js/danhmucsp.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/thongtindonhang.js"></script>
    <script src="/wiew/public/js/thongtintaikhoan.js"></script>



    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

 
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,200;0,700;1,200&family=Comfortaa&family=Encode+Sans+Condensed:wght@500&family=Inter:wght@300&family=Kanit:wght@300&family=Open+Sans&family=Quicksand&family=Raleway:wght@300&family=Righteous&family=Roboto+Condensed:wght@300;400&family=Rubik&family=Titillium+Web:wght@200;400&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">

    <!--thư viện slide-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">


</head>
<body>
     <div class="container-site">
          <?php require_once './wiew/layout_site/header.php';?>
           <main class="main">
                <div class="wrapper">
                     <div class="box-left">
                          <div class="top">
                               <input type="file" id="hinhanh" style="display:none">
                               <i id="edit-anhdaidien" class="fas fa-pencil-alt" onclick="$('#hinhanh').click()"></i>
                               <div class="box-img-user">
                                    <?php 
                                        if($user['Login_with'] == 'system'){
                                             echo '<img class="left-img-user" src="/wiew/public/upload/'.$user['AnhDaiDien'].'" alt="">';
                                        }else{
                                             echo '<img  src="'.$user['AnhDaiDien'].'" alt="">';
                                        }
                                    ?>
                               </div>
                               <div class="box-text-user">
                                    <h5><?php echo $user['HoTen'] ?></h5>
                                    <p>From : <?php echo $user['Login_with'] ?></p>
                               </div>
                          </div>
                          <div class="box-left-menu">
                                <div class="item">
                                   <a href="user">
                                        <div class="tieude">
                                             <i class="far fa-user"></i>
                                             <p>Thông tin tài khoản</p>
                                        </div>            
                                   </a>
                                </div>
                                <a href="user/thongtindonhang">
                                   <div class="item">
                                        <div class="tieude">
                                             <i class="fas fa-file-invoice"></i>
                                             <p>Thông tin đơn hàng</p>
                                        </div>
                                   </div>
                                </a>
                          </div>
                     </div>
                     <div class="box-right">
                          <div class="top" style="padding-bottom: 2em;">
                               <h5>Thông tin đơn hàng</h5>
                               <button id="open-search" class="open-search"><i class="fas fa-search"></i></button>
                          </div>
                          <div class="mid">
                                <div class="wrapper-mid" style="min-height: 420px;">
                                   
                                         
                                    <ul>
                                         <li class="li-top">
                                              <p class="id">Mã vận đơn</p>
                                              <p class="tongtien">Tổng tiền</p>
                                              <p class="ngaynhan">Ngày nhận ước tính</p>
                                              <p class="trangthaithanhtoan">Thanh toán</p>
                                              <p class="trangthaidonhang">Trạng thái đơn hàng</p>
                                              <p class="action-donhang">Action</p>
                                         </li>
                                         <!-- <li>
                                              <p class="id">S20465622.BO.MB20.G1.811577898</p>
                                              <p class="tongtien">200.000đ</p>
                                              <p class="ngaynhan">2021-12-05</p>
                                              <p class="trangthaithanhtoan">Chưa thanh toán</p>
                                              <p class="trangthaidonhang dahuy">Đã hủy</p>                
                                         </li>  -->
                                         <?php
                                                 if(!empty($data['donhang'])){
                                                     $list_trangthai = [
                                                       '-1' => 'Đã hủy' , '1'=>'Chưa tiếp nhận' , '2'=>'Đã tiếp nhận' , '3'=>'Đã lấy hàng',
                                                       '4' => 'Đang giao hàng' , '5' => 'Đã giao hàng', '6' => 'Đã đối soát' , '7' => 'Không lấy được hàng',
                                                       '8' => 'Hoãn lấy hoàng' , '9' => 'Không giao được hàng' , '10' => 'Delay giao hàng',
                                                       '11' => 'Đã đối soát công nợ trả hàng', '12'=> 'Đã điều phối lấy hàng/Đang lấy hàng',
                                                       '12'=> 'Đã điều phối lấy hàng/Đang lấy hàng' , '13'=>'Đơn hàng bồi hoàn' ,'20'=>'Đang trả hàng (COD cầm hàng đi trả)',
                                                       '21'=> 'Đã trả hàng (COD đã trả xong hàng)', '123'=>'Shipper báo đã lấy hàng', '127'=>'Shipper (nhân viên lấy/giao hàng) báo không lấy được hàng',
                                                       '128'=> 'Shipper báo delay lấy hàng' , '45'=> 'Shipper báo đã giao hàng','49'=>'Shipper báo không giao được giao hàng',
                                                       '410'=> 'Shipper báo delay giao hàng'
                                                     ]; 
                                                     foreach($data['donhang'] as $item){ 
                                                        $curl = curl_init();
                                                        curl_setopt_array($curl, array(
                                                            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/v2/" . $item['id'],
                                                            CURLOPT_RETURNTRANSFER => true,
                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                            CURLOPT_HTTPHEADER => array(
                                                                "Token: 931cDC40dD77442399740D77F9E9C8f4d4395C28",
                                                            ),
                                                        ));
                                                        
                                                        $response = curl_exec($curl);
                                                        curl_close($curl);     
                                                        $response = json_decode($response);
                                                        $tongtien = $item['TongTien'] + $item['PhiGiaoHang'];
                                                        $status = $response->order->status;
                                                        $trangthai = '';
                                                        foreach($list_trangthai as $stt => $value){
                                                            if($stt == $status){
                                                                $trangthai = $value;
                                                            }
                                                        }
                                                        if($item['YeuCauHuy'] == 'yes'){
                                                            echo ' <li>
                                                                 <p class="id">'.$response->order->label_id.'</p>
                                                                 <p class="tongtien">'.number_format($tongtien).'đ</p>
                                                                 <p class="ngaynhan">'.$response->order->deliver_date.'</p>
                                                                 <p class="trangthaithanhtoan">'.$item['TrangThaiThanhToan'].'</p>      
                                                                 <p class="trangthaidonhang dahuy">Yêu cầu hủy</p>
                                                            </li> ';
                                                        }else{
                                                            if($status == 2){
                                                                 echo 
                                                                 ' <li>
                                                                      <p class="id">'.$response->order->label_id.'</p>
                                                                      <p class="tongtien">'.number_format($tongtien).'đ</p>
                                                                      <p class="ngaynhan">'.$response->order->deliver_date.'</p>
                                                                      <p class="trangthaithanhtoan">'.$item['TrangThaiThanhToan'].'</p>      
                                                                      <p class="trangthaidonhang datiepnhan">'.$trangthai.'</p>
                                                                      <button data-id="'.$response->order->label_id.'" type="button" class="btn btn-primary action-donhang">Hủy đơn</button>
                                                                  </li> ';
                                                            }if($status < 2){
                                                                 echo 
                                                                 ' <li>
                                                                      <p class="id">'.$response->order->label_id.'</p>
                                                                      <p class="tongtien">'.number_format($tongtien).'đ</p>
                                                                      <p class="ngaynhan">'.$response->order->deliver_date.'</p>
                                                                      <p class="trangthaithanhtoan">'.$item['TrangThaiThanhToan'].'</p>
                                                                      <p class="trangthaidonhang dahuy">'.$trangthai.'</p>                
                                                                 </li> ';
                                                            }else if($status > 2){
                                                                 echo 
                                                                 ' <li>
                                                                      <p class="id">'.$response->order->label_id.'</p>
                                                                      <p class="tongtien">'.number_format($tongtien).'đ</p>
                                                                      <p class="ngaynhan">'.$response->order->deliver_date.'</p>
                                                                      <p class="trangthaithanhtoan">'.$item['TrangThaiThanhToan'].'</p>
                                                                      <p class="trangthaidonhang">'.$response->order->status_text.'</p>                
                                                                 </li> ';
                                                            }
                                                        }      
                                                     }
                                                 }
                                            
                                            ?>
                                            
                                    </ul>
                                </div>
                          </div>
                     </div>
                </div>
           </main>
          <?php require_once './wiew/layout_site/footer.php'; ?>
     </div>
</body>
</html>