<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 3:28 PM
 */

    require_once '../php/config.php';

    if (isset($_GET['status'])){
        $status1 = $_GET['status'];

        $sql = "SELECT * FROM apply_job WHERE apply_job_id ='$status1'";

        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_object($result)){
            $status_var = $row->status;

            if ($status_var == '0'){
                $status_state = 1;
            }else{
                $status_state = 0;
            }
            $update = "UPDATE apply_job SET status = '$status_state' WHERE apply_job_id = '$status1'";

            $res = mysqli_query($connect, $update);

            if ($res){
                $_SESSION['success'] = 'Apllication Selected..!!';
                header('Location: manage_application.php');
            }else{
                echo  mysqli_error($res);
            }
        }
    }

?>
