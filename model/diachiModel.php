<?php

     class diachiModel extends connect{
         public function show_thanhpho(){
             $query = "SELECT * FROM tinhthanhpho";
             return $this->connect->query($query);
         }

         public function show_quanhuyen(){
            $query = "SELECT * FROM quanhuyen";
            return $this->connect->query($query);
        }

        public function show_xaphuongthitran(){
            $query = "SELECT * FROM xaphuongthitran";
            return $this->connect->query($query);
        }

        public function show_tinhthanhpho_ajax($value){
            $query = "SELECT * FROM tinhthanhpho
            WHERE tinhthanhpho.name like '%$value%'";
            return $this->connect->query($query);
        }

        public function show_quanhuyen_ajax($idtp , $value){
            $query = "SELECT * FROM quanhuyen
            WHERE quanhuyen.name like '%$value%'";
            if($idtp != 0){
                $query .= " AND quanhuyen.matp = $idtp";
            }
            return $this->connect->query($query);
        }

        public function show_phuongxa_ajax( $idqh , $value){
            $query = "SELECT * FROM xaphuongthitran
            WHERE xaphuongthitran.name like '%$value%'";
            if($idqh != 0){
                $query .= " AND xaphuongthitran.maqh = $idqh";
            }
            return $this->connect->query($query);
        }
     }


?>