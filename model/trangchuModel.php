<?php
 
     class trangchuModel extends connect{

        public function get_danhmuc(){
            $query = "SELECT count(sanpham.id) as SoLuongSP , danhmuc.id as idDanhMuc , danhmuc.TenDanhMuc
            From danhmuc
            INNER JOIN sanpham
            ON (danhmuc.id = sanpham.idDanhMuc)
            GROUP BY idDanhMuc";
            return $this->connect->query($query);
        }

        public function show_sanpham_ajax($value){
            if($value != 'noibat'){
                $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP , danhgia.id as idDanhGia ,
                count(danhgia.id) as LuotDanhGia , sum(danhgia.SoSaoDanhGia) as TongSaoDanhGia
                FROM sanpham
                INNER JOIN chitietsanpham
                ON(sanpham.id = chitietsanpham.idSanPham)
                LEFT JOIN danhgia
                ON(sanpham.id = danhgia.idSanPham)
                WHERE sanpham.TenSP like '%$value%' AND sanpham.SanPhamNoiBat > 0
                GROUP BY sanpham.id
                ORDER BY sanpham.SanPhamNoiBat ASC
                LIMIT 8";
                return $this->connect->query($query);
            }else{
                $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP , danhgia.id as idDanhGia ,
                count(danhgia.id) as LuotDanhGia , sum(danhgia.SoSaoDanhGia) as TongSaoDanhGia
                FROM sanpham
                INNER JOIN chitietsanpham
                ON(sanpham.id = chitietsanpham.idSanPham)
                LEFT JOIN danhgia
                ON(sanpham.id = danhgia.idSanPham)
                GROUP BY sanpham.id
                ORDER BY LuotMua DESC
                LIMIT 8";
                return $this->connect->query($query);
            }
           
        }

        public function get_sanpham_noibat(){
            $query = "SELECT * , sanpham.id as idSP , chitietsanpham.id as idCTSP , danhgia.id as idDanhGia ,
            count(danhgia.id) as LuotDanhGia , sum(danhgia.SoSaoDanhGia) as TongSaoDanhGia
            FROM sanpham
            INNER JOIN chitietsanpham
            ON(sanpham.id = chitietsanpham.idSanPham)
            LEFT JOIN danhgia
            ON(sanpham.id = danhgia.idSanPham)
            GROUP BY sanpham.id
            ORDER BY sanpham.LuotXem DESC
            LIMIT 8";
            return $this->connect->query($query);
        }


        public function get_baiviet(){
            $query = "SELECT * , baiviet.id as idBaiViet , nguoidung.id as idNguoiDung , baiviet.AnhDaiDien as HinhAnh FROM baiviet 
            INNER JOIN nguoidung
            ON(baiviet.idNguoiDung = nguoidung.id)
            WHERE NoiBat = 1
            LIMIT 3";
            return $this->connect->query($query);
        }
        
     }

?>