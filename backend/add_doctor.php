<?php
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

include_once("connection.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] == 'a') {
    $dir = '../src/images/doctors/';
    $ex=explode(".",basename($_FILES["img"]["name"]))[1];
    $imagename = generateRandomString().".".$ex;
    $filename = $dir . $imagename;
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $filename)) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $tel = mysqli_real_escape_string($conn, $_POST["tel"]);
        $license = mysqli_real_escape_string($conn, $_POST["license"]);
        $img=mysqli_real_escape_string($conn,$imagename);
        $sql = "SELECT doctor_id FROM tb_doctor";
        $q = mysqli_query($conn, $sql);
        if (!$q) {
            http_response_code(500);
            echo "{message : '" . mysqli_error($conn) . "'}";
            exit();
        }
        $numrow = mysqli_num_rows($q);
        if ($numrow <= 9) {
            $id = "d0" . $numrow;
        } else {
            $id = "d" . $numrow;
        }
        $sql = "INSERT INTO tb_doctor (doctor_id, doctor_firstname, doctor_lastname, doctor_phone, 	doctor_license, doctor_img, doctor_create, doctor_update) VALUES ('$id','$name','$lastname','$tel','$license','$img',CURRENT_DATE,CURRENT_DATE)";
        $q = mysqli_query($conn, $sql);
        if (!$q) {
            http_response_code(500);
            echo "{message : '" . mysqli_error($conn) . "'}";
            exit();
        }
    } else {
        http_response_code(500);
        echo "{message : 'upload error.'}";
        exit();
    }
} else {
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
