<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 12:10 PM
 */

include "php/config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car & Scooty Driving School</title>
    <link rel="icon" href="images/logo.JPG">
    <link rel="stylesheet" href="assets/style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<style>
    #main_nav ul li{
        text-align: center;
    }
    #main_nav ul li a{
        font-size: 15px;
        color: #fff;
        font-weight: 500;
        padding: 25px;
        text-transform: uppercase;
    }
    #main_nav ul li a.active{
        color: green;

    }
    #main_nav ul li a:hover{
        color: #1BBD36;
        transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
    }
    .slider{
        background-image: url("images/slide_1.jpg");
        height: 550px;
        width: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
    .slide_section{
        height: 550px;
        opacity: 1;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.5);
        overflow: hidden;
    }
    .facebook:hover{
        color: #0f6674;
    }
    .facebook{
        color: #097DEB;
    }
    .google{
        color: yellow;
    }
    .google:hover{
        color: #0f6674;
    }
    .linkdin{
        color: rgba(44,132,208,0.6);
    }
    .linkdin:hover{
        color: #0f6674;
    }
    .youtube{
        color: #FF0404;
    }
    .youtube:hover{
        color: #0f6674;
    }
</style>
<body>
<section class="top_header" style="background-color: silver">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="col-md-7 col-sm-12 float-left mt-2 mb-2">
                    <a href="news.php" class="btn btn-primary">News Feed </a>
                    <!--                        <a href="" class="btn btn-primary">JOb </a> | <a href="" class="btn btn-info">Student</a> | <a href="" class="btn btn-secondary">Trainer</a>-->
                </div>
                <div class="col-md-5 col-sm-12 float-left">
                    <li class="nav-link float-right">
                        <a href=""><i class="fab fa-facebook-f ml-3 facebook"></i></a>
                        <a href=""><i class="fab fa-google-plus-g  ml-3 google"></i></a>
                        <a href=""><i class="fab fa-linkedin-in  ml-3 linkdin"></i></a>
                        <a href=""><i class="fab fa-youtube ml-3 youtube"></i></a>
                        <a href=""><i class="fab fa-twitter ml-3"></i></a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark m-0 p-0">
    <div class="container">
        <a class="navbar-brand" href=""><img src="images/logo.JPG" style="height: 50px; width: 150px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="" class="nav-link"> packages</a></li>
                <li class="nav-item"><a href="" class="nav-link"> Trainer</a></li>
                <li class="nav-item"><a href="" class="nav-link">Contact US</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
            </ul>
        </div> <!-- navbar-collapse.// -->
    </div>
</nav>





<section class="newsfeed mb-5">
    <div class="container">
        <div class="row">

            <div class="col-md-10 mx-auto mt-5">
                <h2>Total Members <span class="float-right"><a href="job_post.php" class="nav-link">Job Post</a></span></h2>
                <span class="text-capitalize"><i class="fas fa-user-friends text-muted "></i> 1689664 members </span>
            </div>
            <?php
            $sql = "select * from job_posts WHERE status = 0";
            $res = mysqli_query($connect, $sql);
            ?>

            <?php while ($row = mysqli_fetch_assoc($res)){?>
                <div class="col-md-10 mx-auto mt-3">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="text-center"><?php echo $row['title']?> </h3>
                        </div>
                        <div class="card-body">
                            <p class="font-weight-bold">Job Post ID : <span class="text-black"><?php echo $row['job_post_id'];?></span></p>
                            <p class="font-weight-bold">Application Start Date : <span class="text-black"><?php echo $row['post_date'];?></span></p>
                            <p class="font-weight-bold">Application End Date : <span class="text-black"><?php echo $row['end_date'];?></span></p>
                            <p class="font-weight-bold">Total Vacancy : <span class="text-black"><?php echo $row['vacancy'];?></span></p>
                            <p class="font-weight-bold">job Requirements: <br/> <span class="text-black ml-5"><?php echo $row['description'];?></span></p>
                        </div>
                        <div class="card-footer">
                            <a href="apply_form.php?job_post=<?php echo $row['job_post_id'];?>" class="btn btn-info float-right">Apply Now</a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>

</section>


<section class="fotter bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p class="text-center p-2 text-white">This site is created By @ <b> <i>Mehedi hasan</i></b></p>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
