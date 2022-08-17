<?php 

     class giaodienController extends BaseController{

        public function them_banner(){
            $banner = isset($_FILES['banner']) ? $_FILES['banner'] : '';
            $giaodienModel = $this->model('giaodienModel');
            $giaodienModel->them_banner($banner);
        }

        public function xoa_giaodien(){
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $giaodienModel = $this->model('giaodienModel');
            $giaodienModel->xoa_banner($id);
        }
     }

?>