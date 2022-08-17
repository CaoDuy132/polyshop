<?php

    class adminController extends BaseController{

          public function __construct()
          {  
              if(isset($_POST['submit_login'])){
                  $adminModel  = $this->model('adminModel');
                  $email = isset($_POST['email']) ? $_POST['email'] : '';
                  $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
                  $adminModel->check_login($email , $matkhau);
              }
              if(empty($_SESSION['id_admin'])){
                   require_once './wiew/admin/login.php';
                   exit();
              }
          }

          public function dangxuat(){
              if(isset($_SESSION['id_admin'])){
                  unset($_SESSION['id_admin']);
              }
          }

          public function thongtintaikhoan(){
            $adminModel = $this->model('adminModel'); 
            $admin = $adminModel->get_admin();
            $layout = isset($params[0]) ? $params[0] : 'index';
            switch($layout){
              case 'index' :
                  $this->wiewAdmin( 'thongtintaikhoan' ,  'index' , ['user'=>$admin]);
             
            }
          }


          public function index(...$params){    
              $adminModel = $this->model('adminModel');
              $list_chucvu = $adminModel->get_chucvu_admin();
              if($list_chucvu[0] == ''){
                  $layout_index = $list_chucvu[1];
              }else{
                  $layout_index = $list_chucvu[0];
              }
              switch($layout_index){
                    case  'sanpham' : 
                        break;
                    case  'danhmuc' : 
                        header('location:/admin/danhmuc');
                        break;
                    case  'donhang' : 
                        header('location:/admin/donhang');
                        break;
                    case  'binhluan' : 
                        header('location:/admin/binhluan');
                        break; 
                    case  'baiviet' : 
                        header('location:/admin/baiviet');
                        break; 
                    case  'giaodien' : 
                        header('location:/admin/giaodien');
                        break;  
                    case  'nguoidung' : 
                        header('location:/admin/nguoidung/quantri');
                        break; 
                    case  'thongke' : 
                        header('location:/admin/bieudothongke');
                        break;                         
               }          
              $admin = $adminModel->get_admin();
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $list_sanpham  = $adminModel->get_all_sanpham($page);
              $list_danhmuc = $adminModel->get_danhmuc_select();
              if(!isset($params[0])){
                  $this->wiewAdmin('quanlysanpham' , 'index' , ['user'=>$admin , 'sanpham'=>$list_sanpham ,'danhmuc'=>$list_danhmuc]);
              }else{
                  $layout = isset($params[1]) ? $params[1] : 'index';
                  switch($layout){
                      case 'themsanpham' :
                        $this->wiewAdmin( 'quanlysanpham' ,  'themsanpham' , ['user'=>$admin , 'sanpham'=>$list_sanpham , 'danhmuc'=>$list_danhmuc]);
                        break;
                      case 'chinhsua' :
                        $id = isset($params[2]) ? $params[2] : 0;
                        $_SESSION['idSP'] = $id;
                        $sanpham = $adminModel->get_sanpham_byID($id);
                        $list_color = $adminModel->get_list_color($id);
                        $list_size = $adminModel->get_list_size($id);
                        $this->wiewAdmin( 'quanlysanpham' ,  'chinhsua' , 
                        [
                          'user'=>$admin ,
                          'sanpham'=>$list_sanpham ,
                          'danhmuc'=>$list_danhmuc ,
                          'sanpham'=>$sanpham,
                          'color'=>$list_color,
                          'size'=>$list_size
                        ]);
                        break;
                       case 'themmausac' : 
                        $id = isset($params[2]) ? $params[2] : 0;
                        $_SESSION['idSP'] = $id;
                        $sanpham = $adminModel->get_sanpham_byID($id);
                        $this->wiewAdmin( 'quanlysanpham' ,  'themmausac' , ['user'=>$admin , 'sanpham'=>$sanpham]);
                        break; 
                  }
              }
          }

          public function check_quyen($quyen){
                $adminModel = $this->model('adminModel'); 
                $list_chucvu = $adminModel->get_chucvu_admin();
                $check_quyen = false;
                foreach($list_chucvu as $item){
                    if($item == $quyen){
                        $check_quyen = true;
                    }
                }
                if($check_quyen == false){
                    require_once './wiew/admin/layout404.php';
                    exit();
                }
          }


          public function donhang(...$params){
              $this->check_quyen('donhang');
              $adminModel = $this->model('adminModel'); 
              $donhangModel = $this->model('donhangModel');
              $admin = $adminModel->get_admin();
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $list_donhang = $donhangModel->get_donhang($page);
              $list_trangthai = $donhangModel->count_trangthai();
              $tongtien = $donhangModel->get_tongtien();
              $layout = isset($params[0]) ? $params[0] : 'index';
              switch($layout){
                case 'index' :
                    $this->wiewAdmin( 'quanlydonhang' ,  'index' , ['user'=>$admin,'donhang'=>$list_donhang , 'list_trangthai'=>$list_trangthai , 'tongtien'=>$tongtien]);
                    break;
                case 'chitietdonhang' :
                    $donhangchitiet = $donhangModel->locsp($params[1]);
                    $_SESSION['idDonHang'] = $params[1];
                    $this->wiewAdmin( 'quanlydonhang' ,  'chitietdonhang' , ['user'=>$admin,'chitietdonhang'=>$donhangchitiet]);
                    break;
               }
             
           }


         public function danhmuc(...$params){
            $this->check_quyen('danhmuc');
            $adminModel = $this->model('adminModel'); 
            $admin = $adminModel->get_admin();
            $danhmuc = $adminModel->get_danhmuc();
            $layout = isset($params[0]) ? $params[0] : 'index';
            $this->wiewAdmin( 'quanlydanhmuc' ,  $layout , ['user'=>$admin , 'danhmuc'=>$danhmuc]);

         }
         

         public function baiviet(...$params){
            $this->check_quyen('baiviet');
            $adminModel = $this->model('adminModel'); 
            $admin = $adminModel->get_admin();
            $layout = isset($params[0]) ? $params[0] : 'index';
            switch($layout){
                case 'index' : 
                    $baiviet = $adminModel->get_baiviet();
                    $this->wiewAdmin( 'quanlybaiviet' ,  $layout , ['user'=>$admin , 'baiviet'=>$baiviet]);
                    break;
                case 'chitietbaiviet' : 
                    $id = isset($params[1]) ? $params[1] : 0;
                    $_SESSION['idBaiViet'] = $id;
                    $baiviet = $adminModel->get_baiviet_byID($id);
                    $this->wiewAdmin( 'quanlybaiviet' ,  $layout , ['user'=>$admin , 'baivietchitiet'=>$baiviet]);
                    break; 
                case 'thembaiviet' : 
                    $this->wiewAdmin( 'quanlybaiviet' ,  $layout , ['user'=>$admin ]);
                    break;        
            }
         }


         public function giaodien(...$params){
            $this->check_quyen('giaodien');
            $adminModel = $this->model('adminModel'); 
            $giaodienModel = $this->model('giaodienModel');
            $admin = $adminModel->get_admin();
            $layout = isset($params[0]) ? $params[0] : 'index';
            switch($layout){
            case 'index' : 
                $banner = $giaodienModel->get_banner();
                $this->wiewAdmin( 'quanlygiaodien' ,  $layout , ['user'=>$admin , 'banner'=>$banner]);
                break;  
        }
         }

         public function nguoidung(...$params){
            $this->check_quyen('nguoidung');
            $adminModel = $this->model('adminModel'); 
            $admin = $adminModel->get_admin();
            $layout = isset($params[0]) ? $params[0] : 'index';
            switch($layout){
                case 'quantri' : 
                    $list_admin = $adminModel->get_all_admin();
                    $this->wiewAdmin( 'quanlynguoidung' ,  $layout , ['user'=>$admin , 'danhsachadmin'=>$list_admin]);
                    break;
                case 'khachhang' : 
                    $list_khachhang = $adminModel->get_all_khachang('');
                    $this->wiewAdmin( 'quanlynguoidung' ,  $layout , ['user'=>$admin , 'danhsachkhachhang'=>$list_khachhang]);
                    break;    
                case 'themadmin' : 
                    $id = isset($params[1]) ? $params[1] : 0;
                    $baiviet = $adminModel->get_baiviet_byID($id);
                    $this->wiewAdmin( 'quanlynguoidung' ,  $layout , ['user'=>$admin]);
                    break;
                case 'chinhsuaadmin' : 
                    $id = isset($params[1]) ? $params[1] : 0;
                    $chitiet_admin = $adminModel->get_admin_byID($id);
                    $this->wiewAdmin( 'quanlynguoidung' ,  $layout , ['user'=>$admin , 'chitietadmin'=>$chitiet_admin]);
                    break;         
            }
         }

         
         public function binhluan(...$params){
            $this->check_quyen('binhluan');
            $adminModel = $this->model('adminModel'); 
            $admin = $adminModel->get_admin();
            $layout = isset($params[0]) ? $params[0] : 'index';
            switch($layout){
                case  'index' :
                    $page = isset($_GET['page']) ? $_GET['page'] : 1 ;
                    $binhluan = $adminModel->get_binhluan('' ,$page);
                    $this->wiewAdmin( 'quanlybinhluan' ,  $layout , ['user'=>$admin ,'binhluan'=>$binhluan]);
                    break;
                case  'chitiet' :
                    $id = isset($params[1]) ? $params[1] : 0;
                    $list_binhluan = $adminModel->get_binhluan_byID($id);
                    $this->wiewAdmin( 'quanlybinhluan' ,  $layout , ['user'=>$admin ,'list_binhluan'=>$list_binhluan]);
                    break;    
            }
         }

         public function get_noidung_for_ckeditor(){
              $id =   $_SESSION['idBaiViet']  ;
              $adminModel = $this->model('adminModel');
              $adminModel->get_noidung_for_ckeditor($id);
         }

         public function get_motasp_for_ckeditor(){
            $id =   $_SESSION['idSP']  ;
            $adminModel = $this->model('adminModel');
            $adminModel->get_motasp_for_ckeditor($id);
       }





         public function bieudothongke(...$params){
            $this->check_quyen('bieudo');
            $adminModel = $this->model('adminModel'); 
            $admin = $adminModel->get_admin();
            $layout = isset($params[0]) ? $params[0] : 'thongkedonhang';
            switch($layout){
                case 'thongkedonhang' :
                    $doanhthu_12thang = $adminModel->doanhthu_12thang();
                    $this->wiewAdmin( 'bieudothongke' ,  $layout , ['user'=>$admin , 'doanhthu12thang'=>$doanhthu_12thang]);
                    break;
                case  'luotmuatheothang' : 
                    $doanhthu_12thang = $adminModel->luotmua_12thang();
                    $this->wiewAdmin( 'bieudothongke' ,  $layout , ['user'=>$admin , 'luotmua12thang'=>$doanhthu_12thang]);
                    break;
                case 'luotmuatheodanhmuc' : 
                    $luot_mua_danhmuc = $adminModel->luotmua_theodanhmuc();
                    $this->wiewAdmin( 'bieudothongke' ,  $layout , ['user'=>$admin , 'luotmuatheodanhmuc'=>$luot_mua_danhmuc]);
                    break;  
                case 'binhluantheosanpham' : 
                    $binhluan_theosp = $adminModel->binhluan_theosanpham();
                    $this->wiewAdmin( 'bieudothongke' ,  $layout , ['user'=>$admin , 'binhluantheosp'=>$binhluan_theosp]);
                    break;    
            }
         }
         


          public function them_sanpham(){
              $tensp = isset($_POST['tensp']) ? (string)$_POST['tensp'] : '';
              $giasp = isset($_POST['giasp']) ? (float)$_POST['giasp'] : '';
              $mota = isset($_POST['mota']) ? $_POST['mota'] : 'Trống';
              $idDanhMuc = isset($_POST['danhmuc']) ? (int)$_POST['danhmuc'] : '';
              $adminModel = $this->model('adminModel');
              $adminModel->them_sanpham($tensp,$giasp,$mota,$idDanhMuc);
          }

          public function them_mausac(){
              $idSP = isset($_POST['idSP']) ? $_POST['idSP'] : 0;
              $tenmau = isset($_POST['tenmau']) ? $_POST['tenmau'] : '';
              $mamau = isset($_POST['mamau']) ? $_POST['mamau'] : '';
              $anhdaidien = isset($_FILES['anhdaidien']) ? $_FILES['anhdaidien'] : '';
              $anhmota = isset($_FILES['anhmota']) ? $_FILES['anhmota'] : '';
              $sizeS = isset($_POST['SizeS']) ? $_POST['SizeS'] : 0;
              $sizeM = isset($_POST['SizeM']) ? $_POST['SizeM'] : 0;
              $sizeL = isset($_POST['SizeL']) ? $_POST['SizeL'] : 0;
              $sizeXL = isset($_POST['SizeXL']) ? $_POST['SizeXL'] : 0;
              $list_size = ['S'=>$sizeS , 'M'=>$sizeM, 'L'=> $sizeL, 'XL'=>$sizeXL];
              move_uploaded_file($anhdaidien['tmp_name'] , './wiew/public/upload/'.$anhdaidien['name'].'');
              for($i =0; $i<count($anhmota['name']); $i++){
                   move_uploaded_file($anhmota['tmp_name'][$i] , './wiew/public/upload/'.$anhmota['name'][$i].'');
              }
              $src_anhdaidien = $anhdaidien['name'];
              $list_anhmota = implode( '&', $anhmota['name']);
              $adminModel = $this->model('adminModel');
              $idCTSP = $adminModel->them_mausac($idSP , $tenmau , $mamau , $src_anhdaidien , $list_anhmota);
              foreach($list_size as $item => $value){
                  if($value > 0){
                      $adminModel->them_size($idCTSP , $item ,$value);
                  }
              }
              var_dump($list_size);
          }

          public function upload_anhdaidien(){
              $idCTSP = isset($_POST['idCTSP']) ? $_POST['idCTSP'] : 0;
              $hinhanh = isset($_FILES['hinhanh']) ? $_FILES['hinhanh'] : '';
              $adminModel = $this->model('adminModel');
              $adminModel->upload_anhdaidien($idCTSP , $hinhanh);
              echo '/wiew/public/upload/'.$hinhanh['name'];
          }

          public function them_anhmota(){
            $idCTSP = isset($_POST['idCTSP']) ? $_POST['idCTSP'] : 0;
            $hinhanh = isset($_FILES['hinhanh']) ? $_FILES['hinhanh'] : '';
            $adminModel = $this->model('adminModel');
            $result = $adminModel->them_anhmota($idCTSP , $hinhanh);
            $item = mysqli_fetch_assoc($result);
            $list_anhmota = explode('&' , $item['AnhMoTa']);
            foreach($list_anhmota as $img){
                echo
                 '<div class="box-anhmota">
                     <button data-id='.$idCTSP.' src-delete="'.$img.'" type="button" class="btn-close close-anhmota" aria-label="Close"></button> 
                     <img src="/wiew/public/upload/'.$img.'" src-delete="'.$img.'" class="rounded" alt="">
                 </div>  ';
            }
          }

          public function xoa_anhmota(){
              $idCTSP = isset($_POST['idCTSP']) ? $_POST['idCTSP'] : 0;
              $src_delete = isset($_POST['src_delete']) ? $_POST['src_delete'] : '';
              $adminModel = $this->model('adminModel');
              $result =  $adminModel->delete_anhmota($idCTSP , $src_delete);
              $item = mysqli_fetch_assoc($result);
              $list_anhmota = explode('&' , $item['AnhMoTa']);
              foreach($list_anhmota as $img){
                echo
                 '<div class="box-anhmota">
                     <button data-id='.$idCTSP.' src-delete="'.$img.'" type="button" class="btn-close close-anhmota" aria-label="Close"></button> 
                     <img src="/wiew/public/upload/'.$img.'" src-delete="'.$img.'" class="rounded" alt="">
                 </div>  ';
            }
          }

          public function update_sanpham(){
              $idSP = isset($_SESSION['idSP']) ? $_SESSION['idSP']  : 0;
              $tensp = isset($_POST['tensp']) ? $_POST['tensp'] : '';
              $gia = isset($_POST['gia']) ? $_POST['gia'] : 0;  
              $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
              $adminModel = $this->model('adminModel');
              $adminModel->update_sanpham($idSP , $tensp , $gia , $mota);
          }

          public function update_chitietsanpham_tenmau(){
              $id = isset($_POST['id']) ? $_POST['id'] : '';
              $tenmau = isset($_POST['tenmau']) ? $_POST['tenmau'] : '';
              $adminModel = $this->model('adminModel');
              $adminModel->update_chitietsanpham_tenmau($id , $tenmau);
          }

          public function update_chitietsanpham_mamau(){
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $mamau = isset($_POST['mamau']) ? $_POST['mamau'] : '';
            $adminModel = $this->model('adminModel');
            $adminModel->update_chitietsanpham_mamau($id , $mamau);
        }

        public function update_size(){
            $id = isset($_POST['idSize']) ? $_POST['idSize'] : 0;
            $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 0;
            $adminModel = $this->model('adminModel');
            $adminModel->update_size($id , $soluong);
        }

        public function xoa_mausac(){
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $adminModel = $this->model('adminModel');
            $adminModel->xoa_mausac($id);
        }

        public function xoa_sanpham(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $adminModel = $this->model('adminModel');
            $adminModel->xoa_sanpham($id);
            echo $id;
        }

       

        public function locsp(){
            $value = isset($_POST['value']) ? $_POST['value'] : '';
            $page = isset($_POST['page']) ? $_POST['page'] : 1;
            $adminModel = $this->model('adminModel');
            $result = $adminModel->locsp($page, $value);
            foreach($result as $item){
                echo 
                '<tr>
                     <td><input data-id="'.$item['idSP'].'" type="checkbox" class="input-checkbox" id="exampleCheck1" ></td>
                     <td>'.$item['idSP'].'</td>
                     <td>'.$item['TenDanhMuc'].'</td>
                     <td>'.$item['TenSP'].'</td>
                     <td>'.number_format($item['Gia']).' VNĐ</td>
                     <td>'.$item['LuotXem'].'</td>
                     <td>'.$item['LuotMua'].'</td>
                     <td><a href="admin/quanlysanpham/chinhsua/'.$item['idSP'].'"><button type="button"  class="btn btn-info chinhsua"><i class="far fa-eye"></i></button></a></td>
                     </tr>';
            }
        }

        public function create_btn_phantrang(){
            $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $soluongsp = isset($_SESSION['soluongsp']) ? $_SESSION['soluongsp'] : 0;
            $sotrang = ceil($soluongsp / 10);
            if($sotrang > 1){
                $prev = $page - 1;
                $next = $page + 1;
                if($page > 1){
                     echo '<a href="javascript:"><button class="btn_phantrang btn btn-info " data-page="'.$prev.'"><i class="fas fa-angle-left"></i></button></a>';
                }
                for($i = 1; $i<=$sotrang; $i++){
                     if($page === $i){
                          echo '<a href="javascript:"><button  class="btn_phantrang btn btn-primary " data-page="'.$i.'">'.$i.'</button></a>';    
                     }else{
                          echo '<a href="javascript:"><button  class="btn_phantrang btn btn-info" data-page="'.$i.'">'.$i.'</button></a>';
                     }
                }
                if($page < $sotrang){
                     echo '<a href="javascript:"><button class="btn_phantrang btn btn-info " data-page="'.$next.'"><i class="fas fa-angle-right"></i></button></a>';
                }
            }
           
        }


        public function them_danhmuc(){
            $TenDanhMuc = isset($_POST['tendanhmuc']) ? $_POST['tendanhmuc'] : '';
            $adminModel = $this->model('adminModel');
            if($adminModel->them_danhmuc($TenDanhMuc) == false){
                echo 'false';
            } 
        }

        public function xoa_danhmuc(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $adminModel = $this->model('adminModel');
            $adminModel->xoa_danhmuc($id);
        }
        public function thembaiviet(){
            $date = new DateTime();
            $ngaythem = $date->format('Y-m-d');
            $tieude = isset($_POST['tieude']) ? $_POST['tieude'] : '';
            $anhdaidien = isset($_FILES['anhdaidien']) ? $_FILES['anhdaidien'] : '';
            $noidung = isset($_POST['noidung']) ? $_POST['noidung'] : '';
            $noibat = isset($_POST['noibat']) ? $_POST['noibat'] : 0;
            $idAdmin = $_SESSION['id_admin'];
            $adminModel = $this->model('adminModel');
            $adminModel->them_baiviet($tieude,$anhdaidien,$noidung,$ngaythem,$noibat,$idAdmin);
        }

        public function xoa_baiviet(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $adminModel = $this->model('adminModel');
            $adminModel->xoa_baiviet($id);
        }

        public function chinhsuabaiviet(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $tieude = isset($_POST['tieude']) ? $_POST['tieude'] : '';
            $anhdaidien = isset($_FILES['anhdaidien']) ? $_FILES['anhdaidien'] : '';
            $noidung = isset($_POST['noidung']) ? $_POST['noidung'] : '';
            $noibat = isset($_POST['noibat']) ? $_POST['noibat'] : 0;
            $adminModel = $this->model('adminModel');
            $adminModel->chinhsua_baiviet($id , $tieude , $anhdaidien , $noidung , $noibat);
        }

        public function xoa_binhluan(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $adminModel = $this->model('adminModel');
            $adminModel->xoa_binhluan($id);
        }

        public function orderby_binhluan_ajax(){
            $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : '';
            $adminModel = $this->model('adminModel');
            $result = $adminModel->get_binhluan($orderby , 1);
            foreach($result as $item){
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


        public function them_admin(){
             $hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
             $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
             $email = isset($_POST['email']) ? $_POST['email'] : '';
             $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
             $hinhanh = isset($_FILES['anhdaidien']) ? $_FILES['anhdaidien'] : '';
             $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : '';
             $adminModel = $this->model('adminModel');
             if($adminModel->them_admin($hoten,$sdt,$email,$matkhau,$hinhanh,$chucvu) == false){
                 echo 'false';
             }
        }

        public function chinhsua_admin(){
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
            $hinhanh = isset($_FILES['anhdaidien']) ? $_FILES['anhdaidien'] : '';
            $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : '';
            $adminModel = $this->model('adminModel');
            $adminModel->chinhsua_admin( $id,$hoten,$sdt,$email,$matkhau,$hinhanh,$chucvu);
        }

        public function chinhsua_thongtincanhan(){
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
            $hinhanh = isset($_FILES['anhdaidien']) ? $_FILES['anhdaidien'] : '';
            $adminModel = $this->model('adminModel');
            $adminModel->chinhsua_thongtintaikhoan($id,$hoten,$sdt,$email,$matkhau,$hinhanh);
              
        }

        public function xoa_admin(){
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $adminModel = $this->model('adminModel');
            $adminModel->xoa_admin($id);
        }



        public function order_by_khachhang(){
            $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : '';
            $adminModel = $this->model('adminModel');
            $result = $adminModel->get_all_khachang($orderby);
            if(!empty( $result)){
                foreach( $result as $item){
                   if($item['id'] ==  $_SESSION['id_admin']) continue;
                   echo 
                    '<tr>
                         <td>'.$item['idNguoiDung'].'</td>
                         <td>'.$item['HoTen'].'</td>
                         <td>'.$item['Email'].'</td>
                         <td>'.$item['SDT'].'</td>';
                         if($item['Login_with'] == 'system'){
                             echo '<td><img src="/wiew/public/upload/'.$item['AnhDaiDien'].'" alt=""> </td>';
                         }else{
                             echo '<td><img src="'.$item['AnhDaiDien'].'" alt=""> </td>';
                         }           
                 echo '
                         <td>'.$item['LuotMua'].'</td>
                 </tr>';
                }
            }
        }

        public function timkiem_sanpham(){
            $value = isset($_POST['value']) ? $_POST['value'] : '';
            $adminModel = $this->model('adminModel');
            $adminModel->timkiem_sanpham($value);
        }
    }


?>