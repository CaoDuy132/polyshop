<?php

    class adminModel extends connect{

        public function check_login($email  , $matkhau){
            $query = "SELECT * FROM nguoidung WHERE
            ( Quyen > 0 AND Login_with = 'system')
            AND 
            (Email = '$email' AND MatKhau = '$matkhau')";
            $result = $this->connect->query($query);
            if($result->num_rows > 0){
                $admin = mysqli_fetch_assoc($result);
                $_SESSION['id_admin'] = $admin['id'];
                return true;
            }else{
                return false;
            }
        }

        public function get_admin(){
            $id =  $_SESSION['id_admin'];
            $query = "SELECT * FROM nguoidung WHERE
            ( Quyen > 0 AND Login_with = 'system')
            AND 
            (id = $id)";
             return $this->connect->query($query);
        }

        public function get_chucvu_admin(){
            $id =  $_SESSION['id_admin'];
            $query = "SELECT * FROM nguoidung WHERE
            ( Quyen > 0 AND Login_with = 'system')
            AND 
            (id = $id)";
            $result = $this->connect->query($query);
            $admin = mysqli_fetch_assoc($result);
            $list_chucvu = explode('&' ,$admin['ChucVu']);;
            return $list_chucvu;
        }
         
        public function get_all_sanpham($page){
            $offset = ((int)$page - 1) * 10;
            $query = "SELECT * , sanpham.id as idSP , danhmuc.id as idDanhMuc FROM sanpham 
            INNER JOIN danhmuc 
            ON(danhmuc.id = sanpham.idDanhMuc)";
            $result = $this->connect->query($query);
            $_SESSION['soluongsp'] = $result->num_rows;
            $query .= " LIMIT $offset , 10";
            return $this->connect->query($query);
        }

        public function get_danhmuc(){
            $query = "SELECT * , COUNT(sanpham.id) as SoLuongSP , AVG(sanpham.Gia) as GiaTrungBinh ,
            MIN(sanpham.Gia) as GiaMin , MAX(sanpham.Gia) as GiaMax , danhmuc.id as idDM  , sanpham.id as idSP FROM danhmuc
            LEFT JOIN sanpham
            ON(danhmuc.id = sanpham.idDanhMuc)
            GROUP BY danhmuc.id";
            return $this->connect->query($query);
        }

        public function get_danhmuc_select(){
            $query = "SELECT * FROM danhmuc";
            return $this->connect->query($query);
        }

        public function them_danhmuc($tendanhmuc){
            $tendanhmuc = trim($tendanhmuc);
            $query = "SELECT * FROM danhmuc WHERE TenDanhMuc = '$tendanhmuc'";
            $result = $this->connect->query($query);
            if($result->num_rows > 0) return false;
            $query = "INSERT INTO danhmuc (TenDanhMuc) value ('$tendanhmuc')";
            return $this->connect->query($query);
        }

        public function xoa_danhmuc($id){
            $query = "DELETE FROM danhmuc WHERE id = $id";
            return $this->connect->query($query);
        }



        public function them_sanpham($tensp,$gia , $mota , $idDanhMuc){
            $tensp = trim($tensp);  
            $query = "SELECT * FROM sanpham WHERE TenSP = '$tensp'";
            $result = $this->connect->query($query);
            if($result->num_rows > 0){
                echo 'false';
                return;
            }
            $query = "INSERT INTO sanpham (TenSP,Gia,MoTa,PhanTramKhuyenMai,idDanhMuc)
            VALUE ('$tensp',$gia,'$mota',0,$idDanhMuc)";
            $this->connect->query($query);
            echo $this->connect->insert_id;
        }

        public function them_mausac($idsp , $tenmau , $mamau, $anhdaidien , $anhmota){
            $query = "INSERT INTO chitietsanpham (MauSac,MaMau,AnhDaiDien,AnhMoTa,idSanPham)
            VALUE ('$tenmau','$mamau','$anhdaidien','$anhmota',$idsp)";
            $this->connect->query($query);
            return $this->connect->insert_id;
        }

        public function them_size($idCTSP , $tenSize,$soLuong ){
            $query = "INSERT INTO size (TenSize,SoLuong,idChiTietSanPham)
            VALUE ('$tenSize',$soLuong,$idCTSP)";
            $this->connect->query($query);
        }

        public function get_sanpham_byID($id){
            $query = "SELECT * , sanpham.id as idSP , danhmuc.id as get_danhmuc FROM sanpham
            INNER JOIN danhmuc
            ON(danhmuc.id  = sanpham.idDanhMuc)
            WHERE sanpham.id = $id";
            return $this->connect->query($query);
        }

        public function get_list_color($idSP){
            $query = "SELECT * FROM chitietsanpham WHERE idSanPham = $idSP";
            return $this->connect->query($query);
        }

        public function get_list_size($idSP){
            $query = "SELECT * , size.id as idSize , sanpham.id as idSP , chitietsanpham.id as idCTSP 
            FROM sanpham
            INNER JOIN chitietsanpham
            ON(sanpham.id = chitietsanpham.idSanPham)
            INNER JOIN size
            ON(chitietsanpham.id = size.idChiTietSanPham)
            WHERE sanpham.id = $idSP
            GROUP BY size.id";
            return $this->connect->query($query);
        }

        public function them_anhmota($idCTSP , $hinhanh){
            move_uploaded_file($hinhanh['tmp_name'] , './wiew/public/upload/'.$hinhanh['name'].'');
            $query = "SELECT * FROM chitietsanpham WHERE id = $idCTSP";
            $result = $this->connect->query($query);
            $item = mysqli_fetch_assoc($result);
            $arr = explode('&' , $item['AnhMoTa']);
            array_push($arr , $hinhanh['name']);
            $anhmota = implode('&' , $arr);
            $query = "UPDATE chitietsanpham SET AnhMoTa = '$anhmota' WHERE id = $idCTSP";
            $this->connect->query($query);
            $query = "SELECT * FROM chitietsanpham WHERE id = $idCTSP";
            return $this->connect->query($query);
        }

        public function delete_anhmota($idCTSP, $src){
            $query = "SELECT * FROM chitietsanpham WHERE id = $idCTSP";
            $result = $this->connect->query($query);
            $item = mysqli_fetch_assoc($result);
            $list_img = explode('&' , $item['AnhMoTa']);
            for($i = 0; $i<count($list_img); $i++){
                if( strcmp ( $list_img[$i] , $src ) == 0){
                    unset($list_img[$i]);
                }
            }
            $anhmota = implode('&', $list_img);
            $query = "UPDATE chitietsanpham SET AnhMoTa = '$anhmota' WHERE id = $idCTSP";
            $this->connect->query($query);
            $query = "SELECT * FROM chitietsanpham WHERE id = $idCTSP";
            return $this->connect->query($query);
        }

        public function upload_anhdaidien($idCTSP, $hinhanh){
            move_uploaded_file($hinhanh['tmp_name'] , './wiew/public/upload/'.$hinhanh['name'].'');
            $src = $hinhanh['name'];
            $query = "UPDATE chitietsanpham SET AnhDaiDien = '$src' WHERE id = $idCTSP";
            return $this->connect->query($query);
        }

        public function update_sanpham($id , $tensp , $gia , $mota){
            $query = "UPDATE sanpham SET TenSP = '$tensp' , Gia = $gia , MoTa = '$mota' WHERE id = $id";
            return $this->connect->query($query);
        }

        public function update_chitietsanpham_tenmau($id , $tenmau){
            $query = "UPDATE chitietsanpham SET MauSac = '$tenmau' WHERE id = $id";
            return $this->connect->query($query);
        }

        public function update_chitietsanpham_mamau($id , $mamau){
            $query = "UPDATE chitietsanpham SET MaMau = '$mamau' WHERE id = $id";
            return $this->connect->query($query);
        }


        public function update_size($id , $soluong){
            $query = "UPDATE size SET SoLuong = $soluong WHERE id = $id";
            return $this->connect->query($query);
        }

        public function xoa_mausac($id){
            $query = "DELETE FROM chitietsanpham WHERE id = $id";
            return $this->connect->query($query);
        }

        public function xoa_sanpham($id){
            $query = "DELETE FROM sanpham WHERE id = $id";
            return $this->connect->query($query);
        }

        public function locsp($page , $value){
            $offset  = ((int)$page - 1) * 10;
            switch($value){
                case 'all' :
                    $query = "SELECT * , sanpham.id as idSP , danhmuc.id as idDanhMuc FROM sanpham 
                    INNER JOIN danhmuc 
                    ON(danhmuc.id = sanpham.idDanhMuc)
                    ORDER BY sanpham.id DESC";
                    $result = $this->connect->query($query);
                    $_SESSION['soluongsp'] = $result->num_rows;
                    $query .= " LIMIT $offset , 10";
                    return $this->connect->query($query);
                    break;
                case 'muanhieu' :
                    $query = "SELECT * , sanpham.id as idSP , danhmuc.id as idDanhMuc FROM sanpham 
                    INNER JOIN danhmuc 
                    ON(danhmuc.id = sanpham.idDanhMuc)
                    ORDER BY LuotMua DESC";
                    $result = $this->connect->query($query);
                    $_SESSION['soluongsp'] = $result->num_rows;
                    $query .= " LIMIT $offset , 10";
                    return $this->connect->query($query);
                    break;
                case 'xemnhieu' :       
                    $query = "SELECT * , sanpham.id as idSP , danhmuc.id as idDanhMuc FROM sanpham 
                    INNER JOIN danhmuc 
                    ON(danhmuc.id = sanpham.idDanhMuc)
                    ORDER BY LuotXem DESC";
                    $result = $this->connect->query($query);
                    $_SESSION['soluongsp'] = $result->num_rows;
                    $query .= " LIMIT $offset , 10";
                    return $this->connect->query($query);
                    break;          
                default :{
                    $query = "SELECT * , sanpham.id as idSP , danhmuc.id as idDanhMuc FROM sanpham 
                    INNER JOIN danhmuc 
                    ON(danhmuc.id = sanpham.idDanhMuc)
                    WHERE danhmuc.id = $value";
                    $result = $this->connect->query($query);
                    $_SESSION['soluongsp'] = $result->num_rows;
                    $query .= " LIMIT $offset , 10";
                    return $this->connect->query($query);
                    break;         
                }       
            }
        }


        public function doanhthu_12thang(){
            $arr = [];
            for($i = 1; $i<=12; $i++){
                $query = "SELECT * FROM donhang WHERE month(donhang.NgayThem) = $i";
                $result = $this->connect->query($query);
                $tongtien_thang = 0;
                foreach($result as $item){
                    $tongtien_thang += $item['TongTien'];
                }
               array_push($arr , $tongtien_thang);
            }
            return $arr;
        }

        public function luotmua_12thang(){
            $arr = [];
            for($i = 1; $i<=12; $i++){
                $query = "SELECT * , count(donhang.id) as LuotMua FROM donhang WHERE month(donhang.NgayThem) = $i";
                $result = $this->connect->query($query);
                $luotmua_thang = 0;
                foreach($result as $item){
                    $luotmua_thang += $item['LuotMua'];
                }
               array_push($arr , $luotmua_thang);
            }
            return $arr;
        }

        public function luotmua_theodanhmuc(){
            $query = "SELECT * , count(donhang.id) as LuotMua , sum(chitietdonhang.SoLuong) as DaBan FROM danhmuc
            INNER JOIN sanpham
            ON(danhmuc.id = sanpham.idDanhMuc)
            INNER JOIN chitietsanpham
            ON(sanpham.id = chitietsanpham.idSanPham)
            INNER JOIN size
            ON(chitietsanpham.id = size.idChiTietSanPham)
            INNER JOIN chitietdonhang
            ON(size.id = chitietdonhang.idSize)
            INNER JOIN donhang
            ON(donhang.id = chitietdonhang.idDonHang)
            GROUP BY danhmuc.id";
            return $this->connect->query($query);
        }

        public function binhluan_theosanpham(){
            $query = "SELECT * , count(binhluan.id) as SoLuongBL FROM sanpham 
            INNER JOIN binhluan
            ON(sanpham.id = binhluan.idSanPham)";
            return $this->connect->query($query);
        }

        public function get_baiviet(){
            $query = "SELECT * , baiviet.id as idBaiViet   , baiviet.AnhDaiDien as AnhBaiViet
            FROM baiviet 
            INNER JOIN nguoidung 
            ON(baiviet.idNguoiDung = nguoidung.id)
            ORDER BY baiviet.id ASC";
            return $this->connect->query($query);
        }

        public function get_baiviet_byID($id){
            $query = "SELECT * , baiviet.id as idBaiViet , baiviet.AnhDaiDien as AnhBaiViet
            FROM baiviet 
            INNER JOIN nguoidung 
            ON(baiviet.idNguoiDung = nguoidung.id)
            WHERE baiviet.id = $id";
            return $this->connect->query($query);
        }

        
        public function get_noidung_for_ckeditor($id){
            $query = "SELECT * FROM baiviet WHERE id = $id";
            $result = $this->connect->query($query);
            $baiviet = mysqli_fetch_assoc($result);
            echo $baiviet['NoiDung'];
        }

        public function get_motasp_for_ckeditor($id){
            $query = "SELECT * FROM sanpham WHERE id = $id";
            $result = $this->connect->query($query);
            $baiviet = mysqli_fetch_assoc($result);
            echo $baiviet['MoTa'];
        }

        public function them_baiviet($tieude , $anhdaidien , $noidung , $ngaythem , $noibat , $idNguoiDung){
            move_uploaded_file($anhdaidien['tmp_name'] , './wiew/public/upload/'.$anhdaidien['name'].'');
            $anhdaidien = $anhdaidien['name'];
            $query = "INSERT INTO baiviet(TieuDe,NoiDung,AnhDaiDien,NgayThem,NoiBat,idNguoiDung)
            VALUE ('$tieude','$noidung','$anhdaidien','$ngaythem',$noibat,$idNguoiDung)";
            return $this->connect->query($query);
        }

        public function xoa_baiviet($id){
            $query = "DELETE FROM baiviet WHERE id = $id";
            return $this->connect->query($query);
        }

        public function chinhsua_baiviet($id , $tieude, $hinhanh , $noidung , $noibat){
            if($hinhanh != ''){
                move_uploaded_file($hinhanh['tmp_name'] , './wiew/public/upload/'.$hinhanh['name'].'');
                $src = $hinhanh['name'];
            }
            $query = "UPDATE baiviet SET TieuDe = '$tieude' , NoiDung = '$noidung' , NoiBat = $noibat";
            if($hinhanh != ''){
                $query .= " ,AnhDaiDien = '$src' ";
            }
            $query .= " WHERE id = $id";
            return $this->connect->query($query);
        }


        public function get_binhluan($orderby , $page){
            $offset = ((int)$page - 1) * 10;
            $query = "SELECT * , COUNT(binhluan.id) as SoLuongBL, MIN(binhluan.NgayBL) as CuNhat , MAX(binhluan.NgayBL) as MoiNhat, binhluan.id as idBL , sanpham.id as idSP 
            FROM binhluan
            INNER JOIN sanpham
            ON ( sanpham.id = binhluan.idSanPham)
            GROUP BY sanpham.id";
            if($orderby != ''){
                $query .= " ORDER BY SoLuongBL $orderby";
            }
            $result = $this->connect->query($query);
            $_SESSION['SoLuongBL'] = $result->num_rows;
            $query .= " LIMIT $offset , 10";
            return $this->connect->query($query);
        }

        public function get_binhluan_byID($id){
            $query = "SELECT * FROM sanpham WHERE sanpham.id = $id";
            $result = $this->connect->query($query);
            $sanpham = mysqli_fetch_assoc($result);
            $_SESSION['TenSP'] = $sanpham['TenSP'];
            $query = "SELECT * ,binhluan.id as idBL , sanpham.id as idSP 
            FROM binhluan
            INNER JOIN sanpham
            ON ( sanpham.id = binhluan.idSanPham)
            INNER JOIN nguoidung
            ON(nguoidung.id = binhluan.idNguoiDung)
            WHERE sanpham.id = $id
            GROUP BY binhluan.id";
            return $this->connect->query($query);
        }

        public function xoa_binhluan($id){
            $query = "SELECT * FROM binhluan";
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

        public function them_admin($hoten , $sdt  , $email , $matkhau , $hinhanh , $chucvu){
            $hoten = trim($hoten);
            $email = trim($email);
            $query = "SELECT * FROM nguoidung WHERE Quyen > 0 AND Email LIKE '%$email%'";
            $result = $this->connect->query($query);
            if($result->num_rows > 0) return false;
            if($hinhanh != ''){
                move_uploaded_file($hinhanh['tmp_name'] , './wiew/public/upload/'.$hinhanh['name'].'');
                $src =  $hinhanh['name'];
            }else{
                $src = '';
            }
            $query = "INSERT INTO nguoidung (HoTen,SDT,Email,MatKhau,AnhDaiDien,Login_with,Quyen,ChucVu)
            VALUE ('$hoten','$sdt','$email','$matkhau','$src','system',1,'$chucvu')";
            return $this->connect->query($query);     
        }

        public function chinhsua_admin($id ,$hoten , $sdt  , $email , $matkhau , $hinhanh , $chucvu){
            $hoten = trim($hoten);
            $email = trim($email);
            if($hinhanh != ''){
                move_uploaded_file($hinhanh['tmp_name'] , './wiew/public/upload/'.$hinhanh['name'].'');
                $src =  $hinhanh['name'];
            }else{
                $src = '';
            }
            $query = "UPDATE nguoidung
            SET HoTen = '$hoten' , SDT = '$sdt' , Email = '$email' , MatKhau = '$matkhau' , ChucVu = '$chucvu'";
            if($hinhanh != ''){
                $query .= ", AnhDaiDien = '$src'";
            }
            $query .= " WHERE id = $id ";
            return $this->connect->query($query);
        }

        public function chinhsua_thongtintaikhoan($id ,$hoten , $sdt  , $email , $matkhau , $hinhanh){
            $hoten = trim($hoten);
            $email = trim($email);
            if($hinhanh != ''){
                move_uploaded_file($hinhanh['tmp_name'] , './wiew/public/upload/'.$hinhanh['name'].'');
                $src =  $hinhanh['name'];
            }else{
                $src = '';
            }
            $query = "UPDATE nguoidung
            SET HoTen = '$hoten' , SDT = '$sdt' , Email = '$email' , MatKhau = '$matkhau'";
            if($hinhanh != ''){
                $query .= ", AnhDaiDien = '$src'";
            }
            $query .= " WHERE id = $id ";
            return $this->connect->query($query);
        }


        public function get_all_admin(){
            $query = "SELECT * FROM nguoidung WHERE Quyen > 0";
            return $this->connect->query($query);
        }

        public function get_admin_byID($id){
            $query = "SELECT * FROM nguoidung WHERE Quyen > 0 AND id = $id";
            return $this->connect->query($query);
        }

        public function xoa_admin($id){
            $query = "DELETE FROM nguoidung WHERE id = $id AND Quyen > 0";
            return $this->connect->query($query);
        }

        public function get_all_khachang($orderby){
            $query = "SELECT * , nguoidung.id as idNguoiDung ,  count(donhang.id) as LuotMua FROM nguoidung
            LEFT JOIN donhang
            ON(nguoidung.id = donhang.idNguoiDung)
            WHERE Quyen = 0
            GROUP BY nguoidung.id";
            if($orderby != ''){
                $query .= " ORDER BY LuotMua $orderby";
            }
            return $this->connect->query($query);   
        }


        public function timkiem_sanpham($value){
            $query = "SELECT * , sanpham.id as idSP , danhmuc.id as idDanhMuc FROM sanpham 
            INNER JOIN danhmuc 
            ON(danhmuc.id = sanpham.idDanhMuc)
            WHERE TenSP LIKE '%$value%'";
            $result = $this->connect->query($query);
            if($result->num_rows > 0){
                $item = mysqli_fetch_assoc($result);
                echo 
                '<tr>
                     <td><input data-id="'.$item['idSP'].'" type="checkbox" class="input-checkbox" id="exampleCheck1" ></td>
                     <td>'.$item['idSP'].'</td>
                     <td>'.$item['TenDanhMuc'].'</td>
                     <td>'.$item['TenSP'].'</td>
                     <td>'.number_format($item['Gia']).' VNĐ</td>
                     <td>'.$item['LuotXem'].'</td>
                     <td>'.$item['LuotMua'].'</td>
                     <td><a href="admin/quanlysanpham/chinhsua/'.$item['idSP'].'"><button type="button"  class="btn btn-info chinhsua"><i class="far fa-eye"></i></button></a></td>
                </tr>';
            }
        }
     
    }


?>