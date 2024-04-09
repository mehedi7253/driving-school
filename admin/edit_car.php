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
                        <li class="active">Dashboard</li>
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
                        <h2>Update Training Vehicle <a class="btn btn-info float-right" href="manage_car.php"><i class="fa fa-backward"></i> Back</a></h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['car']))
                        {
                            //get car details by car id
                            $car_id = $_GET['car'];

                            $get_car = "SELECT * FROM car WHERE car_id = $car_id";
                            $res_car = mysqli_query($connect, $get_car);

                            $data = mysqli_fetch_assoc($res_car);
                        }

                        // update details
                        if (isset($_POST['btn']))
                        {
                            $car_number = $_POST['car_number'];
                            $car_details = $_POST['car_details'];

                            $sql_up = "UPDATE car SET car_number = '$car_number', car_details = '$car_details' WHERE car_id = $car_id";
                            $up_res = mysqli_query($connect, $sql_up);

                            if ($sql_up){
                                $_SESSION['success'] = 'Car Details Update Successful';

                                echo "<script>document.location.href='manage_car.php'</script>";
                            }else{
                                $_SESSION['error'] = 'Car Details Update Failed';
                                echo "<script>document.location.href='edit_car.php?car=$car_id'</script>";
                            }
                        }
                        ?>
                        <?php
                        if(isset($_SESSION['error'])){
                            echo "
                                        <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <span><i class='fas fa-exclamation-triangle'> </i></span>  ".$_SESSION['error']."
                                        </div>
                                    ";
                            unset($_SESSION['error']);
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="font-weight-bold">Car Number <sup class="text-danger font-weight-bold">*</sup></label>
                                <input type="text" name="car_number" placeholder="Enter Car Number" class="form-control" value="<?php echo $data['car_number'];?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Car Details <sup class="text-danger font-weight-bold">*</sup></label>
                                <textarea  name="car_details" placeholder="Enter Car Description" class="form-control"><?php echo $data['car_details'];?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" value="Update" class="btn btn-success">
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


