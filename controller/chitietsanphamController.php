<?php
  
     class chitietsanphamController extends BaseController{
         public function index($params){
            $_SESSION['idSanPham'] = $params;
            $giohangModel = $this->model('giohangModel');
            $giohangModel->check_cookie();
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $CTSP_Model = $this->model('chitietsanphamModel');
            $CTSP_Model->update_luotxem($params);
            $result_sanpham = $CTSP_Model->get_thongtinchitiet_sanpham($params , 0);
            $result_danhgia = $CTSP_Model->show_danhgia($params);
            $idCTSP = $_SESSION['idCTSP'];
            $result_list_size = $CTSP_Model->show_list_size($idCTSP);
            $result_list_color = $CTSP_Model->show_list_color($params);
            $result_binhluan = $CTSP_Model->get_binhluan($params);
            $result_SPLienQuan = $CTSP_Model->sanpham_lienquan($params);
            $this->show($result_user ,
                $result_sanpham ,
                $result_list_color ,
                $result_list_size ,
                $result_danhgia ,
                $result_binhluan ,
                $result_SPLienQuan
            );
         }

         public function show($result_user , $result_sanpham , $result_list_color , $result_list_size ,  $result_danhgia , $result_binhluan , $result_SPLienQuan){
             $this->wiew('chitietsanpham' , 'index' ,
            [ 'user'=>$result_user ,
              'sanpham'=>$result_sanpham ,
              'list_color'=>$result_list_color,
              'list_size'=>$result_list_size,
              'danhgia' =>  $result_danhgia,
              'binhluan' => $result_binhluan,
              'sanphamlienquan'=>$result_SPLienQuan
            ]);
         }

         public function show_item_color(){
             $idCTSP = isset($_POST['idCTSP']) ? $_POST['idCTSP'] : 0;
             $CTSP_Model = $this->model('chitietsanphamModel');
             $item_color = $CTSP_Model->get_thongtinchitiet_sanpham(0 , $idCTSP);
             $sanpham  = mysqli_fetch_assoc($item_color);
             $list_anhmota = explode('&' , $sanpham['AnhMoTa']);
             echo 
             '<div class="box-anhdaidien">
                 <img id="img-zoom"  src="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'"  data-zoom-image="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'" alt="">
             </div>';

             echo '<div class="box-anhmota" id="box-anhmota">'; 
                    echo 
                    '<a class="item" href="#" data-image="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'" data-zoom-image="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'">
                            <img style="border: 1px solid rgb(151, 151, 151);" id="img_01" src="/wiew/public/upload/'.$sanpham['AnhDaiDien'].'" />
                    </a>';  
               foreach($list_anhmota as $item){
                   if($item == $sanpham['AnhDaiDien']) continue;
                    echo 
                    '<a class="item" href="#" data-image="/wiew/public/upload/'.$item.'" data-zoom-image="/wiew/public/upload/'.$item.'">
                        <img id="img_01" src="/wiew/public/upload/'.$item.'" />
                    </a>';       
                }

              echo '</div>';

         }


         public function show_list_size(){
             $idCTSP = isset($_POST['idCTSP']) ? $_POST['idCTSP'] : 0;
             $CTSP_Model = $this->model('chitietsanphamModel');
             $list_size = $CTSP_Model->show_list_size($idCTSP);
             foreach($list_size as $item){
                echo '<div class="item-size" data-id="'.$item['idSize'].'" data-size="'.$item['TenSize'].'">'.$item['TenSize'].'</div>';
            }
         }

         public function show_soluong_size(){
             $idSize = isset($_POST['idSize']) ? $_POST['idSize'] : 0;
             $CTSP_Model = $this->model('chitietsanphamModel');
             $item_size = $CTSP_Model->show_soluong_size($idSize);
             $item_size = mysqli_fetch_assoc($item_size);
             echo  $item_size['SoLuong'] ;
         }

         public function vote_sao(){
             $SoLuongSao = isset($_POST['SoLuongSao']) ? $_POST['SoLuongSao'] : 0;
             $idSanPham = isset($_POST['idSanPham']) ? $_POST['idSanPham'] : 0;
             $idUSer = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
             $CTSP_Model = $this->model('chitietsanphamModel');
             $result = $CTSP_Model->vote_sao($idSanPham , $idUSer , $SoLuongSao);
         }


         public function them_binhluan(){
             $parentId = isset($_POST['parentId']) ? $_POST['parentId'] : 0;
             $NoiDungBL = isset($_POST['NoiDungBL']) ? $_POST['NoiDungBL'] : '';
             $idSanPham = isset($_SESSION['idSanPham']) ? $_SESSION['idSanPham'] : 0; 
             $idNguoiDung = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
             $CTSP_Model = $this->model('chitietsanphamModel');
             $CTSP_Model->them_binhluan($idSanPham , $idNguoiDung , $parentId , $NoiDungBL);
             $result_binhluan = $CTSP_Model->get_binhluan($idSanPham);
             $list = [];
             foreach($result_binhluan as $item){
                array_push($list , $item);
             }
             if(empty($list)){
                echo '<p class="binhluan-trong" >Chưa có bình luận nào cho sản phẩm này.</p>';
                exit();
             }
             $this->load_binhluan_dequy($list , 0);
         }


         public function chinhsua_binhluan(){
             $idSanPham = isset($_SESSION['idSanPham']) ? $_SESSION['idSanPham'] : 0; 
             $id = isset($_POST['id']) ? $_POST['id'] : 0;
             $value = isset($_POST['value']) ? $_POST['value'] : '';
             $CTSP_Model = $this->model('chitietsanphamModel');
             $CTSP_Model->chinhsua_binhluan($id , $value);
             $result_binhluan = $CTSP_Model->get_binhluan($idSanPham);
             $list = [];
             foreach($result_binhluan as $item){
                array_push($list , $item);
             }
             if(empty($list)){
                echo '<p class="binhluan-trong" >Chưa có bình luận nào cho sản phẩm này.</p>';
                exit();
             }
             $this->load_binhluan_dequy($list , 0);
         }


         
         public function xoa_binhluan(){
             $id = isset($_POST['id']) ? $_POST['id'] : 0;
             $idSanPham = isset($_SESSION['idSanPham']) ? $_SESSION['idSanPham'] : 0; 
             $CTSP_Model = $this->model('chitietsanphamModel');
             $CTSP_Model->xoa_binhluan($idSanPham , $id);
             $result_binhluan = $CTSP_Model->get_binhluan($idSanPham);
             $list = [];
             foreach($result_binhluan as $item){
                array_push($list , $item);
             }
             if(empty($list)){
                echo '<p class="binhluan-trong" >Chưa có bình luận nào cho sản phẩm này.</p>';
                exit();
             }
             $this->load_binhluan_dequy($list , 0);
         }



         public function load_binhluan_dequy($List , $parentID){
            echo '<ul>';                                
            foreach($List as $item){ 
                if($item['ParentID'] == $parentID){      
                   echo '<li class="box-bl" data-id="'.$item['idBinhLuan'].'">';
                   // box chứa ảnh
                   echo 
                   '<div class="item"> 
                        <div class="box-left">';
                          if($item['Login_with'] == 'google' || $item['Login_with'] == 'facebook'){
                               echo '<img src="'.$item['AnhDaiDien'].'" alt="">';
                          }
                  echo '</div>
                        <div class="box-right">
                            <div class="noidung" id="'.$item['idBinhLuan'].'">
                                   <p id="'.$item['idBinhLuan'].'" class="TenNguoiDung">'.$item['HoTen'].'</p>
                                   <p class="NgayBL">'.$item['NgayBL'].'</p>
                                   <p id="'.$item['idBinhLuan'].'" class="NoiDungBL">'.$item['NoiDung'].'</p>
                                   <button class="show-action" data-id="'.$item['idBinhLuan'].'">...</button>
                                   <div class="action" id="'.$item['idBinhLuan'].'">
                                      <p id="'.$item['idBinhLuan'].'" class="phanhoi">Phản hồi</p>';
                                      if(isset($_SESSION['id_user']) && $_SESSION['id_user'] == $item['idNguoiDung']){
                                         echo 
                                         '<p id="'.$item['idBinhLuan'].'" class="chinhsua">Chỉnh sửa</p>
                                             <p id="'.$item['idBinhLuan'].'" class="xoa">Xóa</p>';
                                       }
                             echo '</div>
                            </div>
                            <div class="box-chinhsua" id="'.$item['idBinhLuan'].'">
                                  <input id="'.$item['idBinhLuan'].'" class="chinhsua-bl" type="text"">
                                  <button id="'.$item['idBinhLuan'].'" class="close-chinhsua-bl">X</button>
                            </div>
                            <div class="box-phanhoi" id="'.$item['idBinhLuan'].'">
                                  <input id="'.$item['idBinhLuan'].'" class="input-phanhoi" type="text" placeholder="Trả lời minh cường">
                                  <button class="fas fa-times close-phanhoi"></button>
                            </div>
                        </div>
                   </div>';         
                    //           
                   $id = $item['idBinhLuan'];
                   unset($item);
                   $this->load_binhluan_dequy($List , $id);
                } 
            }  
            echo '</li>';
            echo '</ul>';
         }
         
     }

?>