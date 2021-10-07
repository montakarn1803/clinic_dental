<?php
include_once("connection.php");
date_default_timezone_set('Asia/Bangkok');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['user_id'])&& $_SESSION['user_id'][0]=='a'){
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$bd = mysqli_real_escape_string($conn, $_POST["birthday"]);
$drug = mysqli_real_escape_string($conn, $_POST["drug"]);
$tel = mysqli_real_escape_string($conn, $_POST["tel"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$id = mysqli_real_escape_string($conn, $_POST["id"]);
$age = explode('-',$bd);
$age = date("Y")-$age[0];

$sql = "UPDATE tb_patient SET patient_firstname='$name',patient_lastname='$lastname',patient_gender='$gender',patient_birthday='$bd',patient_age= $age ,patient_drug_allergy='$drug',patient_phone='$tel',patient_address='$address',patient_update=CURRENT_DATE WHERE patient_id ='$id'";
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

