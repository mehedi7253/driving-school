<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 6:41 PM
 */


    require_once '../php/config.php';

    if (isset($_GET['status'])){
        $status1 = $_GET['status'];

        $sql = "SELECT * FROM application_package WHERE application_id ='$status1'";

        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_object($result)){
            $status_var = $row->app_status;

            if ($status_var == '0'){
                $status_state = 1;
            }else{
                $status_state = 0;
            }
            $update = "UPDATE application_package SET app_status = '$status_state' WHERE application_id = '$status1'";

            $res = mysqli_query($connect, $update);

            if ($res){
                $_SESSION['success'] = 'Status Changed';
                header('Location: student_application.php');
            }else{
                echo  mysqli_error($res);
            }
        }
    }

?>
