<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/17/2020
 * Time: 10:08 PM
 */

include "../php/config.php";

    if (isset($_POST['application_id'])){
        $id = $_POST['application_id'];

        $sql = "SELECT * FROM application_package WHERE application_id = $id";
        $res = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($res);

        echo json_encode($row);
    }


?>