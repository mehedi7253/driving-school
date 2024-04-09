<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 9:24 PM
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
                        <li class="active">Update Profie</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Update Profile</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            // validation message
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
                            if (isset($_POST['user_update']))
                            {
                                $id         = $_POST['id'];
                                $first_name = $_POST['first_name'];
                                $last_name  = $_POST['last_name'];
                                $phone      = $_POST['phone'];
                                $city       = $_POST['city'];
                                $ps         = $_POST['police'];
                                $postal     = $_POST['postal'];
                                $birth      = $_POST['date_of_birth'];
                                $gender     = $_POST['gender'];


                                if ($first_name == '') {
                                    $_SESSION['first_name'] = 'First Name Must Not Empty.!!';
                                } elseif ($last_name == '') {
                                    $_SESSION['last_name'] = 'Last Name Must Not Empty.!!';
                                } elseif ($phone == '') {
                                    $_SESSION['phone'] = 'Phone Number Must Not Empty.!!';
                                }elseif (strlen($phone)<11){
                                    $_SESSION['phone_lentgh'] = 'Phone Number Should Be 11 Digit!';
                                }elseif (strlen($phone)>11){
                                    $_SESSION['phone_lentgh2'] = 'Phone Number Should Be 11 Digit!';
                                }elseif ($city == ''){
                                    $_SESSION['city'] = 'Enter Your City';
                                }elseif ($ps == ''){
                                    $_SESSION['ps'] = 'Enter Police Station';
                                }elseif ($postal == ''){
                                    $_SESSION['postal'] = 'Enter Post Code';
                                }elseif ($birth == ''){
                                    $_SESSION['db'] = 'Select Date Of Birth';
                                }elseif ($gender == '') {
                                    $_SESSION['gender'] = 'Gender Must Not Empty.!!';
                                }else{
                                    //update profile
                                    if ($first_name && $last_name  && $phone  && $city && $ps && $birth && $gender) {
                                        $sql = "UPDATE users SET 
                                                    first_name    = '$first_name',
                                                    last_name     = '$last_name',
                                                    phone         = '$phone',
                                                    city          = '$city',
                                                    police        = '$ps',
                                                    postal        = '$postal',
                                                    date_of_birth = '$birth',
                                                    gender        = '$gender'
                                                    
                                                    WHERE id = '$id'
                                                ";
                                        $res = mysqli_query($connect, $sql);

                                        $_SESSION['success'] = 'Profile Update Successful';
                                        echo "<script>document.location.href='update_profile.php'</script>";
                                    }else{
                                        $_SESSION['error'] = 'Profile Update Failed...!!';
                                        echo "<script>document.location.href='update_profile.php'</script>";
                                    }
                                }

                            }
                            ?>
                            <?php
                            // validation message
                            if(isset($_SESSION['first_name'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='fname' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['first_name']."
                                </div>
                                ";
                                unset($_SESSION['first_name']);
                            }
                            if(isset($_SESSION['last_name'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='lname' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['last_name']."
                                </div>
                                ";
                                unset($_SESSION['last_name']);
                            }

                            if(isset($_SESSION['phone'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='phone' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['phone']."
                                </div>
                                ";
                                unset($_SESSION['phone']);
                            }
                            if(isset($_SESSION['gender'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='gender' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['gender']."
                                </div>
                                ";
                                unset($_SESSION['gender']);
                            }
                            if(isset($_SESSION['pass'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='pass' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['pass']."
                                </div>
                                ";
                                unset($_SESSION['pass']);
                            }
                            if(isset($_SESSION['image'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='image' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['image']."
                                </div>
                                ";
                                unset($_SESSION['image']);
                            }
                            if(isset($_SESSION['phone_lentgh'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='phone_lentgh' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['phone_lentgh']."
                                </div>
                                ";
                                unset($_SESSION['phone_lentgh']);
                            }
                            if(isset($_SESSION['phone_lentgh2'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='phone_lentgh2' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['phone_lentgh2']."
                                </div>
                                ";
                                unset($_SESSION['phone_lentgh2']);
                            }
                            if(isset($_SESSION['error'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['error']."
                                </div>
                                ";
                                unset($_SESSION['error']);
                            }

                            if(isset($_SESSION['city'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='city' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['city']."
                                </div>
                                ";
                                unset($_SESSION['city']);
                            }
                            if(isset($_SESSION['postal'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='postal' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['postal']."
                                </div>
                                ";
                                unset($_SESSION['postal']);
                            }
                            if(isset($_SESSION['ps'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='ps' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['ps']."
                                </div>
                                ";
                                unset($_SESSION['ps']);
                            }
                            if(isset($_SESSION['db'])){
                                echo "
                                <div class='alert alert-danger alert-dismissible' id='db' style='background-color: red; color: white'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['db']."
                                </div>
                                ";
                                unset($_SESSION['db']);
                            }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group col-md-6 float-left">
                                    <label>First Name</label>
                                    <input type="text" name="id" hidden placeholder="Enter First Name" class="form-control" value="<?php echo $userdata['id'];?>">
                                    <input type="text" name="first_name" placeholder="Enter First Name" class="form-control" value="<?php echo $userdata['first_name'];?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control" value="<?php echo $userdata['last_name'];?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Email</label>
                                    <input type="email"  placeholder="Enter Email Address" disabled class="form-control"value="<?php echo $userdata['email']; ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Phone</label>
                                    <input type="number" name="phone" placeholder="Enter Phone Number" class="form-control" value="<?php echo $userdata['phone']; ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Police Station</label>
                                    <input type="text" name="police" placeholder="Enter Police Station" class="form-control" value="<?php echo $userdata['police']; ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter City Name" class="form-control" value="<?php echo $userdata['city'];?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Postal/Zip</label>
                                    <input type="text" name="postal" placeholder="Enter Email Address" class="form-control" value="<?php echo $userdata['postal']; ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Birth Date</label>
                                    <input type="date" name="date_of_birth" class="form-control" value="<?php echo $userdata['date_of_birth']; ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Gender </label><br/>
                                    <input type="radio" checked name="gender" value="Male"> Male
                                    <input type="radio" name="gender" value="Fe Male"> Fe-Male
                                </div>

                                <div class="form-group col-md-6 float-left">
                                    <label class="p-2"></label>
                                    <input type="submit" name="user_update" class="btn btn-info btn-block" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .content -->

</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include "layouts/script.php";?>

<script>
    // validation
    $(function() {
        setTimeout(function() { $("#fname").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#lname").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#email").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#phone").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#pass").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#error").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#email_exist").fadeOut(1500); }, 5000)
    })
    $(function() {
        setTimeout(function() { $("#image").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#phone_lentgh").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#phone_lentgh2").fadeOut(1500); }, 3000)
    })

    $(function() {
        setTimeout(function() { $("#city").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#ps").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#postal").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#db").fadeOut(1500); }, 3000)
    })
</script>
</body>
</html>

