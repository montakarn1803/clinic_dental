<?php
include_once "connection.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] == 'a') {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "SELECT doctor_img FROM tb_doctor WHERE doctor_id ='$id'";
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    $path = "../src/images/doctors/";
    $data = mysqli_fetch_assoc($q);
    $path .= basename($data["doctor_img"]);
    if (!unlink($path)) {
        http_response_code(500);
        echo "{message : 'delete image error'}";
        exit();
    } else {
        $sql = "DELETE FROM tb_doctor WHERE doctor_id ='$id'";
        $q = mysqli_query($conn, $sql);
        if (!$q) {
            http_response_code(500);
            echo "{message : '" . mysqli_error($conn) . "'}";
            exit();
        }
    }
} else {
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
