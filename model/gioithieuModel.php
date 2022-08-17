<?php 

    class gioithieuModel extends connect{

        public function get_thongtingioithieu(){
            $query = "SELECT * FROM gioithieu";
            return $this->connect->query($query);
        }
    }


?>