<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/17/2020
 * Time: 10:08 PM
 */

    include "../php/config.php";

    if (isset($_POST['package_id'])){
        $id = $_POST['package_id'];

        $sql = "SELECT * FROM package WHERE package_id = $id";
        $res = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($res);

        echo json_encode($row);
    }


    if (isset($_POST['job_post_id'])){
        $job_id = $_POST['job_post_id'];

        $sql_job = "SELECT * FROM job_posts WHERE job_post_id = $job_id";
        $res_job = mysqli_query($connect, $sql_job);

        $row = mysqli_fetch_assoc($res_job);

        echo json_encode($row);
    }

?>