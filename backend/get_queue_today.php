<?php
    include_once "connection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    mysqli_set_charset($conn,"utf8");
    $data=[];
    $today = date('Y-m-d');
    $sql = "SELECT * FROM tb_queue WHERE queue_date='$today' ";
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
        $id = $row['patient_id'];
        $sql = 'SELECT  patient_firstname, patient_lastname FROM tb_patient WHERE patient_id ="'.$id.'"';
        $qname = mysqli_query($conn,$sql);
        $fname=mysqli_fetch_assoc($qname);
        $row['patient_name']= $fname['patient_firstname']." ".$fname['patient_lastname'];
       
        $id = $row['doctor_id'];
        $sql = 'SELECT  doctor_firstname, doctor_lastname FROM tb_doctor WHERE doctor_id ="'.$id.'"';
        $qname = mysqli_query($conn,$sql);
        $fname=mysqli_fetch_assoc($qname);
        $row['doctor_name']= $fname['doctor_firstname']." ".$fname['doctor_lastname'];
        array_push($data,$row);
    }
    
    echo json_encode($data);
    }else{
        http_response_code(401);
        echo "{message : 'Not allowed.'}";
        exit();
    }
    
    
?>
