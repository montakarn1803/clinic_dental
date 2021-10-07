<?php

include_once("connection.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] == 'a') {
        $type_id = mysqli_real_escape_string($conn, $_POST["type_id"]);
        $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
        
        $sql = "INSERT INTO tb_history (type_id, user_id, history_create) VALUES ('$type_id','$user_id',CURRENT_DATE())";
        $q = mysqli_query($conn, $sql);
        if (!$q) {
            http_response_code(500);
            echo "{message : '" . mysqli_error($conn) . "'}";
            exit();
        }
    } 
else {
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
