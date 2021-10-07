<?php include_once ("./backend/islogin.php"); isadmin();?>
<!DOCTYPE html>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="./src/css/doctor_history.css" />
<link rel="stylesheet" href="./src/css/font.css" />

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขประวัติทันตแพทย์</title>
</head>

<body class="bg-light">
<?php
  include_once ('nev.php');
  ?>
        
        <br>
        <div style="margin-left: 15%; margin-top:5rem;">
            <img src="./src/images/doctors/doctor.png" width="100" height="100" alt="">
            <h2 class="d-inline" style="position:relative; top:20px;" >แก้ไขประวัติทันตแพทย์</h2>
        </div> 

        <div style="text-align: end; margin-right: 3rem; margin-bottom: -1rem;">
            <a class="btn btn-primary text-white" href="add_doctor.php">เพิ่มทันตแพทย์</a>
        </div>

        <div style="max-width: 84%; margin-left:15%;"> 
        <table class="table table-bordered" style="margin-top: 2rem;">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">เบอร์ติดต่อ</th>
                    <th scope="col">เลขที่ใบอนุญาต</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody id="content"></tbody>
        </table>
        </div>
    </nav>
</body>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/popper.js/dist/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./src/js/admin_manage_doctor.js"></script>
</html>