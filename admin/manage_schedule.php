<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/21/2020
 * Time: 11:15 AM
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
                        <li class="active">Manage Schedule</li>
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
                            <h3 class="text-center">Manage Schedule</h3>
                        </div>
                        <div class="card-body">
                            <?php
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
                            if (isset($_POST['search']))
                            {
                                $searchKey = $_POST['src'];
                                $sql_s = "SELECT * FROM schedule, package WHERE schedule.package_id = package.package_id AND schedule.package_id = '$searchKey'";
                                $res_s = mysqli_query($connect, $sql_s);

                                $rows = $res_s->num_rows;
                            }
                            ?>
                            <form action="" method="post">
                                <div class="form-group input-group col-md-4">
                                    <select class="form-control" name="src">
                                        <?php
                                        $package = "SELECT * FROM package";
                                        $res     = mysqli_query($connect, $package);

                                        echo "<option>-------Select One---------</option>";
                                        while ($pack = mysqli_fetch_assoc($res)){?>
                                            <option value="<?php echo $pack['package_id'];?>"><?php echo $pack['package_name'];?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <input type="submit" class="btn btn-info ml-2" name="search" value="Submit">
                                </div>
                            </form>


                            <?php
                            if (isset($_POST['search'])== true) {
                                if ($rows > 0) {
                                    while ($row = mysqli_fetch_assoc($res_s)) {
                                        ?>
                                        <div class="col-md-12 col-sm-12 mt-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="text-center"><?php echo $row['package_name']; ?></h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th>SAT</th>
                                                                <th>SUN</th>
                                                                <th>MON</th>
                                                                <th>TUES</th>
                                                                <th>WED</th>
                                                                <th>THURS</th>
                                                                <th>FRI</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr class="text-center">
                                                                <td><?php echo $row['sat']; ?></td>
                                                                <td><?php echo $row['sun']; ?></td>
                                                                <td><?php echo $row['mon']; ?></td>
                                                                <td><?php echo $row['tue']; ?></td>
                                                                <td><?php echo $row['wed']; ?></td>
                                                                <td><?php echo $row['thu']; ?></td>
                                                                <td><?php echo $row['fri']; ?></td>
                                                                <td>
                                                                    <a href="delete.php?schedule=<?php echo $row['schedule_id']; ?>"
                                                                       class="btn btn-danger"><i
                                                                            class="fa fa-trash"></i>
                                                                        Delete</a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }
                            }else{

                            }
                            ?>
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



