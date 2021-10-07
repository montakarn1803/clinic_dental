<?php
include_once("connection.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['user_id'])&& $_SESSION['user_id'][0]=='a'){
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$tel = mysqli_real_escape_string($conn, $_POST["tel"]);
$license = mysqli_real_escape_string($conn, $_POST["license"]);
$id = mysqli_real_escape_string($conn, $_POST["id"]);

$sql = "UPDATE tb_doctor SET doctor_firstname='$name',doctor_lastname='$lastname',doctor_phone='$tel',doctor_license='$license',doctor_update=CURRENT_DATE WHERE doctor_id ='$id'";
$q = mysqli_query($conn,$sql);
if(!$q){
    http_response_code(500);
    echo "{message : '". mysqli_error($conn)."'}";
    exit();
}
   
}else{
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}

