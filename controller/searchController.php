<?php
 
    class searchController extends BaseController{

        public function search_ajax(){
            $value_search = $_POST['search'];
            $searchModel = $this->model('searchModel');
            $result = $searchModel->search_ajax($value_search);
            if($result == true && $result->num_rows > 0){
                foreach($result as $item){
                    if($item['PhanTramKhuyenMai'] > 0){
                        $giakm = ($item['Gia'] / 100) * (100 - $item['PhanTramKhuyenMai']);
                    }
                    echo ' 
                    <li>
                        <a href="/chitietsanpham/'.$item['idSP'].'">
                        <div class="box-img">
                                <img src="/wiew/public/upload/'.$item['AnhDaiDien'].'" alt="">
                        </div>
                        <div class="box-text">
                                <p class="tensp">'.$item['TenSP'].'</p>';

                    if($item['PhanTramKhuyenMai'] == 0){
                        echo '<p class="gia">'.number_format($item['Gia']).'đ</p>';
                    }else{
                        echo '<p class="gia">'.number_format($item['Gia']).'đ<span><strike>'.number_format($giakm).'đ</strike></span></p>';
                    }           
                    echo '</div>
                        </a>
                    </li>';
                }
            }else{
                echo '';
            }
        }
        
    }


?>