<?php include_once("./backend/islogin.php");
isadmin(); ?>
<!DOCTYPE html>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./src/css/register.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="./src/css/timepicker.css" />
<link rel="stylesheet" href="./src/css/font.css" />
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลทันตแพทย์</title>
</head>

<body>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">เพิ่มข้อมูลทันตแพทย์</h4>
                </header>
                <style>
                    .avatar {
                        border-radius: 50%;
                        width: 200px;
                        height: 200px;
                        margin-bottom: 20px;
                        margin-left: 35%;
                    }
                </style>
                <article class="card-body">

                    <form>

                        <img src="./src/images/doctors/doctor.png" class="avatar" id="avatar" />
                        <div class="d-flex justify-content-center">
                            <input type="file" id="upload" accept="image/*" name="img" onchange="loadFile(event)" hidden />
                            <label for="upload" class="btn btn-dark">เลือกภาพ</label>
                        </div>

                        <br>
                        <div class="form-row">
                            <div class="col form-group">
                                <label>ชื่อ*</label>
                                <input type="text" id="name" class="form-control" placeholder=" " autocomplete="off" required>
                            </div> <!-- form-group end.// -->

                            <div class="col form-group">
                                <label>นามสกุล*</label>
                                <input type="text" id="lastname" class="form-control" placeholder=" " autocomplete="off" required>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->

                        <div class="form-row">

                        </div> <!-- form-row end.// -->

                        <div class="form-group">
                            <label>เบอร์โทรศัพท์*</label>
                            <input type="tel" id="tel" class="form-control" placeholder="" autocomplete="off" required>
                            <small class="form-text text-muted"></small>
                        </div> <!-- form-group end.// -->

                        <div class="form-group">
                            <label>เลขที่ใบอนุญาต*</label>
                            <input type="license" id="license" class="form-control" placeholder="" autocomplete="off" required></input>
                            <small class="form-text text-muted"></small>
                        </div> <!-- form-group end.// -->

                        <br>
                        <button type="submit" class="btn btn-primary btn-block"> เพิ่มข้อมูลทันตแพทย์ </button>
            </div> <!-- form-group// -->
            </form>
            </article> <!-- card-body end .// -->

        </div> <!-- card.// -->
    </div> <!-- col.//-->

    </div> <!-- row.//-->


    </div>
    <!--container end.//-->

</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/popper.js/dist/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/timepicker.js"></script>
<script src="./src/js/add_doctor.js"></script>


</html>