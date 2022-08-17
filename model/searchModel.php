<?php

   class searchModel extends connect{

       public function search_ajax($value_search){
            if($value_search == '') return false;
            $value_search = trim($value_search);
            $arr_value_search = array('thời trang nữ','thời trang nam','áo nam' ,'áo nữ','thoi trang nam','thoi trang nu','ao nam' ,'ao nu');
            $arr_value_search_new = array('nữ','nam','áo polo nam','áo polo nữ','nam','nữ','áo polo nam','áo polo nữ');
            $value_search = str_replace($arr_value_search , $arr_value_search_new , $value_search);
            if(is_numeric($value_search) == 1){
                $query = "SELECT * ,sanpham.id as idSP  , chitietsanpham.id as idCTSP FROM sanpham  
                INNER JOIN chitietsanpham
                ON (sanpham.id = chitietsanpham.idSanPham)
                WHERE sanpham.Gia <= $value_search  
                GROUP BY sanpham.id
                ORDER BY sanpham.LuotMua DESC";    
                return $this->connect->query($query);
            }else{
                //Kiểm tra màu sắc
                $query = "SELECT MauSac FROM chitietsanpham WHERE MauSac like '%$value_search%'";
                $result = $this->connect->query($query);
                if($result->num_rows > 0){
                    $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP
                    FROM sanpham INNER JOIN chitietsanpham
                    ON (sanpham.id = chitietsanpham.idSanPham)
                    WHERE chitietsanpham.MauSac like '%$value_search%'
                    ORDER BY sanpham.LuotMua DESC";
                    return $this->connect->query($query);
                }else{
                    $query = "SELECT * , sanpham.id as idSP , danhmuc.id as idDM , chitietsanpham.id as idCTSP
                    FROM danhmuc INNER JOIN sanpham
                    ON(danhmuc.id = sanpham.idDanhMuc)
                    INNER JOIN chitietsanpham
                    ON(sanpham.id = chitietsanpham.idSanPham)
                    WHERE danhmuc.TenDanhMuc like '%$value_search%' 
                    OR (sanpham.TenSP like '%$value_search%')
                    GROUP BY sanpham.id
                    ORDER BY sanpham.LuotMua DESC";    
                    return $this->connect->query($query);
                }
            }
       } 

   }
  

?>