<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/17/2020
 * Time: 3:06 PM
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
        <div class="col-md-6 mx-auto mt-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center">User Login</h3>
                    <?php
                    require_once 'php/config.php';
                    global  $connect;

                    if (isset($_POST['btn'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        if ($email == ''){
                            echo "<span class='text-danger'>Please Enter Email</span><br/>";
                        }
                        if ($password == ''){
                            echo "<span class='text-danger'>Please Enter Password</span><br/>";
                        }
                        $has = hash('md5', $password);

                        $sql = "SELECT * FROM users WHERE email ='$email' AND password = '$has'";

                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $data = mysqli_fetch_assoc($result);

                            if ($data['role'] == 'trainer') {
                                $_SESSION['trainer'] = $data['email'];
                                echo "<script>document.location.href='trainer/index.php'</script>";
                            } elseif ($data['role'] == 'admin') {
                                $_SESSION['admin'] = $data['email'];
                                echo "<script>document.location.href='admin/admin_dashboard.php'</script>";
                            } elseif ($data['role'] == 'student') {
                                $_SESSION['student'] = $data['email'];
                                echo "<script>document.location.href='student/index.php'</script>";
                            }
                        } else {
                            echo "<span class='text-danger'>User Name Or Password Doesn't match</span>";
                        }
                    }

                    ?>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control">
                        </div>
                        <div>
                            <a href="registration.php" class="nav-link float-right">New User Registraion</> </a>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" value="Login" class="btn btn-success mt-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>
