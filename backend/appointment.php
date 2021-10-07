<?php
    include_once "connection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    mysqli_set_charset($conn,"utf8");
    $data=[];
    $doctor = [];
    $sql = "SELECT * FROM tb_doctor";
    $q=mysqli_query($conn,$sql);
   
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
        exit();
    }
    while($row=mysqli_fetch_assoc($q)){
        array_push($doctor,$row);
    }

    $name = mysqli_real_escape_string($conn,$_GET["name"]);
    $lastname = mysqli_real_escape_string($conn,$_GET["lastname"]);
    $sql = "SELECT patient_id FROM tb_patient WHERE patient_firstname ='$name' AND patient_lastname ='$lastname'";
    $q=mysqli_query($conn,$sql);
   
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
        exit();
    }
    $row=mysqli_fetch_assoc($q);
    $id=$row["patient_id"]; 
    $sql = "SELECT *  FROM tb_queue WHERE patient_id = '$id'";
    $q=mysqli_query($conn,$sql);
   
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
        exit();
    }
    if(mysqli_num_rows($q)<=0){
        http_response_code(404);
        echo "{message : 'Not Found.'}";
        exit();
    }

    while($row=mysqli_fetch_assoc($q)){
        foreach($doctor as $d){
            if($d['doctor_id']==$row['doctor_id']){
               $row['doctor_name']=$d['doctor_firstname']." ".$d['doctor_lastname'];
            }
        }
       array_push($data,$row);
    }
    echo json_encode($data);
    }else{
        http_response_code(401);
        echo "{message : 'Not allowed.'}";
        exit();
    }
    
    
?>
