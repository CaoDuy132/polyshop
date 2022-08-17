<?php

   class thanhtoanController extends BaseController{
       public function index(){
         $userModel = $this->model('userModel');
         $diachiModel = $this->model('diachiModel');
         $tinhthanhpho = $diachiModel->show_thanhpho();
         $quanhuyen = $diachiModel->show_quanhuyen();
         $xaphuongthitran = $diachiModel->show_xaphuongthitran();
         $result_user = $userModel->get_info_user();
         $this->show($result_user , $tinhthanhpho , $quanhuyen , $xaphuongthitran);
       }

       

       public function show($result_user , $tinhthanhpho , $quanhuyen , $xaphuongthitran){
           $this->wiew('thanhtoan' , 'index' , 
           [
             'user'=>$result_user ,
            'tinhthanhpho'=>$tinhthanhpho,
             'quanhuyen' =>$quanhuyen,
             'xaphuongthitran'=> $xaphuongthitran
           ]
        );
       }

       public function tao_donhang(){
           $hoten = isset($_POST['hoten']) ? trim($_POST['hoten']) : '';
           $email = isset($_POST['email']) ? $_POST['email'] : '';
           $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
           $tinhthanhpho = isset($_POST['tinhthanhpho']) ? $_POST['tinhthanhpho'] : '';
           $quanhuyen = isset($_POST['quanhuyen']) ? $_POST['quanhuyen'] : '';
           $phuongxa = isset($_POST['phuongxa']) ? $_POST['phuongxa'] : '';
           $ghichu = isset($_POST['ghichu']) ? trim($_POST['ghichu']) : '';
           $hinhthucthanhtoan = isset($_POST['hinhthucthanhtoan']) ? $_POST['hinhthucthanhtoan'] : '';
           $phivanchuyen = isset($_POST['phivanchuyen']) ? (int)$_POST['phivanchuyen'] : '';
           $diachi = [$phuongxa , $quanhuyen , $tinhthanhpho];
           $diachi = implode( ' - ' , $diachi);
           $products = [];
           $tongtien = 0;
           if(!empty($_SESSION['giohang'])){
               foreach($_SESSION['giohang'] as $item){
                   $thanhtien = $item['Gia'] * $item['SoLuong'];
                   $tongtien += $thanhtien;
                   $obj = [];
                   $obj['name'] = $item['TenSP'] . ' - ' .$item['MauSac'] . ' - Size ' . $item['TenSize'] ;
                   $obj['weight'] = 0.3;
                   $obj['quantity'] = $item['SoLuong'];
                   $obj['price'] = $thanhtien;
                   $obj['product_code'] = mt_rand();
                   array_push($products , $obj);
               }
           }
            $idDonHang = mt_rand();
            $obj_order = [
                        "id" => "$idDonHang",
                        "pick_name" => "Trần Minh Cường",
                        "pick_address"=>"Hẽm 119",
                        "pick_province"=> "TP Hồ Chí Minh",
                        "pick_district"=> "Quận 12",
                        "pick_ward"=> "Phường Tân Thới Hiệp",
                        "pick_tel"=> "0329497489",
                        "tel"=> "$sdt",
                        "name"=> "$hoten",
                        "address"=> "$phuongxa",
                        "province"=> "$tinhthanhpho",
                        "district"=> "$quanhuyen",
                        "ward"=> "$phuongxa",
                        "street"=> "$phuongxa",
                        "hamlet"=> "$phuongxa",
                        "email"=> "$email",
                        "pick_money"=> $tongtien,
                        "note"=> "Khối lượng tính cước tối đa: 1.00 kg",
                        "value"=> $tongtien,
                        "transport"=> "road",
                        "pick_option"=>"cod",      
                        "deliver_option" => "none",  
                        "tags"=> ["Dễ vỡ"],
                        "return_name"=> "Trần Minh Cường",
                        "return_address"=> "Hẽm 119",
                        "return_province"=> "TP Hồ Chí Minh",
                        "return_district"=> "Quận 12",
                        "return_tel"=> "0329497489",
                        "return_email"=> "cuongtmps17955@gmail.com"
            ];
            $obj_order = (object) $obj_order;
         
            if($hinhthucthanhtoan == 'tienmat'){
                $order = json_encode((object)[ "products"=>$products , "order"=>$obj_order]);

                $curl = curl_init();       
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/order",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $order,
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/json",
                        "Token: ",
                        "Content-Length: " . strlen($order),
                    ),
                ));
                
                $response = curl_exec($curl);
                curl_close($curl);      
                $response = json_decode($response);
                if($response->success == true){
                    $_SESSION['tienmat_sucess'] = 1;
                    $thanhtoanModel = $this->model('thanhtoanModel');
                    $thanhtoanModel->set_size();
                    $idNguoiDung = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
                    $label_id = $response->order->label;
                    $partner_id = $response->order->partner_id;
                    $thanhtoanModel->donhang_tienmat( $label_id , $partner_id ,$tongtien , $hoten, $diachi , $sdt  , $phivanchuyen , $ghichu , $idNguoiDung);
                }    
                echo "<pre>"; print_r($response) ; echo "</pre>";      
            }
             else{
               $_SESSION['thongtinthanhtoan'] = 
               [
                 'hoten' => $hoten,
                 'sdt' =>$sdt,
                 'email'=>$email,
                 'tinhthanhpho' => $tinhthanhpho,
                 'quanhuyen'=>$quanhuyen,
                 'phuongxa'=>$phuongxa,
                 'ghichu'=>$ghichu,
                 'phivanchuyen'=>$phivanchuyen
               ];
           }
       }



       public function show_tinhthanhpho_ajax(){
           $value = isset($_POST['value']) ? $_POST['value'] : '';
           $diachiModel = $this->model('diachiModel');
           $result = $diachiModel->show_tinhthanhpho_ajax($value);
           foreach($result as $item){
            echo '<li class="value-thanhpho" id="'.$item['matp'].'">'.$item['name'].'</li>';
           }
       }

       public function show_quanhuyen_ajax(){
          $idtp = isset($_POST['idtp']) ? $_POST['idtp'] : '';
          $value = isset($_POST['value']) ? $_POST['value'] : '';
          $diachiModel = $this->model('diachiModel');
          $result = $diachiModel->show_quanhuyen_ajax($idtp , $value);
          foreach($result as $item){
            echo '<li class="value-quanhuyen" id="'.$item['maqh'].'">'.$item['name'].'</li>';
          }
       }

       
       public function show_phuongxa_ajax(){
        $idqh = isset($_POST['idqh']) ? $_POST['idqh'] : 0;
        $value = isset($_POST['value']) ? $_POST['value'] : '';
        $diachiModel = $this->model('diachiModel');
        $result = $diachiModel->show_phuongxa_ajax( $idqh , $value);
        foreach($result as $item){
          echo '<li class="value-phuongxa">'.$item['name'].'</li>';
        }
     }

     public function show_phivanchuyen_api(){
          $tinhthanhpho = isset($_POST['tinhthanhpho']) ? $_POST['tinhthanhpho'] : '';
          $quanhuyen = isset($_POST['quanhuyen']) ? $_POST['quanhuyen'] : '';
          $phuongxa = isset($_POST['phuongxa']) ? $_POST['phuongxa'] : '';
          $tamtinh = isset($_POST['tamtinh']) ? (int)$_POST['tamtinh'] : '';

          $data = array(
              "pick_province" => "Hồ Chí Minh",
              "pick_district" => "Quận 12",
              "province" => "$tinhthanhpho",
              "district" => "$quanhuyen",
              "address" => "$phuongxa",
              "weight" => 200,
              "value" => $tamtinh,
              "transport" => "road",
              "deliver_option" => "none",
              "tags"  => [1]
          );
          $curl = curl_init();
          
          curl_setopt_array($curl, array(
              CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data),
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_HTTPHEADER => array(
                  "Token: ",
              ),
          ));
          
          $response = curl_exec($curl);
          curl_close($curl);
          
          $obj = json_decode($response);
          echo  $obj->fee->fee;
      }
   }

?>