<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 6:15 PM
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
                        <li class="active">Enroll Student List</li>
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
                            <h3>All Enroll Student List <a href="enrrol_student.php" class="btn btn-info float-right"> <i class="fa fa-plus"></i> Enroll Student</a></h3>
                        </div>
                        <div class="card-body">
                            <?php
                                //get all Enroll Student
                                $sql = "SELECT * FROM enroll_student, users, package WHERE enroll_student.package_id = package.package_id AND enroll_student.student_id = users.id";
                                $res = mysqli_query($connect, $sql);
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="bootstrap-data-table">
                                    <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Package</th>
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
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['package_name'];?></td>
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


