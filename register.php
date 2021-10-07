<!DOCTYPE html>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./src/css/register.css" />
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<link rel="stylesheet" href="./src/css/font.css" />
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
</head>

<body>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">สมัครสมาชิก</h4>
                </header>
                <article class="card-body">

                    <form>

                        <div class="form-row">
                            <div class="col form-group">
                                <label>ชื่อ*</label>
                                <input type="text" id="name" class="form-control" placeholder="" autocomplete="off" required>
                            </div> <!-- form-group end.// -->

                            <div class="col form-group">
                                <label>นามสกุล*</label>
                                <input type="text" id="lastname" class="form-control" placeholder=" " autocomplete="off" required>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->

                        <div class="form-group">
                        <label>เพศ*&nbsp;&nbsp;</label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="M" checked>
                                <span class="form-check-label"> ชาย </span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="F">
                                <span class="form-check-label"> หญิง </span>
                            </label>

                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>อีเมล*</label>
                            <input type="email" id="email" class="form-control" placeholder="" autocomplete="off" required>
                            <small class="form-text text-muted"></small>
                        </div> <!-- form-group end.// -->

                        <div class="form-group">
                            <label>รหัสผ่าน*</label>
                            <input class="form-control" id="password" type="password" autocomplete="off" required>
                        </div> <!-- form-group end.// -->

                        <div class="form-group">
                            <label>ยืนยันรหัสผ่าน*</label>
                            <input class="form-control" id="confirmpassword" type="password" autocomplete="off" required>
                        </div> <!-- form-group end.// -->

                        <span id="passwordnotmatch">รหัสผ่านไม่ตรงกัน</span>
                        <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block"> สมัครสมาชิก </button>
                        </div> <!-- form-group// -->
                    </form>
                </article> <!-- card-body end .// -->
                <div class="border-top card-body text-center">หรือคุณมีบัญชีอยู่แล้ว ? <a href="">Log In</a></div>
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
<script src="./src/js/register.js"></script>

</html>