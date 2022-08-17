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

</head>
<body>
     <div class="container-fluid" style="margin: 0; padding: 0;">
        <?php require_once './wiew/admin/layout/header.php'; ?>
        <main class="content">
             <?php require_once './wiew/admin/layout/menu.php'; ?>
             <?php $list_trangthai = $data['list_trangthai']; ?>
             <div class="right">
                   <div class="mid">
                        <div class="tendanhmuc">
                             <h1>Quản lý đơn hàng</h1>
                        </div>
                        <div class="show-trangthai">
                             <h5>Xem list trạng thái</h5>
                             <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="wrapper-list-trangthai">
                            <div class="list-trangthai">
                                    <div class="box-item-trangthai" data-trangthai="2">
                                        <p>Đã tiếp nhận</p>
                                        <span>(<?php echo $list_trangthai['datiepnhan'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="-1">
                                        <p>Đã hủy</p>
                                        <span>(<?php echo $list_trangthai['dahuy'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    
                                    <div class="box-item-trangthai" data-trangthai="3">
                                        <p>Đã lấy</p>
                                        <span>(<?php echo $list_trangthai['dalay'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="4">
                                        <p>Đang giao hàng</p>
                                        <span>(<?php echo $list_trangthai['danggiaohang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="5">
                                        <p>Đã giao hàng</p>
                                        <span>(<?php echo $list_trangthai['dagiaohang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="6">
                                        <p>Đã đối soát</p>
                                        <span>(<?php echo $list_trangthai['dadoisoat'] ?>)</span>
                                    </div>
                                    <div class="box-item-trangthai" data-trangthai="7">
                                        <p>Không lấy được hàng</p>
                                        <span>(<?php echo $list_trangthai['khonglayduochang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="9">
                                        <p>Không giao được</p>
                                        <span>(<?php echo $list_trangthai['khonggiaoduoc'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="10">
                                        <p>Delay giao hàng</p>
                                        <span>(<?php echo $list_trangthai['delaygiaohang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="11">
                                        <p>Đã đối soát công nợ trả hàng</p>
                                        <span>(<?php echo $list_trangthai['dadoisoatcongno'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="12">
                                        <p>Đã điều phối lấy hàng/Đang lấy hàng</p>
                                        <span>(<?php echo $list_trangthai['dadieuphoidanglayhang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="13">
                                        <p>Đơn hàng bồi hoàn</p>
                                        <span>(<?php echo $list_trangthai['donhangboihoan'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="20">
                                        <p>Đang trả hàng (COD cầm hàng đi trả)</p>
                                        <span>(<?php echo $list_trangthai['dangtrahang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="21">
                                        <p>Đã trả hàng (COD đã trả xong hàng)</p>
                                        <span>(<?php echo $list_trangthai['datrahang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="123">
                                        <p>Shipper báo đã lấy hàng</p>
                                        <span>(<?php echo $list_trangthai['shipperbaodalay'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="127">
                                        <p>Shipper (nhân viên lấy/giao hàng) báo không lấy được hàng</p>
                                        <span>(<?php echo $list_trangthai['shipperbaokhonglayduoc'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="128">
                                        <p>Shipper báo delay lấy hàng</p>
                                        <span>(<?php echo $list_trangthai['shipperbaodelaylayhang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="45">
                                        <p>Shipper báo đã giao hàng</p>
                                        <span>(<?php echo $list_trangthai['shiperbaodagiaohang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="49">
                                        <p>Shipper báo không giao được giao hàng</p>
                                        <span>(<?php echo $list_trangthai['shipperbaokhonggiaoduochang'] ?>)</span>
                                    </div>
                                    <i class="fas fa-angle-right"></i>
                                    <div class="box-item-trangthai" data-trangthai="410">
                                        <p>Shipper báo delay giao hàng</p>
                                        <span>(<?php echo $list_trangthai['shipperbaodelaygiaohang'] ?>)</span>
                                    </div>                               
                            </div>
                         </div>
                        <div class="action" style="justify-content:space-between">
                              <div class="action-left">
                                    <h5>Tổng tiền <span id="thang"></span> : <span id="tongtien"><?php echo number_format($data['tongtien']) . ' VND' ?></span></h5>
                              </div>
                              <div class="tieuchi">
                                <p>Hiển thị theo</p>
                                <select name="" id="select">
                                    <option value="" selected disabled hidden>Chọn tháng</option>
                                    <option value="1" >Tháng 1</option>
                                    <option value="2" >Tháng 2</option>
                                    <option value="3" >Tháng 3</option>
                                    <option value="4" >Tháng 4</option>
                                    <option value="5" >Tháng 5</option>
                                    <option value="6" >Tháng 6</option>
                                    <option value="7" >Tháng 7</option>
                                    <option value="8" >Tháng 8</option>
                                    <option value="9" >Tháng 9</option>
                                    <option value="10" >Tháng 10</option>
                                    <option value="11" >Tháng 11</option>
                                    <option value="12" >Tháng 12</option>              
                                </select>
                              </div>
                        </div>
                       <div class="wrapper-content shadow-none p-3 mb-5 bg-light rounded" style="min-height: 450px;">
                            <p class="dohang-null" style="display: none;" >Không có đơn hàng nào.</p>
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái thanh toán</th>
                                    <th scope="col">Trạng thái đơn hàng</th>
                                    <th scope="col">Xem chi tiết</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="donhang-content">       
                                    <?php 
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
                                       $i = 1;
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
                                            $status = $response->order->status;
                                            $trangthai = '';
                                            foreach($list_trangthai as $stt => $value){
                                                if($stt == $status){
                                                    $trangthai = $value;
                                                }
                                            }
                                            $tongtien = $item['TongTien'] + $item['PhiGiaoHang'];

                                            echo '<tr>';
                                            echo 
                                               '<th scope="row">'.$i.'</th>
                                                <td class="tongtien">'.number_format($tongtien).' VND</td>
                                                <td>'.$item['TrangThaiThanhToan'].'</td>';
                                                if($item['YeuCauHuy'] == 'yes' && $status == 2){
                                                    echo 
                                                    '<td class="text-warning">Yêu cầu hủy từ khách</td>
                                                    <td><a href="admin/donhang/chitietdonhang/'.$item['id'].'"><button type="button" class="btn btn-info"><i class="far fa-eye"></i></button></a></td>      
                                                    <td><button id-donhang="'.$item['id'].'"  data-id-delete="'.$item['partner_id'].'" type="button" class="btn btn-danger huy-don"><i class="fas fa-trash-alt"></i></button></td>';
                                                }
                                                else{        
                                                    if($status < 2){
                                                        echo '<td >'.$trangthai.'</td>
                                                        <td><a href="admin/donhang/chitietdonhang/'.$item['id'].'"><button type="button" class="btn btn-info"><i class="far fa-eye"></i></button></a></td>      
                                                        <td></td>';     
                                                    }else{
                                                        echo '<td >'.$response->order->status_text.'</td>
                                                        <td><a href="admin/donhang/chitietdonhang/'.$item['id'].'"><button type="button" class="btn btn-info"><i class="far fa-eye"></i></button></a></td>      
                                                        <td></td>';       
                                                    }         
                                                }
                                                
                                        echo '
                                        </tr>';
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                       </div>    
                        <div id="phantrang">
                            <?php        
                                   $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                   $sotrang = ceil($_SESSION['soluong_donhang'] / 10);  
                                   if($sotrang > 1){
                                        $prev = (int)$page - 1;
                                        $next = (int)$page + 1;
                                        if($page > 1){
                                             echo '<a href="admin/donhang/&page='.$prev.'"><button class="btn_phantrang btn btn-info " data-page="'.$prev.'"><i class="fas fa-angle-left"></i></button></a>';

                                        }
                                        for($i = 1; $i<=$sotrang; $i++){
                                             if($page == $i){
                                                  echo '<a href="admin/donhang/&page='.$i.'"><button  class="btn_phantrang btn btn-primary " data-page="'.$i.'">'.$i.'</button></a>';    
                                             }else{
                                                  echo '<a href="admin/donhang/&page='.$i.'"><button  class="btn_phantrang btn btn-info " data-page="'.$i.'">'.$i.'</button></a>';
                                             }

                                        }
                                        if($page < $sotrang){
                                             echo '<a href="admin/donhang/&page='.$next.'"><button class="btn_phantrang btn btn-info " data-page="'.$next.'"><i class="fas fa-angle-right"></i></button></a>';
                                        }
                                   }

                            ?>
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