<?php include_once("./backend/islogin.php");
isadmin();

?>
<!DOCTYPE html>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="./src/css/timepicker.css" />
<link rel="stylesheet" href="./src/css/font.css" />
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นัดหมาย</title>
</head>

<body>
    <div id="list">
        <nav class="navbar navbar-light ">
            <a class="navbar-brand"><img src="./src/images/logo.png" width="60" height="60" alt="">นัดหมาย</a>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2" style="text-align: center;">นัดหมาย</h4>
                    </header>
                    <article class="card-body">
                        <form>
                            <div class="form-group">
                                <div id="dateinput"></div>
                                &nbsp;

                                <label class="form-label" for="date">รหัสผู้ใช้บริการ&nbsp;</label>
                                <input type="text" name="date" class="form-control" id="id" required>
                                <br>
                                <label class="form-label" for="date">วันที่&nbsp;</label>
                                <input type="date" name="date" class="form-control" id="date" required>
                                <label class="form-label" for="start-time">เวลา&nbsp;</label>
                                <input type="text" name="start-time" class="form-control bs-timepicker" id="time_start" value="10:00">
                                &nbsp;
                                <label class="form-label" for="end-time">ถึง&nbsp;</label>
                                <input type="text" name="end-time" class="form-control bs-timepicker" id="time_end" value="18:00">

                            </div>
                            <button type="submit" class="btn btn-primary">นัดหมาย</button>
                        </form>
                </div>
                <br>
                <br>
                <a id="link"></a>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/html2canvas/dist/html2canvas.js"></script>
<script src="./src/js/timepicker.js"></script>
<script src="./src/js/make_queue.js"></script>

</html>

</html>