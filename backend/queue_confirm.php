<?php
   include_once ('connection.php');
   if(!isset($_SESSION)){
      session_start();
  }
   if(isset($_SESSION['user_id'])&&$_SESSION['user_id'][0]=='a'){
    $id=mysqli_real_escape_string($conn,$_POST["id"]);
    $choice=mysqli_real_escape_string($conn,$_POST["choice"]);
    $sql="UPDATE tb_queue SET queue_status = '".$choice."'  WHERE queue_id='".$id."'";
    $q=mysqli_query($conn,$sql);
   }
   else{
      http_response_code(401);
      echo "{message : 'Not allowed.'}";
      exit();
  }
   
?>