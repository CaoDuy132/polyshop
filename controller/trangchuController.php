<?php

    class trangchuController extends baseController{

        public function index(...$param){
            $trangchuModel = $this->model('trangchuModel');
            $giohangModel = $this->model('giohangModel');
            $giaodienModel = $this->model('giaodienModel');
            $banner = $giaodienModel->get_banner();
            $baiviet = $trangchuModel->get_baiviet();
            $giohangModel->check_cookie();
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $listDanhMuc = $trangchuModel->get_danhmuc();
            $SanPhamNoiBat = $trangchuModel->get_sanpham_noibat();
            $this->show($listDanhMuc , $SanPhamNoiBat , $result_user , $banner , $baiviet);
        }

        public function show($result , $SanPhamNoiBat ,  $result_user , $banner , $baiviet){
            $this->wiew('trangchu' , 'index' , ['listDanhMuc'=>$result , 'SanPhamNoiBat'=>$SanPhamNoiBat , 'user'=>$result_user , 'banner'=> $banner,'baiviet'=>$baiviet]);
        }

        public function show_sanpham_ajax(){
             $value = $_POST['value'];
             $model = $this->model('trangchuModel');
             $result = $model->show_sanpham_ajax($value);
             foreach($result as $item){
                 if($item['PhanTramKhuyenMai'] > 0){
                     $GiaKhuyenMai = ($item['Gia'] / 100) * (100 - $item['PhanTramKhuyenMai']);
                 }
                 echo '
                   <div class="box-item fadeIn">
                         <div class="top">
                              <a href="chitietsanpham/'.$item['idSP'].'"><img src="./wiew/public/upload/'.$item['AnhDaiDien'].'" alt=""></a>';
                          if($item['PhanTramKhuyenMai'] > 0){
                              echo '
                              <div class="giamgia">
                                  <p style="color:white;"> -'.$item['PhanTramKhuyenMai'].'%</p>
                              </div>
                              ';
                          }    
                          echo'   
                              <div class="action">
                                    <span data-id="'.$item['idSP'].'" class="themvaogio">THÊM VÀO GIỎ</span>
                                    <span data-id="'.$item['idSP'].'" class="muangay">MUA NGAY</span>
                              </div>
                         </div>
                         <div class="bot">
                              <a href="chitietsanpham/'.$item['idSP'].'"><p class="tensp">'.$item['TenSP'].'</p></a>';
                    if($item['PhanTramKhuyenMai'] > 0){
                            echo '
                            <div class="giasp">
                                <p class="gia">'.number_format($GiaKhuyenMai).' <u>đ</u></p>
                                <p class="giakp"><strike>'.number_format($item['Gia']).'<u>đ</u></strike></p>
                            </div>
                        </div>
                       
                    </div>   ';
                    }else{
                        echo '
                           <div class="giasp">
                            <p class="gia">'.number_format($item['Gia']).' <u>đ</u></p>
                          </div>
                       </div>
                    </div>  ';
                    }                             
                }
             exit();
        }
        
        
    }
   

?>