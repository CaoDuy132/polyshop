<?php

    class giohangModel extends connect{


         public function check_cookie(){
             if(isset($_COOKIE['giohang']) && !isset($_SESSION['giohang'])){
                 $_SESSION['giohang'] = json_decode($_COOKIE['giohang'] , true);
             }
         }

         
         public function add_item($idSize , $SoLuong){
              $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP , size.id as idSize
              FROM sanpham
              INNER JOIN chitietsanpham
              ON(sanpham.id = chitietsanpham.idSanPham)
              INNER JOIN size
              ON(chitietsanpham.id = size.idChiTietSanPham)
              WHERE size.id = $idSize";
              $result = $this->connect->query($query);
              $SanPham = mysqli_fetch_assoc($result);
              if($SanPham['PhanTramKhuyenMai'] > 0){
                  $SanPham['Gia'] = ($SanPham['Gia'] / 100) * (100 - $SanPham['PhanTramKhuyenMai']);
              } 

             if(empty($_SESSION['giohang'])){            
                 $id  = mt_rand();
                 $_SESSION['giohang'][$id] = 
                   [ 
                    'id'=> $id,
                    'TenSP'=>$SanPham['TenSP'] ,
                    'HinhAnh' => $SanPham['AnhDaiDien'],
                    'Gia'=>$SanPham['Gia'],
                    'MauSac'=>$SanPham['MauSac'] ,
                    'TenSize'=>$SanPham['TenSize'] ,
                    'idSize' => $SanPham['idSize'],
                    'SoLuong'=>(int)$SoLuong,
                    'idSP'=>$SanPham['idSP']
                   ];
             }else{
                 $boolean = false;
                 foreach($_SESSION['giohang'] as $item){
                     if($item['idSize'] == $SanPham['idSize']){
                         $id = $item['id'];
                         $_SESSION['giohang'][$id]['SoLuong'] += (int)$SoLuong;
                         $boolean = true;
                     }
                 }     
                 if($boolean == false){
                    $id  = mt_rand();
                    $_SESSION['giohang'][$id] = 
                      [ 
                       'id'=> $id,
                       'TenSP'=>$SanPham['TenSP'] ,
                       'HinhAnh' => $SanPham['AnhDaiDien'],
                       'Gia'=>$SanPham['Gia'],
                       'MauSac'=>$SanPham['MauSac'] ,
                       'TenSize'=>$SanPham['TenSize'] ,
                       'idSize' => $SanPham['idSize'],
                       'SoLuong'=>(int)$SoLuong
                      ];
                 }
             }
              setcookie('giohang' , json_encode($_SESSION['giohang']) , strtotime('+1 year') , '/');      
         }


         public function delete_item($id){
             foreach($_SESSION['giohang'] as $item){
                 if($item['id'] == $id){
                     unset($_SESSION['giohang'][$id]);
                 }
             }
             setcookie('giohang' , json_encode($_SESSION['giohang']) , strtotime('+1 year') , '/');      
         }

         

         public function giam_soluong($id){
            foreach($_SESSION['giohang'] as $item){
                if($item['id'] == $id){
                    if($_SESSION['giohang'][$id]['SoLuong'] > 1){
                        $_SESSION['giohang'][$id]['SoLuong'] -= 1;
                    }
                }
            }    
            setcookie('giohang' , json_encode($_SESSION['giohang']) , strtotime('+1 year') , '/');   
        }


        public function tang_soluong($id){
            foreach($_SESSION['giohang'] as $item){
                if($item['id'] == $id){          
                    $_SESSION['giohang'][$id]['SoLuong'] += 1;      
                }
            }
            setcookie('giohang' , json_encode($_SESSION['giohang']) , strtotime('+1 year') , '/');   
        }
    }

?>