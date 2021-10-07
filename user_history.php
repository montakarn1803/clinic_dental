<?php include_once("./backend/islogin.php");
isadmin(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="./src/css/index.css" />
<link rel="stylesheet" href="./src/css/font.css" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติผู้รับบริการ</title>
</head>

<body class="bg-light">
    <?php
    include_once('nev.php');
    ?>
    <br>
    <div style="margin-left: 15%; margin-right:1rem; margin-top:8rem;">
        <i class="fas fa-search" style="font-size: 3em; margin-left:2rem;"></i>
        <h2 class="d-inline " style="margin-left:2rem;">ประวัติผู้รับบริการ</h2>
    </div>
    <div class="w-100 d-flex" style="margin-left:59%;">
        <form>
            <div class="form-row">
                <div class="col">
                    <input id="name" type="text" class="form-control" placeholder="ชื่อ" required>
                </div>
                <div class="col">
                    <input id="lastname" type="text" class="form-control" placeholder="นามสกุล" required>
                </div>
                <div class="col">
                    <input id="date" type="date" class="form-control" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">ค้นหา</button>
                </div>
            </div>
        </form>
    </div>
        <table class="table table-bordered" style="margin-top: 2rem; margin-left: 15rem; width: 80%;">
            <thead style="text-align: center;">
                <tr>
                    <th scope="row">ลำดับ</th>
                    <th scope="row">ชื่อผู้รับบริการ</th>
                    <th scope="row">รายการ</th>
                    <th scope="row">วันที่</th>
                </tr>
            </thead>
            <tbody id="content"></tbody>
        </table>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/user_history.js"></script>

</html>