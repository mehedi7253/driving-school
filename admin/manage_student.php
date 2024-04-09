<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 8:07 PM
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
                    <h1>Admin Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">All Student</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2> All Student's </h2>
                    </div>
                    <div class="card-body">

                        <?php
                        //get all trainers
                        $sql = "SELECT * FROM users WHERE role = 'student'";
                        $res = mysqli_query($connect, $sql);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="bootstrap-data-table">
                                <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Profile</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td class="text-capitalize"><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                        <td><?php echo $row['phone'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td>
                                            <img src="../images/<?php echo $row['image'];?>" style="line-height: 50px; width: 70px;" class="img-thumbnail">
                                        </td>
                                        <td>
                                            <?php
                                            $status = $row['status'];
                                            if (($status) == '0'){?>
                                                <a href="user_active.php?status=<?php echo $row['id'];?>" class="btn btn-success" onclick="return confirm('Are You Sure To In-Active User')">Active User</a>
                                                <?php
                                            }
                                            if (($status) == '1'){?>
                                                <a href="user_active.php?status=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Active user')">Inactive User</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="profile.php?profile=<?php echo $row['id'];?>" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
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



