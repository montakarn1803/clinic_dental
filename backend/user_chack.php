<?php
    include_once "connection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['user_id'])){
    mysqli_set_charset($conn,"utf8");
    $data=[];
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM tb_patient WHERE patient_id ='$id'";
    $q=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($q);
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
        exit();
    }
    if(!$row['patient_age']){
        http_response_code(401);
        session_destroy();
        echo "{message : 'Not allowed.'}";
        exit();
    }
}
    else{
        http_response_code(401);
        echo "{message : 'Not allowed.'}";
        exit();
    }
    
    
?>
