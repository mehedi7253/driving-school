<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 9:48 PM
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
                    <h1>Student Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Change Profile Picture</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-capitalize text-dark">Change Profile Picture</h3>
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
                            if (isset($_POST['pic'])){
                                $fileinfo = PATHINFO($_FILES['image']['name']); // file info
                                $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension']; // get file extention
                                move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename); // get file path and upload image into path
                                $location = $newfilename; // store image into path

                                $update_profie_pic = "UPDATE users SET image = '$location' WHERE id = '$userdata[id]'"; // image upload into database
                                mysqli_query($connect, $update_profie_pic); // connect with query and database


                                $sql = "SELECT * FROM users WHERE id = '$userdata[id]'"; // get user id
                                $records = mysqli_query($connect, $sql); // connect with query and database
                                $count = mysqli_num_rows($records);

                                if ($count == 1) {
                                    $row = mysqli_fetch_array($records);
                                    echo " $userdata[image]";

                                    echo "<script>document.location.href='change_pic.php'</script>";

                                }
                            }
                            ?>
                            <div class="text-center">
                                <img src="../images/<?php echo $userdata['image'];?>" class="img-fluid" style="height: 200px; width: 200px; border-radius: 50%">
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Chose Photo</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="pic" class="btn btn-success" value="Change Profile Pic">
                                </div>

                            </form>
                        </div>
                        <div class="card-footer">
                            <a class="float-right btn btn-info" href="dashboard.php"> Profile</a>
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



