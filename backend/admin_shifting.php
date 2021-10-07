<?php
include_once("connection.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] == 'a') {
    $id = mysqli_real_escape_string($conn, $_POST['ID']);
    $qid = mysqli_real_escape_string($conn, $_POST['QID']);
    $s = mysqli_real_escape_string($conn, $_POST['S']);
    $sql = "SELECT * FROM tb_queue WHERE patient_id='$id' ORDER BY queue_date DESC LIMIT 2";
        
    $row = mysqli_query($conn, $sql);
    if (!$row) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    if (mysqli_num_rows($row) <= 0) {
        http_response_code(404);
        echo "{message : 'Not found'}";
        exit();
    }
    if (!$row) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    if ($s == "shift") {
        while ($queue = mysqli_fetch_assoc($row)) {
            if ($queue['queue_status'] == 'shift') {
                $sql = "UPDATE tb_queue SET queue_status ='on' WHERE queue_id=$qid AND patient_id='$id'";
                $r = mysqli_query($conn, $sql);
                if (!$r) {
                    http_response_code(500);
                    echo "{message : '" . mysqli_error($conn) . "'}";
                    exit();
                }
            }else if($queue['queue_status'] == 'pedding'){
                $d = $queue['queue_id'];
                $sql = "UPDATE tb_queue SET queue_status ='off' WHERE queue_id=$d AND patient_id='$id'";
                $r = mysqli_query($conn, $sql);
                if (!$r) {
                    http_response_code(500);
                    echo "{message : '" . mysqli_error($conn) . "'}";
                    exit();
                }
            }
        }
    } else if($s == "cancel"){
        while ($queue = mysqli_fetch_assoc($row)) {
            if ($queue['queue_status'] == 'shift') {
                $sql = "UPDATE tb_queue SET queue_status ='off' WHERE queue_id=$qid AND patient_id='$id'";
                $r = mysqli_query($conn, $sql);
                if (!$r) {
                    http_response_code(500);
                    echo "{message : '" . mysqli_error($conn) . "'}";
                    exit();
                }
            }else if($queue['queue_status'] == 'pedding'){
                $d = $queue['queue_id'];
                $sql = "UPDATE tb_queue SET queue_status ='on' WHERE queue_id=$d AND patient_id='$id'";
                $r = mysqli_query($conn, $sql);
                if (!$r) {
                    http_response_code(500);
                    echo "{message : '" . mysqli_error($conn) . "'}";
                    exit();
                }
            }
        }
    }
} else {
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
