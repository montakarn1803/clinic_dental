<?php
    
    include_once ('connection.php');

   $username=mysqli_real_escape_string($conn,$_POST["username"]);
   $password=mysqli_real_escape_string($conn,$_POST["password"]);
   $sql="SELECT email,user_id, password FROM tb_auth WHERE email = '$username'";
   $q=mysqli_query($conn,$sql);
   if(!$q){
    http_response_code(500);
    echo "{message : '". mysqli_error($conn)."'}";
    exit();
}
   $numrow=mysqli_num_rows($q);
   if($numrow<=0){
     http_response_code(401);
     exit();
   }
   else{
       $hast="";
       $user_id="";
       while ($data=mysqli_fetch_assoc($q)){
          $hast=$data["password"];
          $user_id=$data["user_id"];
       }
       if(password_verify($password,$hast)){
           session_start();
           $_SESSION["username"]=$username;
           $_SESSION["user_id"]=$user_id;
           http_response_code(200);
           exit();
       }
       else{
           http_response_code(401);
           exit();
       }
   }
?>