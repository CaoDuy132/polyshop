    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="/wiew/public/css/adminLogin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid" style="margin: 0; padding: 0;">
         <div class="login">
                <div class="left">
                     <div class="logo">
                        <img src="/wiew/public/upload/admin.jpg" alt="">
                     </div>
                </div>
               <div class="right">
                    <h1>ĐĂNG NHẬP ADMIN</h1>
                    <form action="/admin" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"></label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email." autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="matkhau" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu" autocomplete="off">
                            </div>
                            <button type="submit" id="submit" name="submit_login" class="btn btn-primary">ĐĂNG NHẬP</button>
                    </form>
               </div>
         </div>
         
    </div>
</body>
</html>