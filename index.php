<?php
include "php/db_connect.php";
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
    .hover01 figure img {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }
    .hover01 figure:hover img {
        -webkit-transform: scale(1.3);
        transform: scale(1.3);
    }
    /*.column:last-child {*/
    /*padding-bottom: 60px;*/
    /*}*/
    .column::after {
        content: '';
        clear: both;
        display: block;
    }
    .column div {
        position: relative;
        float: left;
        /*width: 300px;*/
        height: 300px;
        margin: 0 0 0 25px;
        padding: 0;
    }
    .column div:first-child {
        margin-left: 0;
    }
    .column div span {
        position: absolute;
        bottom: -20px;
        left: 0;
        z-index: -1;
        display: block;
        /*width: 300px;*/
        margin: 0;
        padding: 0;
        color: #444;
        font-size: 18px;
        text-decoration: none;
        text-align: center;
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
        opacity: 0;
    }
    figure {
        height: 200px;
        margin: 0;
        padding: 0;
        background: #fff;
        overflow: hidden;
    }
    figure:hover+span {
        bottom: -36px;
        opacity: 1;
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

    <section class="slider">
        <div class="slide_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-4 col-sm-12">
                            <div class="card mb-5 mt-5" style="border-color: #040507">
                                <div class="card-header" style="background-color: #F9463F">
                                    <h5 class="text-capitalize text-white text-center">Fell Free Message us</h5>
                                </div>
                                <div class="card-body" style="background-color: #040507">
                                    <?php
                                        if (isset($_POST['btn']))
                                        {
                                            $name    = $_POST['name'];
                                            $phone   = $_POST['phone'];
                                            $email   = $_POST['email'];
                                            $message = $_POST['message'];


                                            if ($name && $phone && $email && $message)
                                            {
                                                $date = date('Y-m-d');
                                                $sql_msg = "INSERT INTO public_message (name, phone, email, message, date) VALUES ('$name', '$phone', '$email', '$message', '$date')";
                                                $res_msg = mysqli_query($connect, $sql_msg);

                                                echo "<span class='text-success'>Message Sent Successful</span>";
                                            }
                                        }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone Number" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Write Your Message" name="message" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-block" name="btn" value="Send Now">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="package">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <h3 class="text-uppercase mt-5 p-3 text-center"><span class="p-3" style="border-bottom: 3px solid #069390; margin-top: 10px">Our Packages</span></h3>

                    <?php
                        $package_get = "SELECT * FROM package";
                        $res_package = mysqli_query($connect, $package_get);
                    while ($package = mysqli_fetch_assoc($res_package)){?>
                        <div class="col-md-4 col-sm-12 float-left mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center"><?php echo $package['package_name'];?></h3>
                                </div>
                                <div class="card-body">
                                    <label><span class="font-weight-bold">Duration : </span><?php echo $package['duration'];?></label><br/>
                                    <label><span class="font-weight-bold">Price <span class=" ml-4">: </span> </span><?php echo number_format($package['price'], 2);?>T.K</label><br/>
                                    <label><span class="font-weight-bold">Description : </span><?php echo $package['description']?></label><br/>

                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>

    <section class="trainer" style="background-color: rgba(197,238,229,0.6)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <h3 class="text-uppercase mt-5 p-3 text-center"><span class="p-3" style="border-bottom: 3px solid #069390; margin-top: 10px">Trainer</span></h3>

                    <?php
                    $teacher = "SELECT * FROM users WHERE role = 'trainer'";
                    $result = mysqli_query($connect, $teacher);
                    ?>

                    <?php while ($tech = mysqli_fetch_assoc($result)){?>
                        <div class="col-md-4 col-sm-12 mt-4 float-left">
                            <div class="card column hover01">
                                <figure><img src="images/<?php echo $tech['image'];?>" style="height: 200px; cursor: pointer" class="card-img-top"/></figure>
                                <h5 class="text-center text-capitalize p-3"><?php echo $tech['first_name'];?> <?php echo $tech['last_name'];?></h5>
                            
                            </div>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
    </section>

    <section class="trainer" style="background-color: white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <h3 class="text-uppercase mt-5 p-3 text-center"><span class="p-3" style="border-bottom: 3px solid #069390; margin-top: 10px">Training Vehicles</span></h3>

                    <?php
                    $car   = "SELECT * FROM car";
                    $r_car = mysqli_query($connect, $car);
                    ?>

                    <?php while ($row_car = mysqli_fetch_assoc($r_car)){?>
                        <div class="col-md-4 col-sm-12 mt-4 float-left">
                            <div class="card">
                               <img src="images/<?php echo $row_car['image'];?>" title="<?php echo $row_car['car_number'];?>" style="height: 250px; class="card-img-top"/>
                            </div>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
    </section>

    <section class="fotter bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p class="text-center p-2 text-white">This site is created By @ <b> <i>Mehedi Hasan</i></b></p>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>