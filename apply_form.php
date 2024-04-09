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
                <div class="card">
                    <div class="card-header">
                        <img src="images/logo.JPG" style="70px; width: 70px; border-radius: 50%" class="float-right">
                    </div>
                    <div class="card-body">
                        <h5 class="ml-4">
                            <?php
                            if (isset($_GET['job_post'])){
                                $job_id = $_GET['job_post'];

                                $sql = "select * from job_posts WHERE job_post_id = $job_id";
                                $res = mysqli_query($connect, $sql);

                                $data = mysqli_fetch_assoc($res);
                            }
                            if (isset($_POST['btn'])){
//                                $job_id       = $_POST['job_id'];
                                $first_name   = $_POST['first_name'];
                                $last_name    = $_POST['last_name'];
                                $email        = $_POST['email'];
                                $phone        = $_POST['phone'];
                                $nid          = $_POST['nid'];
                                $title        = $_POST['title'];
                                $expreance    = $_POST['expreance'];
                                $pres_address = $_POST['pres_address'];
                                $parm_address = $_POST['parm_address'];
                                $dob          = $_POST['dob'];
                                $gender       = $_POST['gender'];
                                $image        = $_FILES['image'] ['name'];




                                if ($first_name == ""){
                                    echo "<span class='text-danger'> First name Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($last_name == ""){
                                    echo "<span class='text-danger'> Last name Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                } elseif ($email == ""){
                                    echo "<span class='text-danger'> Email name Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($email == ""){
                                    echo "<span class='text-danger'> Email Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($phone == ""){
                                    echo "<span class='text-danger'> Phone Number Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($nid == ""){
                                    echo "<span class='text-danger'> NID Number Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($title == ""){
                                    echo "<span class='text-danger'> Title Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($expreance == ""){
                                    echo "<span class='text-danger'> Expreance Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($pres_address == ""){
                                    echo "<span class='text-danger'> Present Address Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($parm_address == ""){
                                    echo "<span class='text-danger'> Permanent Address Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($dob == ""){
                                    echo "<span class='text-danger'> Date Of Birth Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($gender == ""){
                                    echo "<span class='text-danger'> Gender Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }elseif ($image == ""){
                                    echo "<span class='text-danger'> Image Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }else{

                                    if ($first_name && $last_name && $email && $phone && $nid && $title && $expreance && $pres_address && $parm_address && $dob && $gender && $image) {

                                        $error = 0;

                                        $sqlCheck = "SELECT * FROM apply_job WHERE email = '$email'";
                                        $result = mysqli_query($connect, $sqlCheck);
                                        $count = mysqli_num_rows($result);
                                        if ($count > 0) {
                                            $exist = "Email All ready Registered Try Agin!";
                                            echo $exist;
                                            $error = 1;
                                        }

                                        if ($error == 0) {
                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $newfilename);
                                            $location = $newfilename;

                                            $insert_data = "insert into apply_job (first_name, last_name, email, phone, nid, title, expreance, pres_address, parm_address, dob, gender, image, status) VALUES ('$first_name', '$last_name', '$email', '$phone', '$nid', '$title', '$expreance', '$pres_address', '$parm_address', '$dob', '$gender', '$image', '0')";
                                            $result = mysqli_query($connect, $insert_data);

                                            $lastid = mysqli_insert_id($connect);

                                            $sql = "SELECT * FROM apply_job WHERE apply_job_id = '$lastid'";
                                            $records = mysqli_query($connect, $sql);
                                            $count = mysqli_num_rows($records);

                                            if ($count == 1) {
                                                $row = mysqli_fetch_array($records);

                                                $_SESSION['apply_job_id'] = $row['apply_job_id'];
                                                $_SESSION['first_name'] = $row['first_name'];
                                                $_SESSION['last_name'] = $row['last_name'];
                                                $_SESSION['email'] = $row['email'];
                                                $_SESSION['phone'] = $row['phone'];
                                                $_SESSION['nid'] = $row['nid'];
                                                $_SESSION['title'] = $row['title'];
                                                $_SESSION['expreance'] = $row['expreance'];
                                                $_SESSION['pres_address'] = $row['pres_address'];
                                                $_SESSION['parm_address'] = $row['parm_address'];
                                                $_SESSION['dob'] = $row['dob'];
                                                $_SESSION['gender'] = $row['gender'];
                                                $_SESSION['image'] = $row['image'];

                                                echo "<span class='text-success'>Application Successful</span> <br/>";
                                                echo "<script>document.location.href='view_application.php'</script>";
//                                                header('Location: view_application.php');

                                            } else {
                                                echo "<span class='text-danger'>Application Failed..!</span> <br/>";
                                            }
                                        }
                                    }
                                }

                            }
                            ?>
                        </h5>

                        <form action="" method="post" enctype="multipart/form-data" class="mt-5">
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>First Name <sup class="text-danger font-weight-bold">**</sup></label>
<!--                                 <input type="text" name="job_id" hidden class="form-control" value="--><?php //echo $data['job_post_id'];?><!--">-->
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?php if($_POST) {
                                    echo $_POST['first_name'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Last Name <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter last Name" value="<?php if($_POST) {
                                    echo $_POST['last_name'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Email <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php if($_POST) {
                                    echo $_POST['email'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Phone Number <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php if($_POST) {
                                    echo $_POST['phone'];
                                } ?>">
                            </div>
                            <div class="form-group ml-3">
                                <label>NID Number <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="nid" class="form-control" placeholder="Enter NID Number" value="<?php if($_POST) {
                                    echo $_POST['nid'];
                                } ?>">
                            </div>

                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Service <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="title" class="form-control" value="<?php echo $data['title']?>" value="<?php if($_POST) {
                                    echo $_POST['service'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Experience <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="expreance" class="form-control" placeholder="Enter Your Experience" value="<?php if($_POST) {
                                    echo $_POST['expreance'];
                                } ?>">
                            </div>

                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Present Address <sup class="text-danger font-weight-bold">**</sup></label>
                                <textarea type="text" name="pres_address" class="form-control" placeholder="Enter Your Present Address"></textarea>
                            </div>

                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Permanent Address <sup class="text-danger font-weight-bold">**</sup></label>
                                <textarea type="text" name="parm_address" class="form-control" placeholder="Enter Your Permanent Address"></textarea>
                            </div>

                            <div class="form-group ml-3">
                                <label>Date Of Birth <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="date" name="dob" class="form-control" value="<?php if($_POST) {
                                    echo $_POST['dob'];
                                } ?>">
                            </div>
                            <div class="form-group ml-3">
                                <label>Select Gender <sup class="text-danger font-weight-bold">**</sup></label> <br/>
                                <input checked type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female"> FeMale
                            </div>
                            <div class="form-group ml-3">
                                <label>Select Your Image <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-info col-6" value="Submit">
                            </div>

                        </form>
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
</body>
</html>
