<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 5:52 PM
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
                        <li class="active">Enroll Student in Package</li>
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
                            <h3>Enroll Student <a href="enroll_list.php" class="float-right btn btn-info"> All Enroll Students</a></h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_POST['btn']))
                                {
                                    $student_id = $_POST['student_id'];
                                    $package_id = $_POST['package_id'];

                                    if ($student_id == ''){
                                        $_SESSION['studeent_id'] = 'Please Enter Student ID';
                                    }else{

                                        $enroll_package = "INSERT INTO enroll_student (student_id, package_id) VALUES ('$student_id', '$package_id')";
                                        $res_eroll_pack = mysqli_query($connect, $enroll_package);

                                        if ($res_eroll_pack){
                                            $_SESSION['success'] = 'Student Enroll Into Package Is Successful';
                                        }else{
                                            $_SESSION['error'] = 'In Valid Student ID';
                                        }
                                    }
                                }
                            ?>
                            <?php
                            if(isset($_SESSION['studeent_id'])){
                                    echo "
                                        <div class='alert alert-danger alert-dismissible' id='studeent_id' style='background-color: red; color: white'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['studeent_id']."
                                        </div>
                                    ";
                                unset($_SESSION['studeent_id']);
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
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="font-weight-bold">Student ID <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Select Package <sup class="text-danger font-weight-bold">*</sup></label>
                                    <select class="form-control" name="package_id">
                                        <?php
                                            $package = "SELECT * FROM package";
                                            $res     = mysqli_query($connect, $package);

                                            while ($pack = mysqli_fetch_assoc($res)){?>
                                                <option value="<?php echo $pack['package_id'];?>"><?php echo $pack['package_name'];?></option>
                                           <?php }
                                       ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn" class="btn btn-success col-md-4" value="Enroll Now">
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
<script>
    //validation message
    $(function() {
        setTimeout(function() { $("#studeent_id").fadeOut(1500); }, 3000)
    })
</script>
