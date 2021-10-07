<?php
    include_once  "connection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['user_id'])){
    mysqli_set_charset($conn,"utf8");
    $data=[];
    $id=$_SESSION['user_id'];
    $sql="SELECT queue_id, queue_date, queue_time_start, queue_time_end, queue_status FROM tb_queue WHERE patient_id='$id'";
    $q=mysqli_query($conn,$sql);
    $num_row=mysqli_num_rows($q);

    if($num_row<=0){
        http_response_code(404);
        echo "{message : 'Not found'}";
        exit();
    }
    
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
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
    
    
?>
