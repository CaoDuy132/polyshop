<div class="left fadeInLeft" >
        <div class="top">
             <div class="anhdaidien">
                   <img src="/wiew/public/upload/<?php echo $user['AnhDaiDien']?>" alt="">
             </div>
             <div class="box-ten">
                  <p>Wellcom</p>
                  <h5><?php echo $user['HoTen']; ?></h5>
             </div>
        </div>
         <div class="title">
              <h5>DASHBOARD</h5>
         </div>
         <nav class="menu">
             <ul>
                <?php
                    $list_chucvu = explode('&' , $user['ChucVu']);
                    foreach($list_chucvu as $chucvu){
                        if($chucvu == 'sanpham'){
                            echo                     
                            '<li>
                                <a href="/admin">
                                    <div class="box-left">
                                        <img src="/wiew/public/upload/icon_left_menu_32.png" alt="">
                                        Sản phẩm
                                    </div>
                                </a>
                            </li>';
                        }
                        else if($chucvu == 'danhmuc'){
                            echo 
                            '<li> 
                                <a href="/admin/danhmuc">
                                    <div class="box-left">
                                        <img src="/wiew/public/upload/icon_left_menu_32.png" alt="">
                                        Danh mục
                                    </div>
                                </a>
                            </li>';
                        }
                        else if($chucvu == 'donhang'){
                            echo 
                            '<li>
                                <a href="/admin/donhang">
                                    <div class="box-left">
                                        <img src="/wiew/public/upload/donhang_32.png" alt="">
                                        Đơn hàng
                                    </div>
                                </a>
                            </li>';
                        }
                        else  if($chucvu == 'binhluan'){
                            echo
                             '<li>
                                <a href="/admin/binhluan">
                                    <div class="box-left">
                                        <img src="/wiew/public/upload/binhluan_32.png" alt="">
                                        Bình luận
                                    </div>
                                </a>
                            </li>';
                        }
                        else if($chucvu == 'baiviet'){
                            echo 
                            '<li>
                                <a href="/admin/baiviet">
                                    <div class="box-left">
                                        <img src="/wiew/public/upload/icon_left_menu_32.png" alt="">
                                        Bài viết
                                    </div>
                                </a>
                            </li>';
                        }else if($chucvu == 'giaodien'){
                            echo 
                            '<li>
                                <a href="/admin/giaodien">
                                    <div class="box-left">
                                        <img src="/wiew/public/upload/icon_left_menu_32.png" alt="">
                                        Giao diện
                                    </div>
                                </a>
                            </li>';
                        }
                        else  if($chucvu == 'nguoidung'){
                            echo
                             '<li class="show-sub-menu">
                                    <a href="javacript:">
                                    <div class="box-left">
                                        <img src="/wiew/public/upload/nguoidung_32.png" alt="">
                                        Người dùng
                                    </div>
                                    <i class="fas fa-angle-down show-sub-menu"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="/admin/nguoidung/quantri">Quản trị</a></li>
                                        <li><a href="/admin/nguoidung/khachhang">Khách hàng</a></li>
                                    </ul>
                            </li>';
                        }
                        else  if($chucvu == 'thongke'){
                            echo 
                            '<li class="show-sub-menu"> 
                                <a href="javacript:">
                                <div class="box-left">
                                    <img src="/wiew/public/upload/bieudo_32.png" alt="">
                                    Thống kê 
                                </div>
                                <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="/admin/bieudothongke">Thống kê doanh thu</a></li>
                                    <li><a href="/admin/bieudothongke/luotmuatheothang">Thống kê lượt mua</a></li>
                                    <li><a href="/admin/bieudothongke/luotmuatheodanhmuc">Thống kê sản phẩm đã bán</a></li>
                                </ul>
                           </li>';
                        }
                    }      
                ?>
                 
                
                 
                 
                
                
                
             </ul>
         </nav>
</div>

<section id="load">
    <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>
</section>