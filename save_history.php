<?php include_once("./backend/islogin.php");
isadmin();
if (!isset($_GET['id'])) {
    header("location:./admin_queue_today.php");
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="./src/css/save_history.css" />
<link rel="stylesheet" href="./src/css/font.css" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกประวัติของผู้ใช้</title>
</head>

<body class="bg-light">
    <?php
    include_once('nev.php');
    ?>
    <div style="margin-left: 15%; margin-top:6rem;">
    <i class="fas fa-save" style="font-size: 4em; margin-left:2rem;"></i>
        <h2 class="d-inline " style="margin-left:2rem;">บันทึกประวัติของผู้ใช้</h2>

        <div style="text-align: end; margin-left: 80%; margin-right: 2rem; margin-top:-0.9rem;">
            <a class="btn btn-success text-white" onclick="addrow()">เพิ่มรายการ</a>
        </div>
        <br>
        <div id="list">
            <h2 style="text-align: center;">คลินิกทันตกรรม</h2><br>
            <div class="form-inline d-flex justify-content-center"> 
            <h4 id="first_name">ชื่อ --</h4> 
            &nbsp;&nbsp;&nbsp;
            <h4 id="last_name">นามสกุล --</h4>
            
        </div>
        <br>
        <table  class="table table-bordered">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รหัสรายการ</th>
                    <th scope="col">รายการ</th>
                    <th scope="col">ราคา</th>
                </tr>
            </thead>
            <tbody id="content"></tbody>
        </table>
        <b><p id="price" style="text-align: end; margin-right:2em;"></p></b>
        <br>
        <div style="text-align: end; margin-right:3rem;">
            <h6>..........................</h6>
            <h6 style="margin-right: 2rem;">ผู้รับเงิน</h6>
        </div> 
        <br>
        </div>
        
        <a  class="btn btn-danger btn-block" style="width: 15%; margin-left: 45%;" onclick="location.reload()"> ล้างรายการ </a>
        <a  class="btn btn-primary btn-block" style="width: 15%; margin-left: 45%;" onclick="add_history()"> บันทึก </a>
    </div>
    <br>
    <a id="link"></a>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/html2canvas/dist/html2canvas.js"></script>
<script src="./src/js/save_history.js"></script>


</html>