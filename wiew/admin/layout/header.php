<header class="header">
    <div class="logo">
        <a href="/admin"><h1>F.Fashion</h1></a>
    </div>
    <div class="user">
        <?php $user = mysqli_fetch_assoc($data['user']); ?>
        <div class="box-img">
            <img src="/wiew/public/upload/<?php echo $user['AnhDaiDien']?>" alt="">
        </div>
        <div class="menu-user">
            <p><?php echo $user['HoTen']; ?></p>
            <ul>
                <li><a href="/admin/thongtintaikhoan">Sửa hồ sơ <i class="fas fa-user-edit"></i></a></li>  
                <li><a id="dangxuat" href="javascript:">Đăng xuất <i class="fas fa-sign-out-alt"></i></a></li>  
            </ul>
        </div>
   </div>
</header>