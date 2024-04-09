<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 3:51 PM
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
                        <li class="active">Student Attendance List</li>
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
                            <h3 class="text-center">Student Attendance</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_POST['search']))
                            {
                                $searchKey = $_POST['src'];
                                $sql_s = "SELECT users.id, users.first_name, users.last_name, package.package_id, package.package_name, attendance.attendance_id, attendance.student_id, attendance.package_id, attendance.status AS atten_sts, attendance.date FROM
                                                 attendance, users, package WHERE  
                                                 attendance.student_id = users.id AND 
                                                 attendance.package_id = package.package_id AND
                                                 attendance.package_id = '$searchKey'";

                                $res_s = mysqli_query($connect, $sql_s);

                                $rows = $res_s->num_rows;

                            }
                            ?>
                            <form action="" method="post">
                                <div class="form-group input-group col-md-4">
                                    <select name="src" class="form-control">
                                        <?php
                                            $package = "SELECT * FROM package";
                                            $res     = mysqli_query($connect, $package);
                                        ?>
                                            <option>----Select One--------</option>
                                        <?php
                                            while ($package_get = mysqli_fetch_assoc($res)){?>
                                                <option value="<?php echo $package_get['package_id'];?>"><?php echo $package_get['package_name'];?></option>
                                        <?php }?>
                                    </select>
                                    <input type="submit" class="btn btn-info ml-2" name="search" value="Submit">
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="bootstrap-data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Studnet ID</th>
                                        <th>Name</th>
                                        <th>Package</th>
                                        <th>Attendance</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_POST['search'])== true) {
                                        if ($rows > 0) {
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($res_s)) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['student_id']?></td>
                                                    <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                                    <td><?php echo $row['package_name']; ?></td>
                                                    <td><?php echo $row['atten_sts']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                </tr>
                                            <?php }
                                        }
                                    }else{

                                    }
                                    ?>
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



