<?php include_once("./backend/islogin.php");
isadmin();
if (!isset($_GET['id'])) {
    header("location:./admin_queue_today.php");
    exit(0); 
}
?>
<!DOCTYPE html>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css"/>
    <link rel="stylesheet" href="./src/css/timepicker.css"/>
    <link rel="stylesheet" href="./src/css/font.css" />
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลื่อนการนัดหมาย</title>
</head>
<body>
    <nav class="navbar navbar-light ">
        <a class="navbar-brand"><img src="./src/images/logo.png" width="60" height="60"
                alt="">ระบบคลินิกทันตกรรม</a>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
        <header class="card-header">
            <h4 class="card-title mt-2" style="text-align: center;">เลื่อนนัดหมาย</h4>
        </header>
        <article class="card-body">
    <form>
        <div class="form-group">
            <div id="dateinput"></div>
            &nbsp;
            <label class="form-label" for="start-time">เวลา&nbsp;</label>
            <input type="text" name="start-time" class="form-control bs-timepicker" id="start">
            &nbsp;
            <label class="form-label" for="end-time">ถึง&nbsp;</label>
            <input type="text" name="end-time" class="form-control bs-timepicker" id="end">
        </div>
        <button type="submit" class="btn btn-primary">นัดหมาย</button>
    </form>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/timepicker.js"></script>
<script src="./src/js/admin_shift_booking.js"></script>
</html>
</html>