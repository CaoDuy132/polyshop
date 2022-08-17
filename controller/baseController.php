<?php

    class BaseController {

        public function model($model){
            if(file_exists('./model/'.$model.'.php')){
                require_once './model/'.$model.'.php';
                return new $model;
            }
        }

        public function wiew($controller , $wiew , $data = []){
            if(file_exists('./wiew/'.$controller.'/'.$wiew.'.php')){
                require_once './wiew/'.$controller.'/'.$wiew.'.php';
            }
        } 

        public function wiewAdmin($danhmuc , $wiew , $data = []){
            if(file_exists('./wiew/admin/'.$danhmuc.'/'.$wiew.'.php')){
                require_once './wiew/admin/'.$danhmuc.'/'.$wiew.'.php';
            }
        }

    }



?>