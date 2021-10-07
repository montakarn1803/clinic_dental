<?php include_once ("./backend/islogin.php"); isadmin();
if(!isset($_GET['id'])){
    header("location:admin_manage_user.php" );
    exit(0);
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./src/css/register.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="./src/css/timepicker.css"/>
<link rel="stylesheet" href="./src/css/font.css" />
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลผู้ใช้บริการ</title>
</head>

<body>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">แก้ไขข้อมูลผู้ใช้บริการ</h4>
                </header>
                <article class="card-body">

                    <form>

                        <div class="form-row">
                            <div class="col form-group">
                                <label>รหัสผู้ใช้</label>
                                <input type="text" id="id" class="form-control" placeholder="" autocomplete="off" style="width : 30%;" required disabled>
                            </div> <!-- form-group end.// -->
                        </div>

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

            <div class="form-group">
                <label>เพศ*&nbsp;&nbsp;</label>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" id="M" type="radio" name="gender" value="M" checked>
                    <span class="form-check-label"> ชาย </span>
                </label>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" id="F" type="radio" name="gender" value="F">
                    <span class="form-check-label"> หญิง </span>
                </label>

            </div> <!-- form-group end.// -->

            <div class="form-row">
                        <div class="col form-group">
                            <label>วัน/เดือน/ปี เกิด*</label>
                            <input type="date" id="bd" class="form-control" placeholder=" " autocomplete="off" required>
                        </div> <!-- form-group end.// -->

            </div> <!-- form-row end.// -->

            <div class="form-group">
                <label>แพ้ยา*</label>
                <textarea  id="drug" class="form-control" placeholder="" autocomplete="off" required></textarea>
                <small class="form-text text-muted"></small>
            </div> <!-- form-group end.// -->

            <div class="form-group">
                <label>เบอร์โทรศัพท์*</label>
                <input type="tel" id="tel" class="form-control" placeholder="" autocomplete="off" required>
                <small class="form-text text-muted"></small>
            </div> <!-- form-group end.// -->

            <div class="form-group">
                <label>ที่อยู่*</label>
                <textarea  id="address" class="form-control" placeholder="" autocomplete="off" required></textarea>
                <small class="form-text text-muted"></small>
            </div> <!-- form-group end.// -->

                <br>
                <button type="submit" class="btn btn-primary btn-block"> แก้ไข </button>
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
<script src="./src/js/user_manage_edit.js"></script>

</html>