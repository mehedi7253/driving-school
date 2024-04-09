<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 9:28 AM
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
                        <li class="active">All Trainer's</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">All Trainer List</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                $trainer    = "SELECT * FROM users, package WHERE package.trainer_id = users.id AND role = 'trainer'";
                                $res_train  = mysqli_query($connect, $trainer);

                            while ($row = mysqli_fetch_assoc($res_train)){?>
                                <div class="col-md-4 col-sm-12 float-left">
                                    <div class="card">
                                        <img src="../images/<?php echo $row['image'];?>" style="height: 200px; width: 100%" class="card-img-top">
                                        <div class="card-body">
                                            <p class="font-weight-bold text-capitalize">Name: <?php echo $row['first_name'].' '.$row['last_name'];?></p>
                                            <p class="font-weight-bold">Email: <?php echo $row['email'];?></p>
                                            <p class="font-weight-bold">Phone: <?php echo $row['phone'];?></p>
                                            <p class="font-weight-bold">Package: <?php echo $row['package_name'];?></p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="profile.php?profile=<?php echo $row['id'];?>" class="btn btn-primary float-right">Full Profile</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
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


