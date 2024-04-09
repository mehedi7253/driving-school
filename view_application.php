<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 2:29 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 1:43 PM
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
                <div class="card" id="mainFrame">
                    <div class="card-header">
                        <p>Application ID: <?php echo $_SESSION['apply_job_id'];?> <span><img src="images/logo.JPG" style="70px; width: 70px; border-radius: 50%" class="float-right"></span></p>
                    </div>
                    <div class="card-body">
                        <div class="image ml-3">
                            <img src="images/<?php echo $_SESSION['image'];?>" style="height: 150px; width: 150px">
                        </div>

                        <div class="mt-4">
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>First Name</label>
                                <input disabled value="<?php echo $_SESSION['first_name'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Last Name</label>
                                <input disabled  value="<?php echo $_SESSION['last_name'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Email</label>
                                <input disabled value="<?php echo $_SESSION['email'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Phone Number</label>
                                <input disabled value="<?php echo $_SESSION['phone'];?>" class="form-control">
                            </div>

                            <div class="form-group ml-3">
                                <label>NID</label>
                                <input disabled value="<?php echo $_SESSION['nid'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Service</label>
                                <input disabled value="<?php echo $_SESSION['title'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Experience</label>
                                <input disabled value="<?php echo $_SESSION['expreance'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Present Address</label>
                                <textarea disabled class="form-control"><?php echo $_SESSION['pres_address'];?></textarea>
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Parmanent Address</label>
                                <textarea disabled class="form-control"><?php echo $_SESSION['parm_address'];?></textarea>
                            </div>
                            <div class="form-group ml-3">
                                <label>Date Of Birth</label>
                                <input disabled value="<?php echo $_SESSION['dob'];?>" class="form-control">
                            </div>
                            <div class="form-group ml-3">
                                <label>Gender</label>
                                <input disabled value="<?php echo $_SESSION['gender'];?>" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info float-right" type="pss" id="prntPSS">Download Now</button>
                    </div>
                </div>

            </div>
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
<script type="application/javascript">
    // print invoice
    $(document).ready(function () {

        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });

    });
</script>
</body>
</html>

