<?php

   class donhangModel extends connect{


    
    public function get_donhang($page){
        $offset = ((int)$page - 1) * 10;
        $query = "SELECT * FROM donhang";
        $result = $this->connect->query($query);
        $_SESSION['soluong_donhang'] = $result->num_rows;
        $query .= " LIMIT $offset , 10";
        return $this->connect->query($query);
    }

      
    public function get_donhang_theothang( $thang){
        $query = "SELECT * FROM donhang
        WHERE month(donhang.NgayThem) = $thang";
        $result = $this->connect->query($query);
        $_SESSION['soluong_donhang'] = $result->num_rows;
        $result = $this->connect->query($query);
        $list_trangthai = [
            '-1' => 'Đã hủy' , '1'=>'Chưa tiếp nhận' , '2'=>'Đã tiếp nhận' , '3'=>'Đã lấy hàng',
            '4' => 'Đang giao hàng' , '5' => 'Đã giao hàng', '6' => 'Đã đối soát' , '7' => 'Không lấy được hàng',
            '8' => 'Hoãn lấy hoàng' , '9' => 'Không giao được hàng' , '10' => 'Delay giao hàng'
        ]; 
        $i = 1;
        foreach($result as $item){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/v2/" . $item['id'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HTTPHEADER => array(
                    "Token: ",
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
                }else{  
                    if($status < 2){
                        echo '<td class="text-danger">'.$trangthai.'</td>
                        <td><a href="admin/donhang/chitietdonhang/'.$item['id'].'"><button type="button" class="btn btn-info"><i class="far fa-eye"></i></button></a></td>      
                        <td></td>';
                    }else if($status >= 2){
                        echo '<td >'.$trangthai.'</td>
                        <td><a href="admin/donhang/chitietdonhang/'.$item['id'].'"><button type="button" class="btn btn-info"><i class="far fa-eye"></i></button></a></td>      
                        <td></td>';
                    }
                }
        echo '
        </tr>';
        $i++;
        }
    }

    public function get_tongtien(){
        $query = "SELECT * FROM donhang";
        $result = $this->connect->query($query);
        $tongtien = 0;
        foreach($result as $item){
            $tongtien += $item['TongTien'];
        }
        return $tongtien;
    }

    public function get_tongtien_donhang($thang){
        $query = "SELECT * FROM donhang WHERE month(donhang.NgayThem) = $thang";
        $result = $this->connect->query($query);
        $tongtien = 0;
        foreach($result as $item){
            $tongtien += $item['TongTien'];
        }
        return $tongtien;
    }

  

    public function count_trangthai(){
        $result = $this->get_all_donhang();
        $arr_trangthai = [
            'datiepnhan'=>0 ,'dahuy'=>0 ,'dalay'=>0 ,'danggiaohang'=>0 ,'dagiaohang'=>0 ,'dadoisoat'=>0,'khonggiaoduoc'=>0,
            'khonglayduochang'=>0, 'delaygiaohang'=>0,'dadoisoatcongno'=>0,'dadieuphoidanglayhang'=>0,'donhangboihoan'=>0,
            'dangtrahang'=>0,'datrahang'=>0,'shipperbaodalay'=>0,'shipperbaokhonglayduoc'=>0,'shipperbaodelaylayhang'=>0,
            'shiperbaodagiaohang'=>0 , 'shipperbaokhonggiaoduochang'=>0, 'shipperbaodelaygiaohang'=>0
         ];
        foreach($result as $item){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/v2/" . $item['id'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HTTPHEADER => array(
                    "Token: ",
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            $status = $response->order->status;
            $i = 0;
            if($status == 2){
                $arr_trangthai['datiepnhan'] += 1;
            }else if($status == -1){
                $arr_trangthai['dahuy'] += 1;
            }else if($status == 3){
                $arr_trangthai['dalay'] += 1;
            }else if($status == 4){
                $arr_trangthai['dangiaohang'] += 1;
            }else if($status == 5){
                $arr_trangthai['dagiaohang'] += 1;
            }else if($status == 6){
                $arr_trangthai['dadoisoat'] += 1;
            }else if($status == 7){
                $arr_trangthai['khonglayduochang'] += 1;
            }else if($status == 9){
                $arr_trangthai['khonggiaoduoc'] += 1;
            }else if($status == 10){
                $arr_trangthai['delaygiaohang'] += 1;
            }else if($status == 11){
                $arr_trangthai['dadoisoatcongno'] += 1;
            }else if($status == 12){
                $arr_trangthai['dadieuphoidanglayhang'] += 1;
            }else if($status == 13){
                $arr_trangthai['donhangboihoan'] += 1;
            }else if($status == 20){
                $arr_trangthai['dangtrahang'] += 1;
            }else if($status == 21){
                $arr_trangthai['datrahang'] += 1;
            }else if($status == 123){
                $arr_trangthai['shipperbaodalay'] += 1;
            }else if($status == 127){
                $arr_trangthai['shipperbaokhonglayduoc'] += 1;
            }else if($status == 128){
                $arr_trangthai['shipperbaodelaylayhang'] += 1;
            }else if($status == 45){
                $arr_trangthai['shiperbaodagiaohang'] += 1;
            }else if($status == 49){
                $arr_trangthai['shipperbaokhonggiaoduochang'] += 1;
            }else if($status == 410){
                $arr_trangthai['shipperbaodelaygiaohang'] += 1;
            }
        
        }
        return $arr_trangthai;
    }

    public function get_chitietdonhang($id){
        $query = "SELECT * , chitietdonhang.SoLuong as SoLuongDH , donhang.id as idDonHang ,size.id as idSize , chitietdonhang.id as idCTDH , chitietsanpham.id as idCTSP , sanpham.id as idSP 
        FROM donhang
        INNER JOIN chitietdonhang
        ON(donhang.id = chitietdonhang.idDonHang)
        INNER JOIN size
        ON(chitietdonhang.idSize = size.id)
        INNER JOIN chitietsanpham
        ON(size.idChiTietSanPham = chitietsanpham.id)
        INNER JOIN sanpham
        ON(chitietsanpham.idSanPham = sanpham.id)
        WHERE chitietdonhang.idDonHang ='$id'
        GROUP BY chitietdonhang.id";            
        return $this->connect->query($query);
    }

       public function get_all_donhang(){
           $query = "SELECT * FROM donhang";
           return $this->connect->query($query);
       }
       public function huydonhang($id){
           $query = "UPDATE donhang SET YeuCauHuy = 'yes' WHERE id = '$id'";
           return $this->connect->query($query);
       }

        public function huydonhang_api($id_delete , $id_donhang){
            $query = "UPDATE donhang SET YeuCauHuy ='' WHERE id = '$id_donhang'";
            $this->connect->query($query);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/cancel/partner_id:" . $id_delete,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HTTPHEADER => array(
                    "Token: ",
                ),
            )); 
            $response = curl_exec($curl);
            curl_close($curl);
            return $response = json_decode($response);
        }





        public function trangthai_donhang($idTrangThai){
            $result = $this->get_all_donhang();
            $list_trangthai = [
                '-1' => 'Đã hủy' , '1'=>'Chưa tiếp nhận' , '2'=>'Đã tiếp nhận' , '3'=>'Đã lấy hàng',
                '4' => 'Đang giao hàng' , '5' => 'Đã giao hàng', '6' => 'Đã đối soát' , '7' => 'Không lấy được hàng',
                '8' => 'Hoãn lấy hoàng' , '9' => 'Không giao được hàng' , '10' => 'Delay giao hàng'
            ]; 
            $i = 1;
            foreach($result as $item){
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/v2/" . $item['id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_HTTPHEADER => array(
                        "Token: ",
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

                if($status == $idTrangThai){
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
            }
        }

     
   }

?>