<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 6:25 PM
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
                        <li class="active">Student Application List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Student Application List</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            //get all trainers
                            $sql = "SELECT * FROM application_package, users, package WHERE application_package.package_id = package.package_id AND application_package.user_id = users.id";
                            $res = mysqli_query($connect, $sql);
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="bootstrap-data-table">
                                    <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Package</th>
                                        <th>Application</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $row['id'];?></td>
                                            <td class="text-capitalize"><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                            <td><?php echo $row['title'];?></td>
                                            <td><?php echo $row['package_name'];?></td>
                                            <td><?php echo $row['application'];?></td>
                                            <td>
                                                <?php
                                                    $status = $row['app_status'];
                                                    if (($status) == '0'){?>
                                                        <a href="application_pack.php?status=<?php echo $row['application_id'];?>" class="btn btn-danger">Pending</a>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <a href="application_pack.php?status=<?php echo $row['application_id'];?>" class="btn btn-success">Received</a>
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
    </div> <!-- .content -->

</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include "layouts/script.php";?>

</body>
</html>



