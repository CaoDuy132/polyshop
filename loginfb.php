<?php
   session_start();
   require_once './core/facebook-api-login/vendor/autoload.php';
   require_once './core/google-api-login/vendor/autoload.php';
   require_once './model/connect.php';
   $db = new connect();


   if(isset($_GET['login_with']) && $_GET['login_with'] == 'google'){
 
    $client_id = '707053893852-clt6vek8sfumm4bd4spobu70nim534kp.apps.googleusercontent.com'; 
    $client_secret = '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';
    $redirect_uri = 'https://localhost//loginfb.php?login_with=google';
    
    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);   
    $client->addScope("email");
    $client->addScope("profile");
    
    $service = new Google_Service_Oauth2($client);
    
    // Nếu kết nối thành công, sau đó xử lý thông tin và lưu vào database
    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token_gg'] = $client->getAccessToken();
        $user = $service->userinfo->get(); //get user info 
    
    
        // connect to database
      
        $user_email = $user['email'];
        $query = "SELECT * FROM nguoidung WHERE Email = '$user_email' AND Login_with ='google'";
        $result = $db->connect->query($query);
    
        //show user picture
        // echo '<img src="'.$user->picture.'" style="float: left;margin-top: 33px;" />';
    
        if(is_object($result) == true && $result->num_rows > 0) // Nếu user tồn tại thì show thông tin hiện có
        {
            // echo 'Chào mừng bạn đã quay lại '.$user->name.'! [<a href="dangxuat.php">Log Out</a>]';
            $idNguoiDung =  mysqli_fetch_assoc($result)['id'];
            $query = "UPDATE nguoidung SET HoTen = '$user->name' , AnhDaiDien ='$user->picture' WHERE id =  $idNguoiDung";
            $db->connect->query($query);
            $_SESSION['id_user'] = (int)$idNguoiDung ;
            setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('+1 year') , '/');
            setcookie('access_token_gg' , json_encode($_SESSION['access_token_gg']) ,  strtotime('+1 year') , '/');
        }
        else //Ngược lại tạo mới 1 user vào database
        {  
            // echo 'Hi '.$user->name.', New user [<a href="dangxuat.php">Log Out</a>]';
            $query = "INSERT INTO nguoidung (Email,HoTen,AnhDaiDien,Login_with)
            VALUE('$user->email','$user->name','$user->picture','google')";
            $db->connect->query($query);
            $_SESSION['id_user'] = $db->connect->insert_id;
            setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('+1 year') , '/');
            setcookie('access_token_gg' , json_encode($_SESSION['access_token_gg']) ,  strtotime('+1 year') , '/');
        }

        header('location:/');
    }else{
        $authUrl = $client->createAuthUrl();
        header("location:$authUrl");
    }
    
    exit();

    
    // Nếu sẵn sàng kết nối, sau đó lưu session với tên access_token
    // if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    //     $client->setAccessToken($_SESSION['access_token']);
    // } else { // Ngược lại tạo 1 link để login
    //     $authUrl = $client->createAuthUrl();
    //     header("location:$authUrl");
    // }
    
    
    // Hiển thị button để login
    // echo '<div style="margin:20px">';
    // if (isset($authUrl)){ 
    //     //show login url
    //     echo '<div align="center">';
    //     echo '<h3>Login with Google -- Demo</h3>';
    //     echo '<div>Please click login button to connect to Google.</div>';
    //     echo '<a class="login" href="' . $authUrl . '">LOGIN</a>';
    //     echo '</div>';
        
    // } 
    // echo '</div>';
}
   

   $fb = new \Facebook\Facebook([
       'app_id' => '328795415251740',
       'app_secret' => '933f8f59d944b9aa9f3cfac5472c6ce3',
       'default_graph_version' => 'v2.5'
   ]);

   try{
       $helper = $fb->getRedirectLoginHelper();
   }catch(\Facebook\Exceptions\FacebookResponseException $e){
       echo 'Response Exception' . $e->getMessage();
       exit();
   }catch(\Facebook\Exceptions\FacebookSDKException $e){
       echo 'SDK Exception' . $e->getMessage();
       exit();
   }

   if(isset($_GET['code'])){
        if(isset($_SESSION['access_token_fb'])){
                $acccess_token = $_SESSION['access_token_fb'];
        }else{
                $acccess_token = $helper->getAccessToken();
                $_SESSION['access_token_fb'] = $acccess_token;
                $fb->setDefaultAccessToken($_SESSION['access_token_fb']);
        }
        
        $graph_response = $fb->get('/me/?fields=name,email',$acccess_token);
        $facebook_user_info = $graph_response->getGraphUser();


        $request_picture = $fb->get('/me/picture?redirect=false&height=150' ,$acccess_token);
        $hinhanh = $request_picture->getGraphUser()['url'];


        if(!empty($facebook_user_info['name'])){
            $hoten  = $facebook_user_info['name'];

        }

        if(!empty($facebook_user_info['email'])){
            $email  = $facebook_user_info['email'];
            
        }

        $query = "SELECT * FROM nguoidung WHERE Email = '$email' AND Login_with = 'facebook'";
        $result = $db->connect->query($query);
        
        if(is_object($result) == true && $result->num_rows > 0) // Nếu user tồn tại thì show thông tin hiện có
        {
            // echo 'Chào mừng bạn đã quay lại '.$user->name.'! [<a href="dangxuat.php">Log Out</a>]';
            $idNguoiDung =  mysqli_fetch_assoc($result)['id'];
            $query = "UPDATE nguoidung SET HoTen = '$hoten' , AnhDaiDien ='$hinhanh' WHERE id =  $idNguoiDung";
            $db->connect->query($query);
            $_SESSION['id_user'] = $idNguoiDung;
            setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('+1 year') , '/');
            setcookie('access_token_fb' , json_encode($_SESSION['access_token_fb']) ,  strtotime('+1 year') , '/');
        }
        else //Ngược lại tạo mới 1 user vào database
        {  
            // echo 'Hi '.$user->name.', New user [<a href="dangxuat.php">Log Out</a>]';
            $query = "INSERT INTO nguoidung (Email,HoTen,AnhDaiDien,Login_with)
            VALUE('$email','$hoten','$hinhanh','facebook')";
            $db->connect->query($query);
            $_SESSION['id_user'] = $db->connect->insert_id;
            setcookie('id_user' , json_encode($_SESSION['id_user']) ,  strtotime('+1 year') , '/');
            setcookie('access_token_fb' , json_encode($_SESSION['access_token_fb']) ,  strtotime('+1 year') , '/');
        }

        header('location:/');
        
        // echo $hoten . '<br>';
        // echo $email . '<br>';
        // echo $hinhanh . '<br>';


        
    }else{
        $permissions = ['email'];
        $login_url = $helper->getLoginUrl('https://localhost/loginfb.php' , $permissions);
        unset($_SESSION['access_token_fb']);
        header("location:$login_url");
    }

    

?>
<a href="<?php echo $login_url ?>">đăng nhập</a>
<div>
<a href="loginfb.php">đăng xuất</a>
</div>