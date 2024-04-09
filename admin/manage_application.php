<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 3:14 PM
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
                        <li class="active">Application List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center"> All Application List </h3>
                                </div>
                                <div class="card-body">
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
                                    //get all package
                                    $sql = "SELECT * FROM apply_job";
                                    $res = mysqli_query($connect, $sql);
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="bootstrap-data-table">
                                            <thead class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Application ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Experience</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($res)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><a href="application_trainer.php?application=<?php echo $row['apply_job_id'];?>" class="nav-link text-info"><?php echo $row['apply_job_id'];?></a></td>
                                                    <td class="text-capitalize"><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                                    <td><?php echo $row['email'];?></td>
                                                    <td><?php echo $row['phone'];?></td>
                                                    <td><?php echo $row['expreance'];?> Years</td>
                                                    <td>
                                                        <?php
                                                        $status = $row['status'];
                                                        if (($status) == '0'){?>
                                                            <a href="trainer_add.php?status=<?php echo $row['apply_job_id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Select')">Not Selected</a>
                                                            <?php
                                                        }
                                                        if (($status) == '1'){?>
                                                            <a class="btn btn-success text-white">Selected</a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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


