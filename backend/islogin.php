<?php
if(!isset($_SESSION)){
    session_start();
}
function islogin(){
    if(!isset($_SESSION["user_id"])){
        header("location:./login.php" );
        exit(0);
    }

}

function isadmin(){
    if(isset($_SESSION["user_id"])&&$_SESSION["user_id"][0]!='a'){
        header("location:./index.php" );
        exit(0);
    }else if(!$_SESSION["user_id"]){
        header("location:./login.php" );
        exit(0);
    }

}

function isnoadmin(){
    if(isset($_SESSION["user_id"])&&$_SESSION["user_id"][0]=='a'){
        header("location:./admin_queue_today.php" );
        exit(0);
    }else if(!$_SESSION["user_id"]){
        header("location:./login.php" );
        exit(0);
    }
}
?>