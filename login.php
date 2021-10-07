<!DOCTYPE html>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css"/>
<link rel="stylesheet" href="./src/css/login.css"/>
<link rel="stylesheet" href="./src/css/font.css" />
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <nav class="navbar navbar-light ">
        <a class="navbar-brand"><img src="./src/images/logo.png" width="60" height="60"
                alt="">ระบบคลินิกทันตกรรม</a>
    </nav>

    <div class=" min-vw-100 container ">
        <div class="row">
          <div class="col-sm">
            <section class=" d-flex justify-content-center align-items-center">
                
                    <div class="form_login">
                        <h3 class="h3" style="text-align: center">เข้าสู่ระบบ</h3>
                        <br/>
                        <form method="POST" id="form" >
                            <div class="form-group">
                                <label for="username">ชื่อผู้ใช้</label>
                                <input type="email" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <br/>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
            </section>
          </div>
          <div class="col-sm">
            <img  class="bg" src="./src/images/bg.jpg" alt="">
          </div>
        </div>
      </div>
</body>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/popper.js/dist/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./src/js/login.js"></script>
</html>