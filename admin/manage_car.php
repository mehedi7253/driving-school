
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
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3> All Vehicle's <a href="add_car.php" class="btn btn-info float-right"> <i class="fa fa-plus"></i> Add New Vehicle</a></h3>
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
                        $sql = "SELECT * FROM car";
                        $res = mysqli_query($connect, $sql);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="bootstrap-data-table">
                                <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Car Number</th>
                                    <th>Details</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td class="text-capitalize"><?php echo $row['car_number'];?></td>
                                        <td><?php echo $row['car_details'];?></td>
                                        <td>
                                            <img src="../images/<?php echo $row['image'];?>" class="img-thumbnail" style="height: 50px; width: 70px">
                                        </td>
                                        <td>
                                            <?php
                                            $status = $row['status'];
                                            if (($status) == '0'){?>
                                                <a href="car_sts.php?status=<?php echo $row['car_id'];?>" class="btn btn-success" onclick="return confirm('Are You Sure To Un-publish')">Published</a>
                                                <?php
                                            }
                                            if (($status) == '1'){?>
                                                <a href="car_sts.php?status=<?php echo $row['car_id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Published')">Publish Now</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="edit_car.php?car=<?php echo $row['car_id'];?>" class="btn btn-primary"> <i class="fa fa-edit"></i> Edit</a> |
                                            <a href="delete.php?car=<?php echo $row['car_id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete..!!')"><i class="fa fa-trash"></i> Delete</a>
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
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include "layouts/script.php";?>

</body>
</html>



