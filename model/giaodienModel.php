<?php

     class giaodienModel extends connect{
          
         public function them_banner($file){
               move_uploaded_file($file['tmp_name'] , './wiew/public/upload/'.$file['name'].'');
               $src = $file['name'];
               $query = "INSERT INTO banner (src) value ('$src')";
               return $this->connect->query($query);
         }

         public function get_banner(){
             $query = "SELECT * FROM banner";
             return $this->connect->query($query);
         }

         public function xoa_banner($id){
            $query = " DELETE FROM banner WHERE id = $id";
            return $this->connect->query($query);
         }
     }


?>