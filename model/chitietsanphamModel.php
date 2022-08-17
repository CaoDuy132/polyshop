<?php


class chitietsanphamModel extends connect{

        
     
        public function update_luotxem($id){
            $query = "UPDATE sanpham SET LuotXem = LuotXem + 1 WHERE id = $id";
            return $this->connect->query($query);
        }
        
        public function sanpham_lienquan($id){
             $query = "SELECT * , danhmuc.id as idDM FROM sanpham
             INNER JOIN danhmuc
             ON(danhmuc.id = sanpham.idDanhMuc)
             WHERE sanpham.id = $id";
             $result = $this->connect->query($query);
             $sanpham = mysqli_fetch_assoc($result);
             $idDanhMuc = $sanpham['idDM'];
             $query ="SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP FROM sanpham
             INNER JOIN chitietsanpham
             ON(sanpham.id = chitietsanpham.idSanPham)
             WHERE sanpham.idDanhMuc = $idDanhMuc
             GROUP BY sanpham.id
             LIMIT 4";
             return $this->connect->query($query);
        }

        public function get_thongtinchitiet_sanpham($idSP , $idCTSP){    
            $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP
            FROM sanpham
            INNER JOIN chitietsanpham
            ON (sanpham.id = chitietsanpham.idSanPham)";
            if($idCTSP != 0){
                $query .= " WHERE chitietsanpham.id = $idCTSP";
            }else{
                $query .= " WHERE sanpham.id = $idSP";
            }
            $query .= " GROUP BY chitietsanpham.id LIMIT 1";
            $result = $this->connect->query($query);
            $sanpham = mysqli_fetch_assoc($result);
            $_SESSION['idCTSP'] = $sanpham['idCTSP'];
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

        public function show_danhgia($idSP){
            $query = "SELECT * , count(danhgia.id) as LuotDanhGia , sum(danhgia.SoSaoDanhGia) as TongSaoDanhGia ,
            sanpham.id as idSP , danhgia.id as idDanhGia
            FROM sanpham
            INNER JOIN danhgia
            ON(sanpham.id = danhgia.idSanpham)
            WHERE sanpham.id = $idSP
            GROUP BY sanpham.id";
            return $this->connect->query($query);
        }

        public function vote_sao($idSanPham , $idNguoiDung , $SoLuongSao){
            // check xem người dùng đã vote lần nào về sản phẩm này hay chưa
            $query = "SELECT * FROM danhgia 
            WHERE idSanPham = $idSanPham AND idNguoiDung = $idNguoiDung ";
            $result = $this->connect->query($query);
            if(is_object($result) == true && $result->num_rows > 0){
                $query = "UPDATE danhgia SET SoSaoDanhGia = $SoLuongSao WHERE idSanPham = $idSanPham AND idNguoiDung = $idNguoiDung";
                return $this->connect->query($query);
            }else{
                $query = "INSERT INTO danhgia (SoSaoDanhGia , idSanPham , idNguoiDung) VALUE ($SoLuongSao , $idSanPham , $idNguoiDung)";
                return $this->connect->query($query);
            }
        }

        public function get_binhluan($idSP){
            $query = "SELECT * , binhluan.id as idBinhLuan , nguoidung.id as idNguoiDung 
            FROM binhluan
            INNER JOIN nguoidung
            ON (nguoidung.id = binhluan.idNguoiDung)
            WHERE idSanPham = $idSP
            GROUP BY binhluan.id";
            return $this->connect->query($query);
        }

        public function them_binhluan($idSanPham , $idNguoiDung , $parentId , $NoiDung){
            $date = new DateTime();
            $NgayBL = $date->format('Y-m-d');
            $query = "INSERT INTO binhluan (NoiDung,NgayBL,ParentID,idSanPham,idNguoiDung)
            VALUE('$NoiDung','$NgayBL',$parentId,$idSanPham,$idNguoiDung)";
            return $this->connect->query($query);
        }

        public function chinhsua_binhluan($id , $value){
            $query = "UPDATE binhluan SET NoiDung = '$value' WHERE id = $id";
            return $this->connect->query($query);
        }

        
        public function xoa_binhluan($idSanPham , $id){
            $query = "SELECT * FROM binhluan 
            WHERE binhluan.idSanPham = $idSanPham";
            $result = $this->connect->query($query);
            $list = [];
            foreach($result as $item){
               array_push($list , $item);
            }
            $this->xoa_binhluan_dequy($list , $id);      
        }

        public function xoa_binhluan_dequy($list , $parentId){
            // xóa bình luận cha
            $query = "DELETE FROM binhluan WHERE id = $parentId";
            $this->connect->query($query);
            // sau đó xóa bình luận con bằng đệ quy
            foreach($list as $item){
                if($item['ParentID'] == $parentId){
                    $id = $item['id']; 
                    $query = "DELETE FROM binhluan WHERE ParentID = $parentId";
                    $this->connect->query($query);
                    unset($item);
                    $this->xoa_binhluan_dequy($list , $id);
                }
            }
        }

     }


?>