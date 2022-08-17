<?php 
   
      class donhangController extends BaseController{

        public function huydonhang_ajax(){
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $donhangModel = $this->model('donhangModel');
            $donhangModel->huydonhang($id);
        }

        public function huydonhang_api(){
            $id_delete = isset($_POST['id']) ? $_POST['id'] : '';
            $id_donhang = isset($_POST['id_donhang']) ? $_POST['id_donhang'] : '';
            $donhangModel = $this->model('donhangModel');
            $response = $donhangModel->huydonhang_api($id_delete , $id_donhang);
            echo "<pre>"; print_r($response) ; echo "</pre>";
        }

        public function trangthai_donhang(){
            $idTrangThai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
            $donhangModel = $this->model('donhangModel');
            $donhangModel->trangthai_donhang($idTrangThai);
        }

        public function get_donhang_theothang(){
            $date = new DateTime();
            $thang = isset($_POST['thang']) ? $_POST['thang'] : $date->format('m');
            $donhangModel = $this->model('donhangModel');
            $donhangModel->get_donhang_theothang($thang);
        }

        public function tongtien_theothang(){
            $thang = isset($_POST['thang']) ? $_POST['thang'] : '';
            $donhangModel = $this->model('donhangModel');
            $tongtien = $donhangModel->get_tongtien_donhang($thang);
            echo number_format($tongtien);
        }

      
      }


    

?>