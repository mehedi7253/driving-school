<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/17/2020
 * Time: 10:49 PM
 */

    include "../php/config.php";

    if (isset($_GET['package']))
    {
        $package_id = $_GET['package'];

        $del_pack = "DELETE FROM  package WHERE package_id = '$package_id'";
        $res_pack = mysqli_query($connect, $del_pack);

        $_SESSION['success'] = 'Package Delete successful';

        header('Location: manage_package.php');
    }

    if (isset($_GET['car']))
    {
        $car_id = $_GET['car'];

        $del_car = "DELETE FROM  car WHERE car_id = '$car_id'";
        $res_car = mysqli_query($connect, $del_car);

        $_SESSION['success'] = 'Package Delete successful';

        header('Location: manage_car.php');
    }


    if (isset($_GET['job_post']))
    {
        $job_post_id = $_GET['job_post'];

        $del_job_post = "DELETE FROM job_posts WHERE job_post_id = '$job_post_id'";
        $res_job_post = mysqli_query($connect, $del_job_post);

        $_SESSION['success'] = 'Job Post Delete successful';

        header('Location: manage_job.php');
    }


    if (isset($_GET['msg']))
    {
        $msg_id = $_GET['msg'];

        $del_msg = "DELETE FROM public_message WHERE id = '$msg_id'";
        $res_msg = mysqli_query($connect, $del_msg);

        $_SESSION['success'] = 'Message Delete successful';

        header('Location: message.php');
    }


    if (isset($_GET['schedule']))
    {
        $schedule_id = $_GET['schedule'];

        $del_scheule = "DELETE FROM schedule WHERE schedule_id = '$schedule_id'";
        $res_schedule = mysqli_query($connect, $del_scheule);

        $_SESSION['success'] = 'Schedule Delete successful';

        header('Location: manage_schedule.php');
    }
?>

