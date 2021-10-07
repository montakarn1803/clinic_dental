<?php

use function PHPSTORM_META\type;

include_once "connection.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] == 'a') {
    mysqli_set_charset($conn, "utf8");
    $type = [];
    $type_name = [];
    $summary = [];
    $report = [];
    $price = [];
    $totol_price = 0;
    $sql = "SELECT type_id, type_name,type_price FROM tb_type ";
    $q = mysqli_query($conn, $sql);

    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($q)) {
        array_push($type, $row);
        $price[$i] = 0;
        $i++;
        array_push($type_name, $row["type_name"]);
    }
    $type = (array)$type;
    if ($_GET["con"] == "M") {
        $sql = "SELECT * FROM tb_history WHERE MONTH(history_create) = MONTH(CURRENT_DATE()) AND YEAR(history_create) = YEAR(CURRENT_DATE())";
    }
    if ($_GET["con"] == "Y") {
        $sql = "SELECT * FROM tb_history WHERE YEAR(history_create) = YEAR(CURRENT_DATE())";
    }
    $q = mysqli_query($conn, $sql);
    if (!$q) {
        http_response_code(500);
        echo "{message : '" . mysqli_error($conn) . "'}";
        exit();
    }
    while ($row = mysqli_fetch_assoc($q)) {
        array_push($summary, $row);
    }
    foreach ($summary as $value) {
        $value = (array)$value;
        $i = 0;
        foreach ($type as $t) {
            if ($t["type_id"] == $value["type_id"]) {
                break;
            }
            $i++;
        }
        $price[$i] += $type[$i]["type_price"];
    }
    foreach ($price as $p) {
        $totol_price += $p;
    }
    $data = [
        "type_name" => $type_name, 
        "price" => $price, 
        "totol_price" => $totol_price
    ];
    echo json_encode($data);
} else {
    http_response_code(401);
    echo "{message : 'Not allowed.'}";
    exit();
}
