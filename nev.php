<?php include_once ("./backend/islogin.php"); islogin();?>
<?php
echo'
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="./src/css/nev.css" />

<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <a class="navbar-brand"><img src="./src/images/logo.png" width="60" height="60" alt="">คลินิกทันตกรรม</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav mr-auto flex-column vertical-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">หน้าแรก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">การนัดหมาย</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ใบเสร็จค่าใช้จ่าย</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">รายงานการรักษา</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">ออกจากระบบ</a>
            </li>
        </ul>

    </div>
</nav>';
