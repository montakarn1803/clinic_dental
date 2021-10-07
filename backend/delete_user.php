<?php
include_once "connection.php";
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    $id = mysqli_real_escape_string($conn,$_GET["id"]);
    $sql = "DELETE FROM tb_patient WHERE patient_id = '".$id."'" ;
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    $sql = "DELETE FROM tb_auth WHERE user_id = '".$id."'" ;
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    
}else{
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
