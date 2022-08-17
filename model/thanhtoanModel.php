<?php 

   class thanhtoanModel extends connect{
        
       public function set_size(){
            if(!empty($_SESSION['giohang'])){
                 foreach($_SESSION['giohang'] as $item){
                     $id = $item['idSize'];
                     $idSP = $item['idSP'];
                     $SoLuong = $item['SoLuong'];
                     $query = "UPDATE size SET SoLuong = SoLuong - $SoLuong  WHERE id = $id";
                     $this->connect->query($query);
                     $query = "UPDATE sanpham SET LuotMua = LuotMua + 1 WHERE id = $idSP";
                     $this->connect->query($query);
                 }
            }
       }


       public function donhang_tienmat($label_id , $partner_id, $tongtien , $hoten , $diachi , $sdt , $phigiaohang , $ghichu , $idNguoiDung){
            $date = new DateTime();
            $ngaythem = $date->format('Y-m-d');
            $query = "INSERT INTO donhang (id,partner_id,TrangThaiThanhToan,NgayThem,TongTien,TenNguoiNhan,DiaChiNhan,SDT,PhiGiaoHang,GhiChu,idNguoiDung)
            VALUE('$label_id','$partner_id','Chưa thanh toán','$ngaythem',$tongtien,'$hoten','$diachi','$sdt',$phigiaohang,'$ghichu',$idNguoiDung)";
            $this->connect->query($query);

            if(!empty($_SESSION['giohang'])){
                foreach($_SESSION['giohang'] as $item){
                    $idSize = $item['idSize'];
                    $SoLuong = $item['SoLuong'];
                    $gia = $item['Gia'];
                    $thanhtien = $SoLuong * $gia;
                    $query = "INSERT INTO chitietdonhang (Gia,SoLuong,ThanhTien,idSize,idDonHang)
                    VALUE($gia,$SoLuong,$thanhtien,$idSize,'$label_id')";
                    $this->connect->query($query);
                }
                $_SESSION['giohang'] = [];
            }
       }


       public function donhang_online($label_id , $partner_id, $idHoaDon_vnpay ,  $tongtien , $hoten , $diachi , $sdt , $phigiaohang , $ghichu , $idNguoiDung){
        $date = new DateTime();
        $ngaythem = $date->format('Y-m-d');
        $query = "INSERT INTO donhang (id,partner_id,MaHoaDon_vnpay,TrangThaiThanhToan,NgayThem,TongTien,TenNguoiNhan,DiaChiNhan,SDT,PhiGiaoHang,GhiChu,idNguoiDung)
        VALUE('$label_id','$partner_id','$idHoaDon_vnpay','Đã thanh toán','$ngaythem',$tongtien,'$hoten','$diachi','$sdt',$phigiaohang,'$ghichu',$idNguoiDung)";
        $this->connect->query($query);

        if(!empty($_SESSION['giohang'])){
            foreach($_SESSION['giohang'] as $item){
                $idSize = $item['idSize'];
                $SoLuong = $item['SoLuong'];
                $gia = $item['Gia'];
                $thanhtien = $SoLuong * $gia;
                $query = "INSERT INTO chitietdonhang (Gia,SoLuong,ThanhTien,idSize,idDonHang)
                VALUE($gia,$SoLuong,$thanhtien,$idSize,'$label_id')";
                $this->connect->query($query);
            }
            $_SESSION['giohang'] = [];
        }
   }
     
   }


?>