<?php

use Google\Service\Adsense\Cell;

class sanphamController extends BaseController{
        
       public function index(...$params){
            $giohangModel = $this->model('giohangModel');
            $giohangModel->check_cookie();
            $tendanhmuc = isset($params[0]) ? str_replace('-' , ' ' , $params[0]) : '';
            $_SESSION['TenDanhMuc'] = $tendanhmuc;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '';
            $gia_min = isset($_GET['GiaMin']) ? $_GET['GiaMin'] : 0;
            $gia_max = isset($_GET['GiaMax']) ? $_GET['GiaMax'] : 1000000;
            $list_color = isset($_GET['list_color']) ? explode('-',$_GET['list_color']) : [];
            $size = isset($_GET['size']) ? $_GET['size'] : '';
            $sanphamModel = $this->model('sanphamModel');
            $result_sanpham = $sanphamModel->show_sanpham_by_danhmuc($tendanhmuc , $page , $orderby , $gia_min , $gia_max , $list_color , $size );
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $this->show($result_user , $result_sanpham);
       }


       public function show($result_user , $result_sanpham){
           $this->wiew('sanpham', 'index' , ['user'=>$result_user , 'sanpham'=>$result_sanpham]);
       }



       public function show_sanpham_ajax(){
           $tendanhmuc = isset($_SESSION['TenDanhMuc']) ? $_SESSION['TenDanhMuc'] : '';
           $orderby = isset($_POST['tieuchi']) ? $_POST['tieuchi'] : '';
           $page = isset($_POST['page']) ? $_POST['page'] : 1;
           $gia_min = isset($_POST['GiaMin']) ? $_POST['GiaMin'] : 0;
           $gia_max = isset($_POST['GiaMax']) ? $_POST['GiaMax'] : 1000000;
           $list_color = isset($_POST['list_color']) ? $_POST['list_color'] : [];
           $size = isset($_POST['size']) ? $_POST['size'] : '';
           
           $sanphamModel = $this->model('sanphamModel');
           $result_sanpham = $sanphamModel->show_sanpham_by_danhmuc($tendanhmuc , $page , $orderby , $gia_min , $gia_max , $list_color , $size );
           if(is_object($result_sanpham) == true && $result_sanpham->num_rows > 0){
            foreach($result_sanpham as $item){
                 $giakm = ($item['Gia'] / 100) * (100 - $item['PhanTramKhuyenMai']);
                 echo '
                    <div class="box-item">
                          <div class="box-img">
                               <a href="chitietsanpham/'.$item['idSP'].'"><img src="/wiew/public/upload/'.$item['AnhDaiDien'].'" alt=""></a>';
                              if($item['PhamTramKhuyenMai'] > 0){
                                   echo '<span class="giamgia">-'.$item['PhanTramKhuyenMai'].'%</span>';
                              }
                          echo '
                               <div class="action">
                                   <button data-id="'.$item['idSP'].'" class="themvaogio">THÊM VÀO GIỎ</button>
                                   <button data-id="'.$item['idSP'].'" class="muangay">MUA NGAY</button>
                               </div>
                          </div>
                      <a href="chitietsanpham/'.$item['idSP'].'">
                          <div class="box-text">
                               <p class="tensp">'.$item['TenSP'].'</p>
                               <div class="gia">
                                    <p>'.number_format($item['Gia']).'đ</p>';
                               if($item['PhanTramKhuyenMai'] > 0){
                                    echo '<p class="giakm"><strike>350.000đ</strike></p>';
                               }
                               echo '     
                               </div>
                          </div>
                     </a>
                   </div>';
               }
            }
       }


       

       public function create_btn_ajax(){
          $tendanhmuc = isset($_SESSION['TenDanhMuc']) ? $_SESSION['TenDanhMuc'] : '';
          $page = isset($_POST['page']) ? $_POST['page'] : 1;
          $sanphamModel = $this->model('sanphamModel');
          $sotrang = ceil($_SESSION['SoLuongSP'] / 9);
          if($sotrang > 1){
               if($page > 1){
                    echo '<i style="margin:0 20px" class="btn-phantrang fas fa-long-arrow-alt-left" data-page="'.($page - 1).'"></i>';
                }
                for($i=1; $i<= $sotrang; $i++){
                    if($i == $page){
                        echo '<span style="background-color: #ff5c62;color:white;" class="btn-phantrang" data-page="'.$i.'">'.$i.'</span>';
                    }else{
                        echo '<span class="btn-phantrang" data-page="'.$i.'">'.$i.'</span>';
                    }
                }
                if($page < $sotrang){
                    echo '<i style="margin:0 10px" class="btn-phantrang fas fa-long-arrow-alt-right" data-page="'.($page + 1).'"></i>';
                }
          }
       }

   
       public function show_chitietsanpham(){
            $idSP = isset($_POST['idSP']) ? $_POST['idSP'] : 0;
            $idCTSP =  isset($_POST['idCTSP']) ? $_POST['idCTSP'] : 0;
            $sanphamModel = $this->model('sanphamModel');
            $result = $sanphamModel->get_thongtinchitiet_sanpham($idSP , $idCTSP);
            $result_color = $sanphamModel->show_list_color($idSP);
            
            $item = mysqli_fetch_assoc($result);
            $id_item = $item['idCTSP'];
            $result_size = $sanphamModel->show_list_size($id_item);
            echo '
            <div class="left">
                <div class="box-img">
                    <img src="/wiew/public/upload/'.$item['AnhDaiDien'].'" alt="">
               </div>
            </div>
            <div class="right">
               <div class="mausac">
                    <h1>Màu có sẵn <span style="color: #e96b6d;">*</span></h1>
                    <div class="box-color">';

          foreach($result_color as $item){
               echo '<div class="show-color-detail" data-id="'.$item['idCTSP'].'" style="border: 1px solid '.$item['MaMau'].';"><span style="background-color: '.$item['MaMau'].';"></span></div>';
          }
                     
          echo '    </div>
               </div>
               <div class="size">
                    <h1>Size có sẵn <span style="color: #e96b6d;">*</span></h1>
                    <div class="size-action">
                    <select name="" id="chonsize">
                        <option value="" selected disabled hidden>Chọn size</option>';         
                        foreach($result_size as $item){        
                             echo ' <option data-id="'.$item['idSize'].'" value="'.$item['TenSize'].'">'.$item['TenSize'].'</option>';
                        }  
          echo '    </select>
                    <p id="SoLuongSize"></p>
                   </div>
                   <div class="ChonSoLuongSize">
                         <h1>Chọn số lượng</h1>
                         <div class="ChonSoLuongSize-action">
                              <button id="GiamSoLuong">-</button>
                              <input id="SoLuongSP" type="number" value="1">
                              <button id="TangSoLuong">+</button>
                         </div>
                         <p id="SoLuongToiDa"></p>
                    </div>
               </div>
          </div>';
       } 

       public function show_size(){
            $idSize = isset($_POST['idSize']) ? $_POST['idSize'] : 0;
            $sanphamModel = $this->model('sanphamModel');
            $result = $sanphamModel->show_soluong_size($idSize);
            $size = mysqli_fetch_assoc($result);
            echo $size['SoLuong'];
       }

       public function show_soluongsp_hienthi(){      
            if( $_SESSION['result_sanpham'] == 0) return;
            $sotrangchan = floor($_SESSION['SoLuongSP'] / 9);
            $page = isset($_POST['page']) ? $_POST['page'] : 1;
            if($page <= $sotrangchan){
               $result_end = $page * 9;
               $result_start = ( ($result_end - 9) + 1);
               echo 'Hiển thị '.$result_start.'-'.$result_end.' trên '.$_SESSION['SoLuongSP'].' sản phẩm';
            }else{
               $soluongsp_conlai = $_SESSION['SoLuongSP'] % 9;
               $result_end = $_SESSION['SoLuongSP'];
               $result_start = ($_SESSION['SoLuongSP'] -  $soluongsp_conlai) + 1;
               echo 'Hiển thị '.$result_start.'-'.$result_end.' trên '.$_SESSION['SoLuongSP'].' sản phẩm';
            }
       }


   
   }

?>