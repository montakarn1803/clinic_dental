<?php include_once ("./backend/islogin.php"); isnoadmin();?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./src/css/index.css" />
    <link rel="stylesheet" href="./src/css/font.css" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลการจองของผู้ใช้</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-light ">
        <a class="navbar-brand"><img src="./src/images/logo.png" width="60" height="60"
                alt="">ระบบคลินิกทันตกรรม</a>
    </nav>
    <br>
    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="margin-left:3rem;">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
    <h2 class="d-inline " style="margin-left:2rem;">ตารางนัดหมาย</h2>
   

    <table class="table table-bordered" style="margin-top: 2rem;">
        <thead style="text-align: center;">
          <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">รหัสการนัดหมาย</th>
            <th scope="col">วันที่</th>
            <th scope="col">เวลา</th>
            <th scope="col">สถานะ</th>
            <th scope="col">เลื่อนนัดหมาย</th>
          </tr>
        </thead>
        <tbody id="content"></tbody>
      </table>
</body>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/popper.js/dist/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./src/js/booking_tb.js"></script>
</html>