<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 3:28 PM
 */

require_once '../php/config.php';

if (isset($_GET['status'])){
    $status1 = $_GET['status'];

    $sql = "SELECT * FROM car WHERE car_id ='$status1'";

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_object($result)){
        $status_var = $row->status;

        if ($status_var == '0'){
            $status_state = 1;
        }else{
            $status_state = 0;
        }
        $update = "UPDATE car SET status = '$status_state' WHERE car_id = '$status1'";

        $res = mysqli_query($connect, $update);

        if ($res){
            $_SESSION['success'] = 'Status Changed';
            header('Location: manage_car.php');
        }else{
            echo  mysqli_error($res);
        }
    }
}

?>
