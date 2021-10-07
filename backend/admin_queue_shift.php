<?php
include_once "connection.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['user_id'])) {
    $patient_id = mysqli_real_escape_string($conn, $_POST["uid"]);
    $booking_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $queue_date = mysqli_real_escape_string($conn, $_POST["queue_date"]);
    $queue_time_start = mysqli_real_escape_string($conn, $_POST["queue_time_start"]);
    $queue_time_end = mysqli_real_escape_string($conn, $_POST["queue_time_end"]);
    $sql = "SELECT doctor_id FROM tb_queue WHERE queue_id = ".$booking_id;
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    $data=mysqli_fetch_assoc($q);
    $doctor_id = $data["doctor_id"];
    $sql = "UPDATE tb_queue SET queue_status='off',queue_update=CURRENT_DATE WHERE queue_id=".$booking_id;
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    $sql = "INSERT INTO tb_queue (patient_id,doctor_id, queue_date, queue_time_start, queue_time_end, queue_status) VALUES ('".$patient_id."','".$doctor_id."','".$queue_date."','".$queue_time_start."','".$queue_time_end."', 'on')";
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
}else{
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
