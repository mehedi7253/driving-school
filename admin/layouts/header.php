<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 7:22 PM
 */
    require_once '../php/config.php';
    if (!isset($_SESSION['admin'])){

        header('Location: ../login.php');
    }
    $sql = "SELECT * FROM users WHERE email = '$_SESSION[admin]'";
    $res = mysqli_query($connect, $sql);

    $userdata = mysqli_fetch_assoc($res);
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="../images/admin.jpg">

    <link rel="stylesheet" href="front/assets/css/normalize.css">
    <link rel="stylesheet" href="front/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="front/assets/css/themify-icons.css">
    <link rel="stylesheet" href="front/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="front/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="front/assets/scss/style.css">
    <link href="front/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="front/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
</head>