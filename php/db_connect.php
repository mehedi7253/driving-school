<?php


    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "driving_school";

    // crearte connection
    $connect = new Mysqli($servername, $username, $password, $dbname);

    // check connection
    if($connect->connect_error) {
        die("Connection Failed : " . $connect->error);
    } else {
        // echo "Successfully Connected";
    }


?>