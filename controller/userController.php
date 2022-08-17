<?php


class userController extends BaseController{


        public function index(){
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $this->wiew('user', 'index' , ['user'=>$result_user]);
        }
        public function dangky(){
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $this->wiew('user', 'dangky' , ['user'=>$result_user]); 
        }

        public function thongtindonhang(){
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $donhang = $userModel->get_donhang();
            $this->wiew('user', 'thongtindonhang' , ['user'=>$result_user , 'donhang'=>$donhang]);
        }


        public function khoiphuctaikhoan(){
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $this->wiew('user', 'khoiphuctaikhoan' , ['user'=>$result_user]);
        }

        public function khoiphuctaikhoan_ajax(){
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $email = str_replace(' ' , '' ,$email);
            $userModel = $this->model('userModel');
            if($userModel->khoiphuctaikhoan($email) == true){
                echo 'Mật khẩu đã được gửi về Email của bạn.';
            }else{
                echo 'Email không trùng khớp!';
            }
        }


        public function tao_maxacnhan(){
            $userModel = $this->model('userModel');
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $email = str_replace(' ' , '' ,$email);
            if($userModel->check_email($email) == true){
                $maxacnhan = mt_rand();
                $userModel = $this->model('userModel');
                $userModel->gui_maxacnhan($email , $maxacnhan);
                setcookie('maxacnhan' , json_encode($maxacnhan) , time() + 60 , '/');
            }else{
                echo 'Email đã tồn tại!';
            }     
        }

          
        public function submit_dangky_ajax(){
            $userModel = $this->model('userModel');
            $ho = isset($_POST['ho']) ? $_POST['ho'] : '';
            $ten = isset($_POST['ten']) ? $_POST['ten'] : '';
            $hoten = [$ho ,$ten];
            $hoten = implode(' ' , $hoten);
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $email = str_replace(' ' , '' ,$email);
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
            $hinhanh = isset($_FILES['hinhanh']) ? $_FILES['hinhanh'] : '';
            $maxacnhan = isset($_POST['maxacnhan']) ? $_POST['maxacnhan'] : ''; 
            if(!empty($_COOKIE['maxacnhan'])){
                if($maxacnhan == json_decode($_COOKIE['maxacnhan'])){
                    $userModel->dangky($hoten,$email,$sdt , $matkhau , $hinhanh);
                    echo 'Đăng ký thành công'; 
                    setcookie('maxacnhan' , '' , time() - 3600 , '/');
                }else{
                    echo 'Mã xác nhận không trùng khớp!';
                }
            }else{
                echo 'Mã xác nhận đã hết hạn!';
            }       
        }


        public function dangnhap(){
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
            $userModel = $this->model('userModel');
            if($userModel->dangnhap($email , $matkhau) == true){
                echo 'Đăng nhập thành công';
            }else{
                echo 'Email hoặc mật khẩu không đúng!';
            }
        }
      
       
        public function DangXuat_ajax(){
            if(isset($_SESSION['access_token_fb'])){
                unset($_SESSION['access_token_fb']);
                setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('-2 year') , '/');
                setcookie('access_token_fb' , json_encode($_SESSION['access_token_fb']) ,  strtotime('-2 year') , '/');
             }
          
             if(isset($_SESSION['access_token_gg'])){
                unset($_SESSION['access_token_gg']);
                setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('-2 year') , '/');
                setcookie('access_token_gg' , json_encode($_SESSION['access_token_gg']) ,  strtotime('-2 year') , '/');
             }
          
             if(isset($_SESSION['id_user'])){
                unset($_SESSION['id_user']);
                setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('-2 year') , '/');
             }
        }

        public function check_login(){
            if(isset($_SESSION['id_user'])){
                echo 'true';
            }else{
                echo 'false';
            }
        }

        public function chinhsua(){
            $userModel = $this->model('userModel');
            $idNguoiDung = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
            $hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
            $matkhauxacthuc = isset($_POST['matkhauxacthuc']) ? $_POST['matkhauxacthuc'] : '';
            if($userModel->matkhau_xacthuc($matkhauxacthuc) == true){
                $userModel->chinhsua($idNguoiDung , $hoten , $sdt , $matkhau);
            }else{
                echo 'false';
            }
            
        }

        public function chinhsua_anh(){
            $userModel = $this->model('userModel');
            $idNguoiDung = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
            $hinhanh = isset($_FILES['hinhanh']) ? $_FILES['hinhanh'] : '';
            $userModel->chinhsua_anh($idNguoiDung , $hinhanh);
            echo $hinhanh['name'];
        }

    }


?>