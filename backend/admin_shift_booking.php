<?php
include_once  "connection.php";
if(!isset($_SESSION)){
    session_start();
}
$data=[];
if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $sql = "SELECT queue_date,queue_time_start,queue_time_end FROM tb_queue WHERE queue_id=$id";
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    while ($row=mysqli_fetch_assoc($q)){
        array_push($data,$row);
    }
    echo json_encode($data);
}else{
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
