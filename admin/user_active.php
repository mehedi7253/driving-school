<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/28/2020
 * Time: 2:58 PM
 */
    require_once '../php/config.php';

    if (isset($_GET['status'])){
        $status1 = $_GET['status'];

        $sql = "SELECT * FROM users WHERE id ='$status1'";

        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_object($result)){
            $status_var = $row->status;

            if ($status_var == '0'){
                $status_state = 1;
            }else{
                $status_state = 0;
            }
            $update = "UPDATE users SET status = '$status_state' WHERE id = '$status1'";

            $res = mysqli_query($connect, $update);

            if ($res){
                $_SESSION['success'] = 'Status Changed';
                header('Location: manage_student.php');
            }else{
                echo  mysqli_error($res);
            }
        }
    }
?>