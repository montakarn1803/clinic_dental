<?php include_once("./backend/islogin.php");
isadmin(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./src/css/index.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.css" />
<link rel="stylesheet" href="./src/css/font.css" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลการจองของผู้ใช้</title>
</head>

<body class="bg-light">
    <?php
    include_once('nev.php');
    ?>
    <div style="margin-left: 15%; margin-right:1rem; margin-top:8rem;">
        <i class="far fa-address-book" style="font-size: 4em; margin-left:2rem;"></i>
        <h2 class="d-inline " style="margin-left:2rem;">ผู้รับบริการ</h2>

        <form class="form-inline justify-content-end">
            <input id="keyword" class="form-control mr-sm-2" type="search" placeholder="ค้นหา" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
        </form>

        <table class="table table-bordered" style="margin-top: 2rem;">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รหัสผู้ใช้</th>
                    <th scope="col">ชื่อ - นามสกุล</th>
                    <th scope="col">เพศ</th>
                    <th scope="col">วัน/เดือน/ปีเกิด</th>
                    <th scope="col">อายุ</th>
                    <th scope="col">แพ้ยา</th>
                    <th scope="col">เบอร์โทรศัพท์</th>
                    <th scope="col">ที่อยู่</th>
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
<script src="./node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="./src/js/admin_manage_user.js"></script>

</html>