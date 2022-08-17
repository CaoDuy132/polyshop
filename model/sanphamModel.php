<?php

use Google\Service\CloudSearch\Resource\Query;

class sanphamModel extends connect{
  
        public function show_sanpham_by_danhmuc($tendanhmuc , $page , $orderby , $giaMin , $giaMax , $listColor , $size){
            
            $offset = ($page - 1) * 9;
          
            $query = "SELECT * , danhmuc.id as idDM , sanpham.id as idSP , chitietsanpham.id as idCTSP FROM danhmuc
            INNER JOIN sanpham
            ON(danhmuc.id = sanpham.idDanhMuc) 
            INNER JOIN chitietsanpham 
            ON(sanpham.id = chitietsanpham.idSanPham) 
            INNER JOIN size 
            ON(chitietsanpham.id = size.idChitietsanpham) 
            WHERE 
                (";
                  if($tendanhmuc != 'giam gia'){
                      $query .= 
                      " danhmuc.TenDanhMuc like '%$tendanhmuc%'
                        OR sanpham.TenSP like '%$tendanhmuc%')";
                  }else{
                      $query .= " sanpham.PhanTramKhuyenMai > 0 )";
                  }

            if(!empty($listColor)){
                $query .= 
                " AND   
                    ( chitietsanpham.MauSac LIKE ''";
                    for($i=0; $i<count($listColor); $i++){
                        $query .= ' OR chitietsanpham.MauSac LIKE "'.$listColor[$i].'%" ';
                    }             
                $query .= ")";
            }    
                  
            if($size != ''){
                $query .= " AND (size.TenSize LIKE '%$size%' AND size.SoLuong > 0 )";
            }    
               
            $query .= " AND (  sanpham.Gia >= $giaMin AND sanpham.Gia <= $giaMax)";

            if(!empty($listColor)){
                $query .= " GROUP BY chitietsanpham.id"; 
            }else{
                $query .= " GROUP BY sanpham.id ";     
            }

            switch($orderby){
                case 'macdinh' : 
                    if(!empty($listColor)){
                        $query .= " ORDER BY chitietsanpham.MauSac DESC";
                    }else{
                        $query .= " ORDER BY sanpham.id ASC";
                    }
                    break;
                case 'giaAZ':
                    $query .= " ORDER BY sanpham.Gia DESC";
                    break;
                case 'giaZA':
                    $query .= " ORDER BY sanpham.Gia ASC";
                    break; 
                case 'luotmua':
                    $query .= " ORDER BY sanpham.LuotMua DESC";
                    break; 
                case 'luotxem':
                    $query .= " ORDER BY sanpham.LuotXem DESC";
                    break;                    
            }    
            // lưu tổng số lượng sản phẩm
            $result = $this->connect->query($query);
            if(isset($result->num_rows)){
                $_SESSION['SoLuongSP'] = $result->num_rows;
            }

            // lưu số sản phẩm đang hiển thị
            $query .= " LIMIT $offset , 9";   
            $result = $this->connect->query($query);
            if(isset($result->num_rows)){
                $_SESSION['result_sanpham'] = $result->num_rows;
            }   
            return $this->connect->query($query);
   
        }


        public function get_thongtinchitiet_sanpham($idSP , $idCTSP){    
            $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP
            FROM sanpham
            INNER JOIN chitietsanpham
            ON (sanpham.id = chitietsanpham.idSanPham)
            
            WHERE sanpham.id = $idSP";
            if($idCTSP != 0){
                $query .= " AND chitietsanpham.id = $idCTSP";
            }
            $query .= " GROUP BY chitietsanpham.id LIMIT 1";
            return $this->connect->query($query);
        }


        public function show_list_color($idSP){
            $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP 
            FROM sanpham
            INNER JOIN chitietsanpham
            ON (sanpham.id = chitietsanpham.idSanPham)
            WHERE sanpham.id = $idSP
            GROUP BY chitietsanpham.id";
            return $this->connect->query($query);
        }

        public function show_list_size($idCTSP){
            $query = "SELECT * , chitietsanpham.id as idCTSP , size.id as idSize 
            FROM chitietsanpham
            INNER JOIN size
            ON (chitietsanpham.id = size.idChiTietSanPham)
            WHERE chitietsanpham.id = $idCTSP AND size.SoLuong > 0
            GROUP BY size.id";
            return $this->connect->query($query);
        }

        public function show_soluong_size($idSize){
            $query = "SELECT * FROM size WHERE id = $idSize";
            return $this->connect->query($query);
        }


     

        
    }


?>