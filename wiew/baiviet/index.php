<?php
   

     // $baiviet = mysqli_fetch_assoc($data['baiviet']);
     // echo '<a href="baiviet/'.$baiviet['id'].'">Click</a>';
     // $baiviet = mysqli_fetch_assoc($data['thembaiviet']);
     // echo '<a href="thembaiviet">Click</a>';
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F.Fashion</title>
    <base href="/">
    <link rel="stylesheet" href="/wiew/public/css/baiviet.css">
    <link rel="stylesheet" href="/wiew/public/css/header.css">
    <link rel="stylesheet" href="/wiew/public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="/wiew/public/js/baiviet.js"></script>
    <script src="/wiew/public/js/header.js"></script>
    <script src="/wiew/public/js/muahang.js"></script>

    <script src="https://kit.fontawesome.com/8432acb9d6.js" crossorigin="anonymous"></script>

 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,200;0,700;1,200&family=Comfortaa&family=Inter:wght@300&family=Kanit:wght@300&family=Quicksand&family=Raleway:wght@300&family=Righteous&family=Roboto+Condensed:wght@300;400&family=Roboto:wght@300&family=Rubik&family=Titillium+Web:wght@200;400&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">

    <!--thư viện slide-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  <style>
     .menu-back{
        display: flex;
        width: 100%;
        background-color: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .menu-back .content{
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 75%;
        padding: 0.6em 0;
      }
      .menu-back .content a{
        text-decoration: none;
        color: black;
        font-size: 85%;
        font-family: 'Titillium Web', sans-serif;
      }
      .menu-back .content a:hover{
        color: #b80a0d;
        transition: 0.2s;
      }
      .menu-back .content p{
        margin-bottom: 0;
        color: rgb(97, 96, 96);
      }
      .menu-back .content span{
        margin: 0 1em;
        font-size: 82%;
        color: rgb(138, 138, 138);
      }
      /* end */
        .contentd {
          margin: auto;
          width: 75%;
          background-color: rgb(255, 255, 255);
          margin-top: 30px;
        }
        .contentd  .leftcontent {
          float: left;
          background-color: rgb(255, 255, 255);
          width: 70%;
          height: auto;
        }
        .contentd .rightcontent {
          background-color: rgb(255, 255, 255);
          width: 23%;
          height: auto;
          float: right;
          margin-top: 30px;
        }
        @font-face {
          src: url(font/00288-SFUFuturaBook.TTF);
          font-family: "SFU FuTuRa" sans-serif;
        }
        .contentd .titled2 {
          font-family: "SFU FuturaBook", sans-serif;
          font-size: 28px;
          background-color: rgb(255, 255, 255);
        }
        .contentd  .titled {
          font-family: "SFU FuturaBook", sans-serif;
          font-size: 28px;
          background-color: rgb(255, 255, 255);
          margin-top: 30px;
          font-weight: bold;
        }
        .contentd  .leftcontent > hr {
          width: 100px;
          border: 0.5px solid black;
        }
        .contentd .rightcontent > hr {
          width: 100%;
          border: 0.5px solid black;
          opacity: 0.05;
        }
        .contentd .little_title {
          font-size: 17px;
          font-weight: bold;
          opacity: 0.7;
          font-family: "SFU FuTuRa";
          font-style: normal;
          margin-top: -10px;
          margin-bottom: 20px;
        }
        .contentd .textd {
          font-size: 14px;
          font-family: "SFU FuTuRa";
          font-weight: bolder;
        }
        .contentd .flex_itemd {
          width: 30%;
          height: 150px;
          background-color: rgb(255, 255, 255);
        }
        .contentd .flex_itemd > img {
          max-width: 100%;
          height: 100%;
        }
        .contentd .note {
          color: #707070;
          font-family: "SFU FuTuRa";
          font-size: 12px;
          text-align: center;
          font-weight: bold;
          margin-bottom: 10px;
        }
        .contentd  .flex_itemd_title {
          font-size: 16px;
          font-family: "SFU FuTuRa" sans-serif;
          text-align: center;
          font-weight: bold;
          margin-bottom: 10px;
          width: 230px;
          background-color: rgb(255, 251, 251);
        }
        .contentd  .flex_itemd_text {
          color: #707070;
          font-family: "SFU FuTuRa";
          font-size: 13px;
          text-align: center;
          background-color: #f5f6fb;
          width: 90%;
          padding: 20px;
        }
        .contentd  .rightcontent_title > hr {
          color: red;
        }
        .contentd   .rightcontent_title > h2 {
          font-size: 20px;
          font-family: "SFU FuTuRa" sans-serif;
        }
        .contentd  .rightcontent_item {
          width: 100%;
          background-color: rgb(255, 255, 255);
          margin-bottom: 5px;
        }

        .contentd   .rightcontent_itemtextday {
          font-size: 15px;
          font-style: italic;
        }
        .contentd  .listd {
          list-style-type: none;
          margin-left: -30px;
          line-height: 35px;
        }
        .contentd  .bannerd {
          max-width: 480;
          height: 311;
        }
        .contentd  .bannerd img {
          width: 500px;
          height: 350px;
        }
        .contentd  .leftcontent_title {
          color: #252a2b;
          margin: 20px 0;
          font-family: "SFU FuTuRa" sans-serif;
          font-size: 24px;
        }
        a {
          text-decoration: none;
          color: black;
        }
        .contentd  .linemenu {
          width: 100%;
          height: 50px;
          font-size: 14px;
          font-family: "SFU FuTuRa" sans-serif;
          background-color: rgb(206, 200, 200);
        }
        .contentd   .grid_item {
          display: flex;
          margin-bottom: 10px;
        }
        .contentd .grid_item img {
          width: 70px !important;
          height: 50px !important;
          margin-right: 10px;
        }
        .contentd .dieuhuong {
          font-size: 13px;
          width: 100%;
          height: 40px;
          background-color: #dddddd;
          list-style: 40px;
          padding-top: 8px;
          padding-left: 5%;
        }
        .contentd .noidung img{
          max-width: 700px;
        }
        
        .thongtinlienhe .noidung{
          width: 75%;
          margin-top: 2em;
        }
  </style>

</head>
<body>
     <div class="container-site">
     <?php require_once './wiew/layout_site/header.php'; ?>
            <section class="menu-back">
                <div class="content">
                        <a href=""><p>Trang chủ</p></a>
                        <span>/</span>
                        <a href=""><p>Bài viết</p></a>
                </div>
            </section>
          <?php 
                while ($row = mysqli_fetch_array($data["item"])) {
            ?>
          <div class="contentd">
                      <div class="leftcontent">
                    
                              <div class="bannerd">
                                <img
                                  src="wiew/public/upload/<?php echo $row['AnhBaiViet'] ?>"    
                                />
                              </div>
                          <br />
                          <div class="leftcontent_title"><?php echo $row['TieuDe'] ?></div>
                          <div class="little_title">
                            Người viết: <span><?php echo $row['HoTen'] ?></span>  Lúc <?php echo $row['NgayThem']?> &emsp;Tin tức
                          </div>
                          <div class="noidung">
                                <?php echo $row['NoiDung'] ?>
                          </div>
                          
                        <?php } ?>
                      </div>
                  
                    <div class="rightcontent">
                      <div class="rightcontent_item">
                          <div class="rightcontent_title">
                            <h2>BÀI VIẾT MỚI NHẤT</h2>
                            <hr />
                          </div>
                          <?php foreach($data['item2'] as $item2){
                              echo '
                            <div class="grid_item">
                                <a href=""><img src="wiew/public/upload/'.$item2['AnhDaiDien'].'" alt="Ảnh "></a>
                                <div class="grid_item_title">
                                  <a href="baiviet/'.$item2['id'].'">'.$item2['TieuDe'].'</a>
                                  <br>
                                  <span>'.$item2['NgayThem'].'</span>
                                </div>
                              </div>
                            ';
                            }
                          ?>
                      </div>
                      <div class="rightcontent_title">
                        <h2>DANH MỤC BLOG</h2>
                        <hr />
                      </div>
                      <ul class="listd">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm </a></li>
                        <li><a href="#">Nhóm sản phẩm đa cấp</a></li>
                        <li><a href="tintuc">Tin tức</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Liên hệ</a></li>
                      </ul>
                   </div>
            </div>
          <?php require_once './wiew/layout_site/footer.php'; ?>
     </div>
</body>
</html>