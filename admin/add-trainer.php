<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 8:04 PM
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
                    <h1>Admin Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Add Trainer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2> Add Trainer <a href="manage_trainer.php" class="btn btn-primary float-right"><i class="fa fa-eye"></i> All Trainer List</a></h2>
                    </div>
                    <div class="card-body" style="background-color: #F7F7F7">
                        <?php

                        //get trainer application by id
                        if (isset($_GET['trainer']))
                        {
                            $id = $_GET['trainer'];

                            $trainer = "SELECT * FROM apply_job WHERE apply_job_id = $id";
                            $result  = mysqli_query($connect, $trainer);

                            $trainer_data = mysqli_fetch_assoc($result);
                        }
                        if (isset($_POST['btn'])){
                            $first_name = $_POST['first_name'];
                            $last_name  = $_POST['last_name'];
                            $phone      = $_POST['phone'];
                            $email      = $_POST['email'];
                            $password   = $_POST['password'];
                            $image      = $_POST['image'];

                            $has = hash('md5', $password);

                            if ($first_name == ''){
                                $_SESSION['first_name'] = 'Enter First Name';
                            }elseif ($last_name == ''){
                                $_SESSION['last_name'] = 'Enter Last Name';
                            }elseif ($email == ''){
                                $_SESSION['emails'] = 'Enter Your Email';
                            }elseif ($phone == ''){
                                $_SESSION['phone'] = 'Enter Phone Number';
                            }elseif ($password == ''){
                                $_SESSION['password'] = 'Enter Password';
                            }elseif ($image == ''){
                                $_SESSION['image'] = 'Please Seelect an Image';
                            }else {
                                $sqlCheck = "SELECT * FROM users WHERE email = '$email'";
                                $result = mysqli_query($connect, $sqlCheck);
                                $count = mysqli_num_rows($result);
                                if ($count > 0) {
                                    $_SESSION['exist'] = $_POST['email'].  ' All ready Registerd Try Agin!';
//                                                    header('Location: patient_registration.php');
                                } else {

                                    $add_trainer = "INSERT INTO users (first_name, last_name, phone, email, password, image, role) VALUES ('$first_name', '$last_name', '$phone', '$email', '$has', '$image', 'trainer')";
                                    $res_trainer = mysqli_query($connect, $add_trainer);

                                    if ($res_trainer){
                                        $_SESSION['success'] = 'New Trainer Added Successful';
                                    }else{
                                        $_SESSION['error'] = 'New Trainer Added Failed...!!';
                                    }
                                }
                            }

                        }
                        ?>
                        <?php
                        if(isset($_SESSION['first_name'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='first_name' style='background-color: red; color: white'>
                                     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['first_name']."
                                    </div>
                                            ";
                            unset($_SESSION['first_name']);
                        }
                        if(isset($_SESSION['last_name'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='last_name' style='background-color: red; color: white'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['last_name']."
                                    </div>
                                    ";
                            unset($_SESSION['last_name']);
                        }
                        if(isset($_SESSION['phone'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='phone' style='background-color: red; color: white'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['phone']."
                                    </div>
                                    ";
                            unset($_SESSION['phone']);
                        }
                        if(isset($_SESSION['emails'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='emails' style='background-color: red; color: white'>
                                         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['emails']."
                                    </div>
                                ";
                            unset($_SESSION['emails']);
                        }
                        if(isset($_SESSION['exist'])){
                            echo "
                                        <div class='alert alert-danger alert-dismissible' id='exist' style='background-color: red; color: white'>
                                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                              <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['exist']."
                                        </div>
                                    ";
                            unset($_SESSION['exist']);
                        }
                        if(isset($_SESSION['image'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='image' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['image']."
                                    </div>
                                ";
                            unset($_SESSION['image']);
                        }
                        if(isset($_SESSION['error'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                       <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['error']."
                                    </div>
                                    ";
                            unset($_SESSION['error']);
                        }


                        if(isset($_SESSION['success'])){
                            echo "
                                    <div class='alert alert-success alert-dismissible'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <h6><i class='icon fa fa-check'></i> Success!</h6>  ".$_SESSION['success']."
                                    </div>
                                  ";
                            unset($_SESSION['success']);
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-6 float-left">
                                <label> First Name</label>
                                <input disabled class="form-control" placeholder="Enter First Name" value="<?php echo $trainer_data['first_name'];?>">
                                <input type="text" name="first_name" hidden class="form-control" placeholder="Enter First Name" value="<?php echo $trainer_data['first_name'];?>">
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label>Enter Last Name</label>
                                <input  class="form-control" disabled placeholder="Enter Last Name" value="<?php echo $trainer_data['last_name'];?>">
                                <input type="text" name="last_name" hidden class="form-control" placeholder="Enter Last Name" value="<?php echo $trainer_data['last_name'];?>">
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label>Enter Email</label>
                                <?php
                                    $name       = $trainer_data['first_name'];
                                    $trainer_id = $trainer_data['apply_job_id'];

                                ?>
                                <input name="email" type="email" hidden class="form-control" value="<?php echo $name.'-'.$trainer_id.'@'.'trainer.bd'?>">
                                <input  class="form-control" disabled value="<?php echo $name.'-'.$trainer_id.'@'.'trainer.bd'?>">
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label>Enter Phone Number</label>
                                <input disabled class="form-control" placeholder="Enter Phone Number" value="<?php echo $trainer_data['phone'];?>">
                                <input type="number" name="phone" hidden class="form-control" placeholder="Enter Phone Number" value="<?php echo $trainer_data['phone'];?>">
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label> Photo</label><br/>
                                <input name="image" hidden class="form-control" placeholder="Enter Phone Number" value="<?php echo $trainer_data['image'];?>">
                                <img src="../images/<?php echo $trainer_data['image']?>" class="img-thumbnail" style="height: 100px; width: 100px">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" name="password" class="form-control" value="123" hidden>
                                <input type="submit" name="btn" value="Add Trainer" class="btn btn-block btn btn-success mt-4">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="trainer_add.php" class="float-right  btn btn-info">Back</a>
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
<script>
    //validation message
    $(function() {
        setTimeout(function() { $("#first_name").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#last_name").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#phone").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#emails").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#exist").fadeOut(1500); }, 5000)
    })
    $(function() {
        setTimeout(function() { $("#image").fadeOut(1500); }, 3000)
    })

</script>

