<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/21/2020
 * Time: 11:15 AM
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
                        <li class="active">Schedule</li>
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
                            <h3 class="text-center">Add Schedule</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_POST['btn']))
                                {
                                    $package_id = $_POST['package_id'];
                                    $sat    = $_POST['sat'];
                                    $sun    = $_POST['sun'];
                                    $mon    = $_POST['mon'];
                                    $tues   = $_POST['tue'];
                                    $wed    = $_POST['wed'];
                                    $thurs  = $_POST['thu'];
                                    $fri    = $_POST['fri'];

                                    $sql = "INSERT INTO schedule (package_id, sat, sun, mon, tue, wed, thu, fri) VALUES ('$package_id', '$sat', '$sun', '$mon', '$tues', '$wed', '$thurs', '$fri')";
                                    $res = mysqli_query($connect, $sql);

                                    if ($res){
                                        $_SESSION['success'] = 'Schedule Added Successful';
                                    }else{
                                        $_SESSION['error'] = 'Schedule Added Failed';
                                    }
                                }
                            ?>

                            <?php
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
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="font-weight-bold">Select Package <sup class="text-danger font-weight-bold">*</sup></label>
                                    <select class="form-control" name="package_id">
                                        <?php
                                        $package = "SELECT * FROM package";
                                        $res     = mysqli_query($connect, $package);

                                        echo "<option>-------Select One---------</option>";
                                        while ($pack = mysqli_fetch_assoc($res)){?>
                                            <option value="<?php echo $pack['package_id'];?>"><?php echo $pack['package_name'];?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>SAT</label>
                                    <input type="time" name="sat" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>SUN</label>
                                    <input type="time" name="sun" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>MON</label>
                                    <input type="time" name="mon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>TUE</label>
                                    <input type="time" name="tue" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>WED</label>
                                    <input type="time" name="wed" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>THU</label>
                                    <input type="time" name="thu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>FRI</label>
                                    <input type="time" name="fri" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="btn" class="btn btn-success" value="Set Schedule">
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

</body>
</html>



