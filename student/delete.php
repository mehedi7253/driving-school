<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 11:52 AM
 */

    include "../php/config.php";


    if (isset($_GET['withdraw']))
    {
        $application_id = $_GET['withdraw'];

        $del_appli = "DELETE FROM  application_package WHERE application_id = '$application_id'";
        $res_appli = mysqli_query($connect, $del_appli);

        $_SESSION['success'] = 'Application Withdraw  successful';

        header('Location: manage_application.php');
    }
?>