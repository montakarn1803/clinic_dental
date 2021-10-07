<?php
include_once("connection.php");
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = password_hash(mysqli_real_escape_string($conn, $_POST["password"]), PASSWORD_BCRYPT);

$sql = "SELECT patient_id FROM tb_patient";
$q = mysqli_query($conn, $sql);
if (!$q) {
    http_response_code(500);
    echo "{message : '" . mysqli_error($conn) . "'}";
    exit();
}

$pre = 0;
while (1 == 1) {
    if ($pre <= 9) {
        $id = "p0" . $pre;
    } else {
        $id = "p" . $pre;
    }
    $sql =  "SELECT * FROM tb_patient WHERE patient_id='$id'";
    $o = mysqli_query($conn, $sql);
    if (mysqli_num_rows($o) <= 0) {
        break;
    }else{
        $pre++;
    }
}

$sql = "INSERT INTO tb_patient (patient_id, patient_firstname, patient_lastname, patient_gender, role_id) VALUES ('$id','$name','$lastname','$gender',0)";
$q = mysqli_query($conn, $sql);
if (!$q) {
    http_response_code(500);
    echo "{message : '" . mysqli_error($conn) . "'}";
    exit();
}
$sql = "INSERT INTO tb_auth (user_id, email, password) VALUES ('$id','$email','$password')";
$q = mysqli_query($conn, $sql);
if (!$q) {
    http_response_code(500);
    echo "{message : '" . mysqli_error($conn) . "'}";
    exit();
}
