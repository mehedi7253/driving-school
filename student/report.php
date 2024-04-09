<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 9:14 AM
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
                    <h1>Student Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Report To Admin</li>
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
                            <h3 class="text-center">Report Admin</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_POST['btn']))
                                {
                                    $trainer_id = $_POST['trainer_id'];
                                    $description = $_POST['description'];

                                    if ($description == ''){
                                        echo "<span class='text-danger'>Please Write Description</span><br/>";
                                    }

                                    if ($trainer_id && $description)
                                    {
                                        $report = "INSERT INTO report (trainer_id, description) VALUES ('$trainer_id', '$description')";
                                        $result = mysqli_query($connect, $report);

                                        $_SESSION['success'] = 'Report Sent Successful';
                                    }else{
                                        $_SESSION['error'] = 'Report Sent Failed';
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
                                    <label class="font-weight-bold">Select Trainer <sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="trainer_id">
                                        <?php
                                        $trainer    = "SELECT * FROM users WHERE role = 'trainer'";
                                        $res_train  = mysqli_query($connect, $trainer);

                                        while ($pack = mysqli_fetch_assoc($res_train)){?>
                                            <option value="<?php echo $pack['id'];?>"><?php echo $pack['first_name'].' '.$pack['last_name'];?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Write Description <sup class="text-danger">*</sup></label>
                                    <textarea class="form-control" name="description" id="application"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn" class="btn btn-success" value="Submit">
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



