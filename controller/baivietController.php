<?php
    class baivietController extends baseController{
        function index($id){
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $baivietModel=$this->model('baivietModel');
            $resultleft= $baivietModel->getbaivietleftbyid($id);
            $resultright= $baivietModel->getbaivietrightbyid();
            $this->show($resultleft,$resultright,$result_user);
        }
        function show($resultleft,$resultright , $result_user){
            $this->wiew('baiviet','index',['user'=>$result_user ,'item'=>$resultleft,'item2'=>$resultright]);
        }
    }
?>      