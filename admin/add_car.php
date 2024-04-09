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
                        <li class="active">Add New Vehicle</li>
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
                            <h2>Add New Training Vehicle <a class="btn btn-info float-right" href="manage_car.php">View All Vehicle</a></h2>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_POST['btn'])){

                                $car_number = $_POST['car_number'];
                                $car_details = $_POST['car_details'];
                                $imae        = $_FILES['image']['name'];

                                if ($car_number == ''){
                                    $_SESSION['car_number']  = 'Please Enter Car Number';
                                }elseif ($car_details == ''){
                                    $_SESSION['car_dts'] = 'Please Enter Car Details';
                                }elseif ($imae == ''){
                                    $_SESSION['image'] = 'Please Chose Car Image';
                                }else{

                                    $fileinfo = PATHINFO($_FILES['image']['name']);
                                    $newFile = $fileinfo['filename']. "." . $fileinfo['extension'];
                                    move_uploaded_file($_FILES['image']['tmp_name'], "../images/" .$newFile);
                                    $location = $newFile;

                                    $add_vhicle = "INSERT INTO car (car_number, car_details, image, status) VALUES ('$car_number', '$car_details', '$imae', '0')";
                                    $res_vhicle = mysqli_query($connect, $add_vhicle);

                                    if ($res_vhicle){
                                        $_SESSION['success'] = 'New Training Vehicle Added Successful';
                                    }else{
                                        $_SESSION['error'] = 'New Training Vehicle Added Failed..!!';
                                    }
                                }
                            }
                            ?>
                            <?php
                            if(isset($_SESSION['car_number'])){
                                echo "
                                        <div class='alert alert-danger alert-dismissible' id='car_number' style='background-color: red; color: white'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['car_number']."
                                        </div>
                                        ";
                                unset($_SESSION['car_number']);
                            }
                            if(isset($_SESSION['car_dts'])){
                                echo "
                                            <div class='alert alert-danger alert-dismissible' id='car_dts' style='background-color: red; color: white'>
                                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                              <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['car_dts']."
                                            </div>
                                            ";
                                unset($_SESSION['car_dts']);
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
                            if(isset($_SESSION['error'])){
                                echo "
                                        <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <span><i class='fas fa-exclamation-triangle'></i></span> ".$_SESSION['error']."
                                        </div>
                                        ";
                                unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['success'])){
                                echo "
                                        <div class='alert alert-success alert-dismissible'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <h6><i class='icon fa fa-check'></i> Success!</h6>
                                          ".$_SESSION['success']."
                                        </div>
                                      ";
                                unset($_SESSION['success']);
                            }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="font-weight-bold">Car Number <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="text" name="car_number" placeholder="Enter Car Number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Car Details <sup class="text-danger font-weight-bold">*</sup></label>
                                    <textarea  name="car_details" placeholder="Enter Car Description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Car Image <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="file" name="image" placeholder="Enter Car Number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn" value="Add New vehicle" class="btn btn-success">
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
    //validation message
    $(function() {
        setTimeout(function() { $("#car_number").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#car_dts").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#image").fadeOut(1500); }, 3000)
    })

</script>
</body>
</html>


