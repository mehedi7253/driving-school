<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 9:45 PM
 */
?>
<?php include "layouts/header.php";?>
<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <?php include "layouts/side_bar.php"?>
</aside>

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">
        <?php include "layouts/menu_bar.php";?>
    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Trainer Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Change password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-capitalize text-dark">Change password</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            // check validation
                            if(isset($_SESSION['error'])){
                                echo "
                                        <div class='alert alert-danger alert-dismissible'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                          ".$_SESSION['error']."
                                        </div>
                                     ";
                                unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['success'])){
                                echo "
                                    <div class='alert alert-success alert-dismissible'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <h4><i class='icon fa fa-check'></i> Success!</h4>
                                      ".$_SESSION['success']."
                                    </div>
                               ";
                                unset($_SESSION['success']);
                            }

                            ?>
                            <?php
                            // change password
                            if (isset($_POST['change_pass'])){
                                $old_pass = $_POST['old_pass'];
                                $new_pass = $_POST['password'];

                                $has_pass = hash('md5', $old_pass); // hash password
                                $new_pass_hash = hash('md5', $new_pass); // passsword hash into sha256

                                if ($old_pass == ''){
                                    echo "<span class='text-danger'>Type Your Old Password</span><br/>";
                                }elseif ($new_pass == ''){
                                    echo "<span class='text-danger'>Type Your New Password</span><br/>";
                                }elseif (preg_match('/\s/', $new_pass)) {
                                    echo "<span class='text-danger'>Password Must Have No Space</span><br/>";
                                }else{
                                    if ($old_pass && $has_pass){
                                        $sql = "SELECT * FROM users WHERE id = '$userdata[id]' AND password = '$has_pass'"; // check password hash
                                        $result = mysqli_query($connect, $sql); // connect with query and database

                                        $up = mysqli_fetch_assoc($result);

                                        if ($up !=0){
                                            $change_pass = "UPDATE users SET password = '$new_pass_hash' WHERE id = '$userdata[id]'"; // update password
                                            $res_change  = mysqli_query($connect, $change_pass);// connect with query and database

                                            $_SESSION['success'] = 'Password Change Successful';
                                            echo "<script>document.location.href='change_pass.php'</script>";
                                        }else{
                                            $_SESSION['error'] = 'Password Does Not Match With Current Password';
                                            echo "<script>document.location.href='change_pass.php'</script>";                                        }
                                    }
                                }
                            }
                            ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Type Your Old Password</label>
                                    <input type="password" placeholder="Enter Old Password" name="old_pass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Type New Password</label>
                                    <input type="password" placeholder="Enter New Password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="change_pass" class="btn btn-success" value="Change Password">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a class="float-right btn btn-info" href="index.php"> Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .content -->

</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include "layouts/script.php";?>

</body>
</html>



