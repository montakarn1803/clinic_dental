<?php
include_once "connection.php";
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    $status=mysqli_real_escape_string($conn,$_GET["status"]);
    $id = mysqli_real_escape_string($conn,$_GET["id"]);
    $sql = "UPDATE tb_queue SET queue_status ='$status',queue_update = CURRENT_DATE WHERE queue_id = $id" ;
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
