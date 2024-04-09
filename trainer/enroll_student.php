<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 10:28 PM
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
                        <li class="active">Enrolled Student</li>
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
                            <h3>My Enroll Student List</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            //get all package
                            $sql = "SELECT * FROM users, package, enroll_student WHERE 
                                    enroll_student.student_id = users.id AND
                                    enroll_student.package_id = package.package_id AND
                                    package.trainer_id = '$userdata[id]'";
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
                                        <th>Phone</th>
                                        <th>Package</th>
                                        <th>Image</th>
                                        <th>Profile</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td class="text-center"> <?php echo $row['id'];?></td>
                                            <td class="text-capitalize"><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php echo $row['package_name'];?></td>
                                            <td>
                                                <img src="../images/<?php echo $row['image'];?>" class="img-thumbnail" style="height: 50px; width: 70px">
                                            </td>
                                            <td>
                                                <a href="profile.php?profile=<?php echo $row['id']?>" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
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



