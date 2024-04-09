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
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Admin Dashboard</li>
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
                        <h2>Update Package <a href="manage_package.php" class="btn btn-info float-right"><i class="fa fa-backward"></i> Back</a></h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['name'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='name' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fas fa-exclamation-triangle'> </i></span>  ".$_SESSION['name']."
                                    </div>
                                ";
                            unset($_SESSION['name']);
                        }
                        if(isset($_SESSION['price'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='price' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fas fa-exclamation-triangle'> </i></span>  ".$_SESSION['price']."
                                    </div>
                                ";
                            unset($_SESSION['price']);
                        }
                        if(isset($_SESSION['description'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='desc' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fas fa-exclamation-triangle'> </i></span>  ".$_SESSION['description']."
                                    </div>
                                ";
                            unset($_SESSION['description']);
                        }
                        if(isset($_SESSION['duration'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='duration' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fas fa-exclamation-triangle'> </i></span>  ".$_SESSION['duration']."
                                    </div>
                                ";
                            unset($_SESSION['duration']);
                        }
                        if(isset($_SESSION['error'])){
                            echo "
                                    <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fas fa-exclamation-triangle'> </i></span>  ".$_SESSION['error']."
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
                        <?php
                        //get package id an update it
                        if (isset($_GET['package']))
                        {
                            $id = $_GET['package'];

                            $sql_package = "SELECT * FROM package WHERE package_id =  '$id'";
                            $res_package = mysqli_query($connect, $sql_package);

                            $data = mysqli_fetch_assoc($res_package);

                        }

                        if (isset($_POST['btn']))
                        {
                            $id           = $_POST['package_id'];
                            $package_name = $_POST['package_name'];
                            $price        = $_POST['price'];
                            $description  = $_POST['description'];
                            $duration     = $_POST['duration'];

                            if ($package_name == ''){
                                $_SESSION['name'] = 'Enter Package Name';
                            }elseif ($price == ''){
                                $_SESSION['price'] = 'Enter Package Price';
                            }elseif ($description == ''){
                                $_SESSION['description'] = 'Enter Package Description';
                            }elseif ($duration == ''){
                                $_SESSION['duration'] = 'Please Enter Duration';
                            }else{

                                $sql_update_package = "UPDATE package SET
                                                      package_name = '$package_name',
                                                      price        = '$price',
                                                      description  = '$description',
                                                      duration     = '$duration'
                                                      WHERE package_id = '$id'
                                       ";

                                $res_upd_package = mysqli_query($connect, $sql_update_package);
                                if ($res_upd_package){
                                    echo "<script>document.location.href='edit_package.php?package=$id'</script>";
                                    $_SESSION['success'] = 'Package Update Successful';
                                }else{
                                    echo "<script>document.location.href='edit_package.php?package=$id'</script>";

                                    $_SESSION['error'] = 'Package Update Failed';
                                }
                            }
                        }
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label class="font-weight-bold">Package Name<sup class="text-danger font-weight-bold">*</sup></label>
                                <input type="text" name="package_id" hidden value="<?php echo $data['package_id'];?>">
                                <input type="text" name="package_name" class="form-control" placeholder="Enter Package Name" value="<?php echo $data['package_name'];?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Package Price<sup class="text-danger font-weight-bold">*</sup></label>
                                <input type="text" name="price" class="form-control" placeholder="Enter Package Price" value="<?php echo $data['price'];?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Package Duration<sup class="text-danger font-weight-bold">*</sup></label>
                                <input type="text" name="duration" class="form-control" placeholder="Enter Package Duration" value="<?php echo $data['duration'];?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Package Description <sup class="text-danger font-weight-bold">*</sup></label>
                                <textarea name="description" id="application" class="form-control" placeholder="Enter Package Description"><?php echo $data['description'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="submit" name="btn" class="btn btn-primary col-md-5 btn-block" value="Update Package">
                            </div>
                        </form>
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
        setTimeout(function() { $("#name").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#price").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#desc").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#error").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#duration").fadeOut(1500); }, 3000)
    })

</script>
