<?php
 
       class gioithieuController extends BaseController{

           public function index(...$params){
               $userModel = $this->model('userModel');
               $gioithieuModel = $this->model('gioithieuModel');
               $result = $gioithieuModel->get_thongtingioithieu();
               $result_user = $userModel->get_info_user();
               $this->wiew('gioithieu' , 'index' , ['user'=>$result_user, 'gioithieu'=>$result]);
           }
       }


?>