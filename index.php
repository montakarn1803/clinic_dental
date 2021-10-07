<?php include_once ("./backend/islogin.php"); isnoadmin();?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./src/css/index.css" />
<link rel="stylesheet" href="./src/css/font.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบคลินิกทันตกรรม</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand"><img src="./src/images/logo.png" width="60" height="60"
            alt="">คลินิกทันตกรรม</a>
      
        <div class="collapse navbar-collapse bg-light" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
          <form class="form-inline">
            <a href="#">ข้อมูลผู้ใช้บริการ</a>
            <a href="#">สำรองคิว</a>
            <a href="#">เลื่อนนัด</a>
            <a href="doctor_history.php">ประวัติทันตแพทย์</a>
            <a href="logout.php">ออกจากระบบ</a>
          </form>
        </div>
      </nav>
      <img src="./src/images/bg.jpg" width="100%" width="100%"></img>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/index.js"></script>
</html>