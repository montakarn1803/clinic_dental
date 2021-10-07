<?php include_once ("./backend/islogin.php"); isadmin();?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="./src/css/index.css" />
<link rel="stylesheet" href="./src/css/font.css" />

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Cache-Control" content="no-store" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการคิวรายวัน</title>
</head>

<body class="bg-light">
  <?php
  include_once ('nev.php');
  ?>
  <div style="margin-left: 15%; margin-top:5rem;">
    <br>
    <i class="fas fa-hospital-user" style="font-size: 4em; margin-left:2rem;"></i>
    <h2 class="d-inline " style="margin-left:2rem;">จัดการคิวรายวัน</h2>
  
    <h4 id="Q" style="margin-top: 2rem; text-align:end; margin-right: 2rem; color:red;">ว่าง XX คิว</h4>
    
    <table class="table table-bordered" style="margin-top: 2rem;">
      <thead style="text-align: center;">
        <tr>
          <th scope="col">ลำดับ</th>
          <th scope="col">เวลานัด</th>
          <th scope="col">ผู้รับบริการ</th>
          <th scope="col">ทันตแพทย์ผู้นัด</th>
          <th scope="col">สถานะ</th>
          <th scope="col">จัดการ</th>

        </tr>
      </thead>
      <tbody id="content"></tbody>
    </table>
  </div>
</body>
      <script src="./node_modules/jquery/dist/jquery.min.js"></script>
      <script src="./node_modules/popper.js/dist/popper.min.js"></script>
      <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
      <script src="./src/js/get_queue_today.js"></script>

</html>