<?php
    include_once "connection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    mysqli_set_charset($conn,"utf8");
    $data=[];
    $sql = "SELECT * FROM tb_type";
    $q=mysqli_query($conn,$sql);
   
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
        exit();
    }
    while($row=mysqli_fetch_assoc($q)){
        array_push($data,$row);
    }
    echo json_encode($data);
    }else{
        http_response_code(401);
        echo "{message : 'Not allowed.'}";
        exit();
    }
    
    
?>
