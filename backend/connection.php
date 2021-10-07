<?php
    $conn = mysqli_connect("localhost","root","","clinic");
    if (mysqli_errno($conn)){
        echo "error!";
    }
?>