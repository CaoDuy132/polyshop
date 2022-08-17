<?php
    use PHPMailer\PHPMailer\PHPMailer;
   
    
     class userModel extends connect{

      
          
        public function get_info_user(){
            //check cookie user
            if(!empty($_COOKIE['id_user'])){
                $_SESSION['id_user'] = json_decode($_COOKIE['id_user']);
                $id = (int)$_SESSION['id_user'];
                $query = "SELECT * FROM nguoidung WHERE id = $id AND Quyen = 0";     
                $this->connect->query($query);
                if(isset($_COOKIE['access_token_fb'])){
                    $_SESSION['access_token_fb'] = json_decode($_COOKIE['access_token_fb']);
                }
                // check token gg
                if(isset($_COOKIE['access_token_gg'])){
                    $_SESSION['access_token_gg'] = json_decode($_COOKIE['access_token_gg']);
                }
                return $this->connect->query($query);
            }
            else{
                return false;
            }           
        }

        public function dangnhap($email , $matkhau){
            $email = trim($email);
            $query = "SELECT * FROM nguoidung
            WHERE (Email = '$email' AND MatKhau = '$matkhau')
            AND (Login_with = 'system' AND Quyen = 0)";
            $result = $this->connect->query($query);
            if($result->num_rows > 0){
                $user = mysqli_fetch_assoc($result);
                $_SESSION['id_user'] = $user['id'];
                setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('+1 year') , '/');
                return true;
            }else{
                return false;
            }
        }

        public function check_email($email){
            $query = "SELECT * FROM nguoidung WHERE Email = '$email' 
            AND (Login_with = 'system' AND Quyen = 0)";
            $result = $this->connect->query($query);
            if($result->num_rows > 0){
                return false;
            }else{
                return true;
            }
        }

        public function dangky($hoten , $email  ,$sdt , $matkhau, $anhdaidien){   
            $hoten = trim($hoten);
            $email = trim($email);
            if($anhdaidien != ''){
                move_uploaded_file($anhdaidien['tmp_name'] , './wiew/public/upload/'.$anhdaidien['name'].'');
                $anhdaidien = $anhdaidien['name'];
            }else{
                $anhdaidien = "user_site.ico";
            }
            $query = "INSERT INTO nguoidung (MatKhau,HoTen,Email,SDT,AnhDaiDien,Login_with,Quyen)
            VALUE('$matkhau','$hoten','$email','$sdt','$anhdaidien','system',0)";
            $this->connect->query($query);
            $_SESSION['id_user'] = $this->connect->insert_id;
            setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('+1 year') , '/');
            return true; 
        }
        


        public function gui_maxacnhan($email , $maxacnhan){      
            require_once './core/PHPMailer/PHPMailer.php';
            require_once './core/PHPMailer/SMTP.php';
            require_once './core/PHPMailer/Exception.php';                    
            $mail = new PHPMailer();
            $nFrom = "F.Fashion";    //mail duoc gui tu dau, thuong de ten cong ty ban
            $mFrom = '';  //dia chi email cua ban 
            $mPass = '';       //mat khau email cua ban
            $nTo = ""; //Ten nguoi nhan
            $mTo = $email;   //dia chi nhan mail
            $body = 'Xác nhận đăng ký từ F.Fashion';   // Noi dung email
            $title = 'Xác nhận đăng ký từ F.Fashion';   //Tieu de gui mail
            $mail->IsSMTP();             
            $mail->CharSet  = "utf-8";
            $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true;    // enable SMTP authentication
            $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";    // sever gui mail.
            $mail->Port       = 465;         // cong gui mail de nguyen
            // xong phan cau hinh bat dau phan gui mail
            $mail->Username   = $mFrom;  // khai bao dia chi email
            $mail->Password   = $mPass;              // khai bao mat khau
            $mail->SetFrom($mFrom, $nFrom);
            $mail->AddReplyTo('cuongtmps17955@fpt.edu.vn'); //khi nguoi dung phan hoi se duoc gui den email nay
            $mail->Subject    = $title;// tieu de email 
            $mail->MsgHTML('<strong>Mã xác nhận đăng ký từ F.Fashion : '.$maxacnhan.'</strong>');// noi dung chinh cua mail se nam o day.
            $mail->AddAddress($mTo, $nTo);
            // thuc thi lenh gui mail 
            if($mail->Send()) {
                echo 'true';               
            }
            else {                 
                return 'false';
            }                              
        }


        public function khoiphuctaikhoan($email){
            $email = trim($email);
            require_once './core/PHPMailer/PHPMailer.php';
            require_once './core/PHPMailer/SMTP.php';
            require_once './core/PHPMailer/Exception.php';
            $query = "SELECT * FROM nguoidung WHERE Email = '$email' AND Login_with = 'system'";
            $result = $this->connect->query($query);
            if($result->num_rows > 0){
                $user = mysqli_fetch_assoc($result);
                $mail = new PHPMailer();
                $nFrom = "F.Fashion";    //mail duoc gui tu dau, thuong de ten cong ty ban
                $mFrom = '';  //dia chi email cua ban 
                $mPass = '';       //mat khau email cua ban
                $nTo = ""; //Ten nguoi nhan
                $mTo = $email;   //dia chi nhan mail
                $body = 'Khôi phục tài khoản từ hệ thống F.Fashion';   // Noi dung email
                $title = 'Khôi phục tài khoản từ hệ thống F.Fashion';   //Tieu de gui mail
                $mail->IsSMTP();             
                $mail->CharSet  = "utf-8";
                $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
                $mail->SMTPAuth   = true;    // enable SMTP authentication
                $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
                $mail->Host       = "smtp.gmail.com";    // sever gui mail.
                $mail->Port       = 465;         // cong gui mail de nguyen
                // xong phan cau hinh bat dau phan gui mail
                $mail->Username   = $mFrom;  // khai bao dia chi email
                $mail->Password   = $mPass;              // khai bao mat khau
                $mail->SetFrom($mFrom, $nFrom);
                $mail->AddReplyTo('cuongtmps17955@fpt.edu.vn'); //khi nguoi dung phan hoi se duoc gui den email nay
                $mail->Subject    = $title;// tieu de email 
                $mail->MsgHTML('Mật khẩu của bạn : <strong>'.$user['MatKhau'].'</strong>');// noi dung chinh cua mail se nam o day.
                $mail->AddAddress($mTo, $nTo);
                // thuc thi lenh gui mail 
                if($mail->Send()) {
                    return true;             
                }
                else {                 
                    return false;
                } 
            }else{
                return false;
            }
        }


        public function matkhau_xacthuc($matkhau){
            $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
            $qeury = "SELECT * FROM nguoidung 
            WHERE (Login_with = 'system' AND Quyen = 0)
            AND (id = $id_user AND MatKhau = '$matkhau')";
            $result = $this->connect->query($qeury);
            if($result->num_rows > 0){
                return true;
            }else{
                return false;
            }
        }


        public function chinhsua($id  , $hoten , $sdt , $matkhau ){
            $hoten = trim($hoten);
            $query = "UPDATE nguoidung SET HoTen  = '$hoten' , SDT = '$sdt' , MatKhau = '$matkhau' WHERE id = $id";
            return $this->connect->query($query);
        }

        public function chinhsua_anh( $id, $hinhanh){
            move_uploaded_file($hinhanh['tmp_name'] , './wiew/public/upload/'.$hinhanh['name'].'');
            $anhdaidien = $hinhanh['name'];
            $query = "UPDATE nguoidung SET AnhDaiDien = '$anhdaidien' WHERE id = $id";
            return $this->connect->query($query);
        }

      
        public function get_donhang(){
            $idNguoiDung = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
            $query = "SELECT * fROM donhang WHERE idNguoiDung = $idNguoiDung";
            return $this->connect->query($query);
        }

        
        
     }

?>