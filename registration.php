<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 6:08 PM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    <link rel="stylesheet" href="assets/style/bootstrap.css" type="text/css">
    <link rel="icon" href="images/logo.JPG">
</head>
<style>
    .login{
        background-image: url("images/unnamed.jpg");
        height: 600px;
        width: 100%;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
</style>
<body class="login">

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="text-center">User Registration</h3>
                </div>
                <div class="card-body">
                    <h2 class="mb-5">
                        <?php
                            require_once 'php/config.php';
                            global  $connect;

                            if (isset($_POST['user_reg']))
                            {
                                $first_name = $_POST['first_name'];
                                $last_name  = $_POST['last_name'];
                                $email      = $_POST['email'];
                                $phone      = $_POST['phone'];
                                $gender     = $_POST['gender'];
                                $birth      = $_POST['date_of_birth'];
                                $password   = $_POST['password'];
                                $image      = $_FILES['image']['name'];

                                $has = hash('md5', $password);

                                if ($first_name == ''){
                                    echo "<span class='text-danger'>Please Enter First Name</span><br/>";
                                }elseif ($last_name == ''){
                                    echo "<span class='text-danger'>Please Enter Last Name</span><br/>";
                                }elseif ($email == ''){
                                    echo "<span class='text-danger'>Please Enter Email</span><br/>";
                                }elseif ($phone == ''){
                                    echo "<span class='text-danger'>Please Enter Phone</span><br/>";
                                }elseif ($password == ''){
                                    echo "<span class='text-danger'>Please Enter Password</span><br/>";
                                }elseif ($birth == ''){
                                    echo "<span class='text-danger'>Please Enter Date Of Birth</span><br/>";
                                }elseif ($gender == ''){
                                    echo "<span class='text-danger'>Please Select Gender </span><br/>";
                                }elseif ($image == ''){
                                    echo "<span class='text-danger'>Please Select Image</span><br/>";
                                }else{

                                    $sqlCheck = "SELECT * FROM users WHERE email = '$email'";
                                    $result = mysqli_query($connect, $sqlCheck);
                                    $count = mysqli_num_rows($result);
                                    if ($count > 0) {
                                        echo "<span class='text-danger'>Email All ready Registered.... Please Try Agin With New Email!</span><br/>";
                                    }else{

                                        $fileinfo = PATHINFO($_FILES['image']['name']);
                                        $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                        move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $newfilename);
                                        $location = $newfilename;

                                        $reg_user = "INSERT INTO users (first_name, last_name, email, phone, gender, date_of_birth, password, image, role, status) VALUES ('$first_name', '$last_name', '$email', '$phone', '$gender', '$birth', '$has', '$image', 'student', '0')";
                                        $res_reg  = mysqli_query($connect, $reg_user);

                                        if ($res_reg)
                                        {
                                            echo "<span class='text-success'>Registration Successful</span><br/>";
                                        }else{
                                            echo "<span class='text-danger'>Registration Failed...Try Again...!!!</span><br/>";
                                        }
                                    }
                                }
                            }

                        ?>
                    </h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-6 float-left">
                            <label>First Name <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="first_name" placeholder="Enter First Name" class="form-control" value="<?php if($_POST) {
                                echo $_POST['first_name'];
                            } ?>">
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Last Name <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control"value="<?php if($_POST) {
                                echo $_POST['last_name'];
                            } ?>">
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Email <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="email" name="email" placeholder="Enter Email Address" class="form-control"value="<?php if($_POST) {
                                echo $_POST['email'];
                            } ?>">
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Phone <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control" value="<?php if($_POST) {
                                echo $_POST['phone'];
                            } ?>">
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Password <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="password" name="password"  placeholder="Enter Your Password" class="form-control">
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Birth Date <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="date" name="date_of_birth" class="form-control" value="<?php if($_POST) {
                                echo $_POST['date_of_birth'];
                            } ?>">
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Gender <sup class="text-danger font-weight-bold">*</sup></label><br/>
                            <input type="radio" checked name="gender" value="Male"> Male
                            <input type="radio" name="gender" value="Fe Male"> Fe-Male
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Image <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="file" name="image" class="form-control"  value="<?php if($_POST) {
                                echo $_POST['image'];
                            } ?>">
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label></label>
                            <input type="submit" name="user_reg" class="btn btn-success btn-block" value="Submit">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="login.php" class="float-right nav-link">All Ready Registered Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>

