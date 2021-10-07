<?php
include_once("connection.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] == 'a') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time_start = mysqli_real_escape_string($conn, $_POST['time_start']);
    $time_end = mysqli_real_escape_string($conn, $_POST['time_end']);
    $sql = "SELECT * FROM tb_queue WHERE patient_id='$id' ORDER BY queue_date DESC LIMIT 1";
    $row = mysqli_query($conn, $sql);
    if (!$row) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    if(mysqli_num_rows($row)<=0){
        http_response_code(404);
        echo "{message : 'Not found'}";
        exit();
    }
    if (!$row) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    $queue = mysqli_fetch_assoc($row);
    $doctor_id = $queue['doctor_id'];
    if ($queue['queue_status'] == 'finish') {
        $sql = "INSERT INTO tb_queue (patient_id, doctor_id, queue_date, queue_time_start, queue_time_end, queue_create, queue_status, queue_update) VALUES ('$id','$doctor_id','$date','$time_start','$time_end',current_timestamp(),'on',current_timestamp())";
        $q=mysqli_query($conn, $sql);
        if(!$q){
            http_response_code(500);
            echo "{message : '". mysqli_error($conn)."'}";
            exit();
        }
    } else {
        http_response_code(500);
        echo "{message : 'queue not finish.'}";
        exit();
    }
} else {
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
?>