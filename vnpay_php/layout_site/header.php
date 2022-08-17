          <section id="load">
               <div class="loader loader-1">
                    <div class="loader-outter"></div>
                    <div class="loader-inner"></div>
               </div>
          </section>
          <div class="wrapper-themvaogio">
               <div class="box-themvaogio fadeIn" class="">
                    <div class="tieude">
                         <h1>THÔNG TIN SẢN PHẨM</h1>
                    </div>
                    <div class="content">
                         <div class="left">
                              <div class="box-img">
                                   <img src="https://localhost/wiew/public/upload/APM3013_COV__QSM3021_DEN__4_of_8_.jpg" alt="">
                              </div>
                         </div>
                         <div class="right">
                              <div class="mausac">
                                   <h1>Màu có sẵn <span style="color: #e96b6d;">*</span></h1>
                                   <div class="box-color">
                                        <div class="show-color-detail" data-id="52"><span></span></div>
                                        <div class="show-color-detail" data-id="53"><span></span></div>
                                        <div class="show-color-detail" data-id="54"><span></span></div>
                                        <div class="show-color-detail" data-id="55"><span></span></div>
                                   </div>
                              </div>
                              <div class="size">
                                   <h1>Size có sẵn <span style="color: #e96b6d;">*</span></h1>
                                   <div class="size-action">
                                        <select name="" id="chonsize">
                                             <option value="" selected disabled hidden>Chọn size</option>
                                             <option value="">S</option>
                                             <option value="">M</option>
                                             <option value="">L</option>
                                             <option value="">XL</option>
                                        </select>
                                        <p id="SoLuongSize"></p>
                                   </div>
                                   <div class="ChonSoLuongSize">
                                          <h1>Chọn số lượng</h1>
                                          <div class="ChonSoLuongSize-action">
                                             <button id="GiamSoLuong">-</button>
                                             <input id="SoLuongSP" type="number" value="1">
                                             <button id="TangSoLuong">+</button>
                                          </div>
                                   </div>
                                   <p id="SoLuongToiDa"></p>
                              </div>
                         </div>
                    </div>
                    <div class="action">
                         <button id="submit-muahang">Hoàn tất</button>
                         <button id="close-themvaogio">Hủy</button>
                    </div>
               </div>
          </div>
          <section id="scroll-top">
               <i class="fas fa-angle-up"></i>
          </section>
          <div id="form-login" class="form-login">
               <div class="form-login-action fadeInDown">
                         <!-- <div class="form-login-action-logo">
                              <a href=""><h1>F.Fashion</h1></a>
                         </div> -->
                         <div class="back">
                              <i class="fas fa-chevron-left"></i>
                         </div>
                         <div class="form-login-action-title">
                              <h1>Đăng nhập vào F.Fashion</h1>
                         </div>
                         <div class="wrapper-input">
                              <div id="login-with-email" class="form-login-item">
                                   <img src="https://fullstack.edu.vn/assets/images/signin/personal-18px.svg" alt="">
                                   <p>Sử dụng Email / tài khoản</p>
                              </div>                             
                              <div id="login-with-google" class="form-login-item">
                                   <img src="https://fullstack.edu.vn/assets/images/signin/google-18px.svg" alt="">
                                   <p>Đăng nhập với Google</p>
                              </div>
                              <div id="login-with-facebook" class="form-login-item">
                                   <img src="https://fullstack.edu.vn/assets/images/signin/facebook-18px.svg" alt="">
                                   <p>Đăng nhập với Facebook</p>
                              </div>
                              <input id="email-login" type="text" placeholder="Địa chỉ email" autocomplete="off">
                              <input id="password-login" type="text" placeholder="Mật khẩu" autocomplete="off">
                              <input id="submit-login" type="submit" value="Đăng nhập">
                         </div>
                         <div class="form-login-item-dangky">
                              <p>Bạn chưa có tài khoản? <a style="color: #ff5c62;" href="">Đăng ký</a></p>
                         </div>
               </div>
          </div>
          <header class="header">
               <div class="header-top">
                    <div class="header-top-wrapper">
                         <div class="box-logo pulse">
                              <!-- <a href=""><img src="./wiew/public/upload/logo.png" alt=""></a> -->
                              <a href="/"><h1>F.Fashion</h1></a>
                         </div>
                         <div class="box">
                              <div class="box-left">
                              <img src="./wiew/public/upload/icon_1.webp" alt="">
                              </div>
                              <div class="box-right">
                                   <h5>Miễn phí vận chuyển</h5>
                                   <p>Cho đơn hàng trên 500k</p>
                              </div>
                         </div>
                         <div class="box">
                              <div class="box-left">
                              <img src="./wiew/public/upload/icon_2.png" alt="">
                              </div>
                              <div class="box-right">
                                   <h5>Hỗ trợ 24/7</h5>
                                   <p>0123456789</p>
                              </div>
                         </div>
                         <div class="box">
                              <div class="box-left">
                              <img src="./wiew/public/upload/icon_3.png" alt="">
                              </div>
                              <div class="box-right">
                                   <h5>Giờ làm việc</h5>
                                   <p>T2 - T7 Giờ hành chính</p>
                              </div>
                         </div>
                         <div class="box header-menu-left">
                              <div class="show-box-search">
                                   <img style="width: 25px;height: 25px;" src="/wiew/public/upload/box-search2-black.ico" alt="">
                              </div>      
                              <div class="cart">
                                   <img style="width: 35px;height: 35px;" src="/wiew/public/upload/box-cart-black.ico" alt="">
                                   <span>
                                        <p  class="fadeInUp SoLuongCart">
                                             <?php 
                                                  $tongsl = 0;
                                                  if(!empty($_SESSION['giohang'])){
                                                       foreach($_SESSION['giohang'] as $item){
                                                            $tongsl += $item['SoLuong'];
                                                       }         
                                                  }
                                                  echo $tongsl;
                                             ?>
                                        </p>
                                   </span>
                                   <div class="show-cart">
                                         <ul class="content">
                                               <!-- <li>
                                                    <div class="left">
                                                         <img src="https://localhost/wiew/public/upload/apn3890_nav__4_.jpg" alt="">
                                                    </div>
                                                    <div class="right">
                                                          <p class="tensp">Áo polo nữ cafe bo kẻ - navy</p>
                                                             <p class="size">Size :<span class="soluong">S x  2</span></p>
                                                             <p class="gia">224,100 đ</p>
                                                    </div>  
                                               </li> -->
                                               <?php
                                                   $tongtien = 0;
                                                   if(!empty($_SESSION['giohang'])){
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
                                                   }else{
                                                        echo '
                                                        <p style="font-size:85%;">Giỏ hàng trống.</p>';
                                                   }
                                               ?>
                                              
                                         </ul>
                                         <div class="tongtien">
                                              <p>TỔNG TIỀN :</p>
                                              <p id="tongtien-giohang"><?php echo number_format($tongtien)?>đ</p>
                                         </div>
                                         <div class="bot">
                                              <a href="giohang"><button>XEM GIỎ HÀNG</button></a>
                                              <a href="thanhtoan"><button>THANH TOÁN</button></a>
                                         </div>
                                   </div>
                              </div>
                              <div class="user" style="border: none;"
                                      <?php if($user == false ){
                                           echo 'data-login="false"'; 
                                        }else{
                                           echo 'data-login="true" show-user-connect="false"'; 
                                        }
                                      ?>>
                                   <?php
                                        if($user == false ){
                                             echo '<img style="width: 100%;height: 100%;" src="/wiew/public/upload/box-user-black.ico" alt="">';
                                        }else{
                                             if (isset($_SESSION['access_token_gg']) || isset($_SESSION['access_token_fb'])) {
                                                  echo '<img style="width: 100%;height: 100%;" src="'.$user['AnhDaiDien'].'" alt="">';
                                             }else{
                                                  echo '<img style="width: 30px;height: 30px;" src="/wiew/public/upload/'.$user['AnhDaiDien'].'" alt="">';
                                             }
                                        }
                                   ?>
                              </div>
                              <div style="display: none;" class="user-connect ">
                                   <div class="top">
                                        <div class="box-img">
                                        <?php
                                             if($user == false ){
                                                  echo '<img  src="/wiew/public/upload/box-user-black.ico" alt="">';
                                             }else{
                                                  if (isset($_SESSION['access_token_gg']) || isset($_SESSION['access_token_fb'])) {
                                                       echo '<img src="'.$user['AnhDaiDien'].'" alt="">';
                                                  }else{
                                                       echo '<img src="/wiew/public/upload/'.$user['AnhDaiDien'].'" alt="">';
                                                  }
                                             }
                                        ?>
                                        
                                        </div>    
                                        <div class="box-name">
                                             <p><?php echo ucfirst( $user['HoTen']) ?></p>
                                             <p>From : <?php echo ucfirst( $user['Login_with']) ?></p>
                                        </div>   
                                   </div>
                                   <div class="bot">
                                        <a href=""><p style="margin-top: 0;">Thông tin đơn hàng</p></a>
                                        <a href=""><p>Thông tin cá nhân</p></a>
                                        <p class="dangxuat">Đăng xuất</p>
                                   </div>
                              </div>
                      </div>
                    </div>
               </div>
               <div class="header-bot">
                       <div class="box-search fadeIn">
                              <div class="box-input-search">       
                                   <form action="">
                                        <i class="fas fa-times close-search"></i>
                                        <input type="text" id="search" placeholder="Tìm kiếm sản phẩm" autocomplete="off">
                                        <input type="submit" value="">
                                   </form>
                              </div>
                              <div class="box-change-search">
                                   <p class="search-null">Không có sản phẩm nào...</p>
                                   <ul class="search-result">
                                        <!-- <li>
                                             <a href="">
                                                  <div class="box-img">
                                                       <img src="https://product.hstatic.net/200000276673/product/1de5_b6f3b18dbc6b428688ad1ff9df92ed41_bbe6e2ac5ce84496991b0d603f336078_ff66c1e7ffad4cf3ac6ea9bc06d46cf7_compact.jpg" alt="">
                                                  </div>
                                                  <div class="box-text">
                                                       <p class="tensp">Áo có slogan</p>
                                                       <p class="gia">360,000đ <span><strike>460.000đ</strike></span></p>
                                                  </div>
                                             </a>
                                        </li>   -->
                                   </ul>
                              </div>
                         </div>
                     <div class="header-bot-wrapper">
                         <div class="box-logo">
                              <a href=""><h1>F.Fashion</h1></a>
                         </div>
                         <nav>
                              <ul>
                                   <li class="trangchu">
                                        <a href="/">Trang chủ</a>
                                   </li>
                                   <li class="menu-sanpham">
                                        <a  href="">Sản phẩm </a> 
                                        <i class="fas fa-angle-down "></i>      
                                   </li>
                                   <li class="menu-baiviet">
                                        <a href="">Tin tức</a>
                                        <i class="fas fa-angle-down"></i>
                                   </li>
                                   <li class="gioithieu">
                                        <a href="">Giới thiệu</a>
                                   </li>
                                   <li class="lienhe">
                                        <a href="">Liên hệ</a>
                                   </li>
                              </ul>
                         </nav>
                         <div class="box header-menu-left">
                                   <div class="show-box-search">
                                        <img style="width: 25px;height: 25px;" src="/wiew/public/upload/box-search2.ico" alt="">
                                   </div>     
                                   <div class="cart">
                                        <img style="width: 35px;height: 35px;" src="/wiew/public/upload/box-cart.ico" alt="">
                                        <span>
                                             <p class="fadeInUp SoLuongCart">
                                                 <?php 
                                                     $tongsl = 0;
                                                     if(!empty($_SESSION['giohang'])){
                                                         foreach($_SESSION['giohang'] as $item){
                                                              $tongsl += $item['SoLuong'];
                                                         }         
                                                     }
                                                     echo $tongsl;
                                                 ?>
                                            </p>
                                       </span>
                                        <div class="show-cart">
                                             <ul class="content">
                                                  <?php  
                                                       if(!empty($_SESSION['giohang'])){
                                                            $tongtien = 0;
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
                                                       }else{
                                                            echo '
                                                            <p style="font-size:85%;">Giỏ hàng trống.</p>';
                                                       }
                                                  ?>        
                                             </ul>
                                             <div class="tongtien">
                                                  <p>TỔNG TIỀN :</p>
                                                  <p id="tongtien-giohang"><?php echo number_format($tongtien)?>đ</p>
                                             </div>
                                             <div class="bot">
                                                  <a href="giohang"><button>XEM GIỎ HÀNG</button></a>
                                                  <a href="thanhtoan"><button>THANH TOÁN</button></a>
                                             </div>
                                       </div>
                                   </div>
                                   <div class="user" 
                                   <?php
                                      if($user == false ){
                                           echo 'style="width: 30px;height: 30px;border: none;" data-login="false"';
                                      }else{
                                           echo 'style="width: 30px;height: 30px;" data-login="true" show-user-connect="false"';
                                      }
                                   ?>>        
                                        <?php
                                             if($user == false ){
                                                  echo '<img style="width:  100%;height:  100%;" src="/wiew/public/upload/box-user.ico" alt="">';
                                             }else{
                                                  if (isset($_SESSION['access_token_gg']) || isset($_SESSION['access_token_fb'])) {
                                                       echo '<img style="width: 100%;height:  100%;" src="'.$user['AnhDaiDien'].'" alt="">';
                                                  }else{
                                                       echo '<img style="width:  100%;height:  100%;" src="/wiew/public/upload/'.$user['AnhDaiDien'].'" alt="">';
                                                  }
                                             }
                                        ?>
                                   </div>
                                   <div style="display: none;" class="user-connect ">
                                        <div class="top">
                                             <div class="box-img">
                                             <?php
                                                  if($user == false ){
                                                       echo '<img  src="/wiew/public/upload/box-user-black.ico" alt="">';
                                                  }else{
                                                       if (isset($_SESSION['access_token_gg']) || isset($_SESSION['access_token_fb'])) {
                                                            echo '<img src="'.$user['AnhDaiDien'].'" alt="">';
                                                       }else{
                                                            echo '<img src="/wiew/public/upload/'.$user['AnhDaiDien'].'" alt="">';
                                                       }
                                                  }
                                             ?>
                                             </div>    
                                             <div class="box-name">
                                                  <p><?php echo ucfirst( $user['HoTen']) ?></p>
                                                  <p>From : <?php echo ucfirst( $user['Login_with']) ?></p>
                                             </div>   
                                        </div>
                                        <div class="bot">
                                             <a href=""><p style="margin-top: 0;">Thông tin đơn hàng</p></a>
                                             <a href=""><p>Thông tin cá nhân</p></a>
                                             <p class="dangxuat">Đăng xuất</p>
                                        </div>
                                 </div>
                         </div>
                     </div>
                     <div class="sub-menu-sanpham fadeIn" >
                         <div>
                              <h1>Áo nam</h1>
                              <ul>
                                   <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="sanpham/ao-polo-nam">Áo polo nam</a>
                                   </li>
                                   <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="sanpham/ao-so-mi-nam">Áo sơ mi nam</a>
                                   </li>
                              </ul>
                         </div>
                         <div>
                              <h1>Quần nam</h1>
                              <ul>
                                   <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="sanpham/quan-tay-nam">quần tây nam</a>
                                   </li>
                              </ul>
                         </div>
                         <div>
                              <h1>Áo nữ</h1>
                              <ul>
                                   <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="sanpham/ao-polo-nu">Áo polo nữ</a>
                                   </li>
                              </ul>
                         </div>
                         <div>
                              <h1>Quần nữ</h1>
                              <ul>
                                   <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="sanpham/quan-au-nu">Quần âu nữ</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
                    <div class="sub-menu-baiviet fadeIn">
                         <ul>
                              <li><a href="">Thời trang</a></li>
                              <li><a href="">Tin tức tổng hợp</a></li>
                         </ul>
                    </div>
               </div>
          </header>