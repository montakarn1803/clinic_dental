<?php include_once("./backend/islogin.php");
isadmin(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
    <?php
    include_once('nev.php');
    ?>
    <div style="margin-left: 15%; margin-top:5rem;">
        <br>
        <i class="fas fa-wallet" style="font-size: 4em; margin-left:2rem;"></i>
        <h2 class="d-inline " style="margin-left:2rem;">สรุปค่าใช้จ่าย</h2>

        <div style="text-align: end; font-family: 'Prompt', sans-serif; margin-right: 2rem;">
        <select id="con">
            <option value="M">เดือน</option>
            <option value="Y">ปี</option>
        </select>
        </div>

        <table class="table table-bordered" style="margin-top: 2rem;">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รายการ</th>
                    <th scope="col">ราคา</th>

                </tr>
            </thead>
            <tbody id="content"></tbody>
        </table>
        <br>
        <b>
            <p id="price" style="text-align: end; margin-right:2em;"></p>
        </b>
    </div>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/summary.js"></script>

</html>