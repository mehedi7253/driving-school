<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 10:19 PM
 */
?>
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
                    <h1> Student Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Application</li>
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
                            <h3 class="text-center">Application For Enroll New Package</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_POST['btn']))
                                {
                                    $user_id   = $_POST['user_id'];
                                    $package_id = $_POST['package_id'];
                                    $application = $_POST['application'];
                                    $title  = $_POST['title'];


                                    if ($title == ''){
                                        $_SESSION['title'] = 'Please Write Your Application Reason';
                                    }elseif ($application == ''){
                                        $_SESSION['app'] = 'Please Write Your Application';
                                    }else{

                                        $create = @date('Y-m-d H:i:s');
                                        $sql_application = "INSERT INTO application_package (user_id, package_id, application, title, date, app_status) VALUES ('$user_id', '$package_id', '$application', '$title', '$create', '0')";
                                        $res_application = mysqli_query($connect, $sql_application);

                                        if ($res_application){
                                            $_SESSION['success'] = 'Application Sent Successfull';
                                        }else{
                                            $_SESSION['error'] = 'Application Sent Failed...!!';
                                        }
                                    }

                                }
                            ?>
                            <?php
                            if(isset($_SESSION['title'])){
                                echo "
                                        <div class='alert alert-danger alert-dismissible' id='title' style='background-color: red; color: white'>
                                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                              <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['title']."
                                        </div>
                                    ";
                                unset($_SESSION['title']);
                            }
                            if(isset($_SESSION['app'])){
                                echo "
                                    <div class='alert alert-danger alert-dismissible' id='app' style='background-color: red; color: white'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fa fa-exclamation-triangle'></i></span> ".$_SESSION['app']."
                                    </div>
                                    ";
                                unset($_SESSION['app']);
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
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="font-weight-bold">Application For <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input name="user_id" hidden type="text" class="form-control" value="<?php echo $userdata['id'];?>">
                                    <input name="title" type="text" class="form-control" placeholder="Enter Application Reason">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold"> Chose Package <sup class="text-danger font-weight-bold">*</sup></label>
                                    <select name="package_id" class="form-control">
                                        <?php
                                            //get all package
                                            $sql = "SELECT * FROM package";
                                            $res = mysqli_query($connect, $sql);

                                            while ($package = mysqli_fetch_assoc($res)){?>
                                                 <option value="<?php echo $package['package_id'];?>"><?php echo $package['package_name'];?></option>
                                       <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold"> Application <sup class="text-danger font-weight-bold">*</sup></label>
                                    <textarea id="application" name="application" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn" value="Submit" class="btn btn-success col-md-5">
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
        setTimeout(function() { $("#title").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#app").fadeOut(1500); }, 3000)
    })
</script>