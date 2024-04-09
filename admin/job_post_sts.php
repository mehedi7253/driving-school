<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 1:06 PM
 */


    require_once '../php/config.php';

    if (isset($_GET['status'])){
        $status1 = $_GET['status'];

        $sql = "SELECT * FROM job_posts WHERE job_post_id ='$status1'";

        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_object($result)){
            $status_var = $row->status;

            if ($status_var == '0'){
                $status_state = 1;
            }else{
                $status_state = 0;
            }
            $update = "UPDATE job_posts SET status = '$status_state' WHERE job_post_id = '$status1'";

            $res = mysqli_query($connect, $update);

            if ($res){
                $_SESSION['success'] = 'Status Changed';
                header('Location: manage_job.php');
            }else{
                echo  mysqli_error($res);
            }
        }
    }

?>
