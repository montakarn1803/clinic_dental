<?php
    include_once "connection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    mysqli_set_charset($conn,"utf8");
    $type = [];
    $sql = "SELECT * FROM tb_type";
    $q=mysqli_query($conn,$sql);
   
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
        exit();
    }
    while($row=mysqli_fetch_assoc($q)){
        array_push($type,$row);
    }
    $data = [];
    $name = mysqli_real_escape_string($conn,$_GET["name"]);
    $lastname = mysqli_real_escape_string($conn,$_GET["lastname"]);
    $date = mysqli_real_escape_string($conn,$_GET["date"]);
    
    $sql = "SELECT patient_id FROM tb_patient WHERE patient_firstname ='$name' AND patient_lastname ='$lastname'";
    $q=mysqli_query($conn,$sql);
   
    if(!$q){
        http_response_code(500);
        echo "{message : '". mysqli_error($conn)."'}";
        exit();
    }
    $row=mysqli_fetch_assoc($q);
    $id=$row["patient_id"];
    $sql = "SELECT *  FROM tb_history WHERE user_id = '$id' AND history_create = '$date' ORDER BY histoty_id DESC";
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
    $i=0;
    while($row=mysqli_fetch_assoc($q)){
        foreach($type as $t){
            if($t['type_id']==$row['type_id']){
               $data[$i]['namelist']=$t['type_name'];
            }
        }
       $data[$i]['date']=$date;
       $data[$i]['name']=$name." ".$lastname;
       $i++;
    }
    echo json_encode($data);
    }else{
        http_response_code(401);
        echo "{message : 'Not allowed.'}";
        exit();
    }
