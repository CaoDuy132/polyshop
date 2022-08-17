 <?php 

   
    class giohangController extends BaseController{

          public function index(){
            $giohangModel = $this->model('giohangModel');
            $giohangModel->check_cookie();
            $userModel = $this->model('userModel');
            $result_user = $userModel->get_info_user();
            $this->show($result_user);
          }

          public function show($result_user){
              $this->wiew('giohang' , 'index' , ['user'=>$result_user]);
          }
          
          public function add_item(){
              $idSize = isset($_POST['idSize']) ? $_POST['idSize'] : 0;
              $SoLuong = isset($_POST['SoLuong']) ? $_POST['SoLuong'] : 0;
              $giohangModel = $this->model('giohangModel');
              $giohangModel->add_item($idSize , $SoLuong);
              $this->show_giohang_header(); 
          }

        


          public function delete_item(){
              $id = isset($_POST['id']) ? $_POST['id'] : 0;
              $giohangModel = $this->model('giohangModel');
              $giohangModel->delete_item($id);
              $this->show_giohang_ajax();
          }

          public function giam_soluong(){
             $id = isset($_POST['id']) ? $_POST['id'] : 0;
             $giohangModel = $this->model('giohangModel');
             $giohangModel->giam_soluong($id);
             $this->show_giohang_ajax();
          }

          public function tang_soluong(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $giohangModel = $this->model('giohangModel');
            $giohangModel->tang_soluong($id);
            $this->show_giohang_ajax();
         }

         

          public function show_soluong(){
              $tong_sl = 0;
              if(!empty($_SESSION['giohang'])){
                  foreach($_SESSION['giohang'] as $item){
                      $tong_sl += $item['SoLuong'];
                  }
              }
              echo $tong_sl;
          }

          public function show_tongtien(){
            $tongtien = 0;
            if(!empty($_SESSION['giohang'])){
                foreach($_SESSION['giohang'] as $item){
                    $thanhtien = $item['Gia'] * $item['SoLuong'];
                    $tongtien += $thanhtien;
                }
            }
            echo number_format($tongtien) . ' VND';
          }

          public function show_giohang_header(){
            if(!empty($_SESSION['giohang'])){
                $tongtien = 0;
                echo '<ul class="content">';   
                foreach($_SESSION['giohang'] as $item){
                     $tongtien += ($item['Gia'] * $item['SoLuong']);
                        echo 
                        '<li>
                            <div class="left">
                                <img src="/wiew/public/upload/'.$item['HinhAnh'].'" alt="">
                            </div>
                            <div class="right">
                                <p class="tensp">'.$item['TenSP'].' - '.$item['MauSac'].'</p>
                                <p class="size">Size :<span class="soluong">'.$item['TenSize'].' x  '.$item['SoLuong'].'</span></p>
                                <p class="gia">'.number_format($item['Gia']).' đ</p>
                            </div>  
                        </li>';
                }
                echo'</ul>
                    <div class="tongtien">
                        <p>TỔNG TIỀN :</p>
                        <p id="tongtien-giohang">'.number_format($tongtien).'đ</p>
                    </div>
                    <div class="bot">
                        <a href="giohang"><button>XEM GIỎ HÀNG</button></a>
                        <a href="thanhtoan"><button>THANH TOÁN</button></a>
                    </div>';
                
              }
          }


          public function show_giohang_ajax(){
            if(!empty($_SESSION['giohang'])){
                foreach($_SESSION['giohang'] as $item){
                    $tamtinh = $item['Gia'] * $item['SoLuong'];
                    echo 
                    '<li>
                           <span id="'.$item['id'].'" class="xoa">X</span>
                           <img src="/wiew/public/upload/'.$item['HinhAnh'].'" alt="">
                           <div class="box-thongtinsp">
                                <p class="tensp">'.$item['TenSP'].' - '.$item['MauSac'].'</p>
                                <p class="size">Size : '.$item['TenSize'].'</p>
                           </div>
                           <div class="right">
                                <p class="giasp">'.number_format($item['Gia']).' VND</p>
                                <span id="'.$item['id'].'" class="btn-tru">-</span>
                                <input type="number" value="'.$item['SoLuong'].'" disabled>
                                <span id="'.$item['id'].'" class="btn-cong">+</span>
                                <p class="tamtinh">'.number_format($tamtinh).' VND</p>
                           </div>
                    </li>';
                }
           }
          }

    }

?>