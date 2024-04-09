<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 8:57 PM
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
                        <li class="active">Take Attendance</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Take Attendance</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <?php
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
                            </div>
                            <div class="form-group">
                                <label>Select Package</label>
                                <select class="form-control" name="batch_id"  onchange="showUser(this.value)">
                                    <option>------------Select One----------</option>
                                    <?php
                                    $sql_batch = "SELECT * FROM package, enroll_student, users WHERE 
                                                enroll_student.student_id = users.id AND 
                                                enroll_student.package_id = package.package_id AND
                                                package.trainer_id = $userdata[id] GROUP BY package.package_name";
                                    $result_batch = mysqli_query($connect, $sql_batch);

                                    while ($row = mysqli_fetch_assoc($result_batch)){?>
                                        <option value="<?php echo $row['package_id'];?>"><?php echo $row['package_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div id="txtHint"></div>

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



