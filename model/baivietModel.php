<?php

class baivietModel extends connect{
      function getbaiviet(){
        $query = "select * from baiviet order by id desc limit 0,3";
        return $this->connect->query($query);
    }
    function getbaivietleftbyid($id){
        $query = "SELECT * , baiviet.id as idBaiViet , nguoidung.id as idNguoiDung , baiviet.AnhDaiDien as AnhBaiViet
        FROM baiviet
        INNER JOIN nguoidung
        ON(baiviet.idNguoiDung = nguoidung.id) 
        where baiviet.id = $id 
        order by baiviet.id desc 
        limit 0,1";
        return $this->connect->query($query);
    }
    function getbaivietrightbyid(){
        $query = "select * from baiviet order by id desc limit 0,2";
        return $this->connect->query($query);
    }
   
}
?>