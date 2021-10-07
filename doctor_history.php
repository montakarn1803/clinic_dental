<?php include_once("./backend/islogin.php");
islogin(); ?>
<!DOCTYPE html>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="./src/css/doctor_history.css" />
<link rel="stylesheet" href="./src/css/font.css" />


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติทันตแพทย์</title>
</head>

<body class="bg-light">
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] == 'a') {
        include_once('nev.php');
        $top = -0.5;
        $left = 17;
    } else if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] != 'a') {
        $top = -2;
        $left = 3;
    }
    ?>
    <nav class="navbar navbar-light ">
        <a class="navbar-brand"><img src="./src/images/logo.png" width="60" height="60" alt="">ระบบคลินิกทันตกรรม</a>
    </nav>

    <br>
    <div style=<?php echo"margin-left:".$left."rem;"."margin-top:".$top."rem;";?>>
        <img src="./src/images/doctors/doctor.png" width="100" height="100" alt="">
        <h2 class="d-inline" style="position:relative; top:20px;">ประวัติทันตแพทย์</h2>
    </div>
    <table class="table table-bordered" style="margin-top: 2rem;">
        <thead style="text-align: center;">
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">รูปภาพ</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">เบอร์ติดต่อ</th>
                <th scope="col">เลขที่ใบอนุญาต</th>
            </tr>
        </thead>
        <tbody id="content"></tbody>
    </table>
    </nav>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/doctor_history.js"></script>

</html>