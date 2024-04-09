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
                    <h1> Admin Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <?php
                  $today_date = date('Y-m-d');

                  $live = "SELECT date, COUNT(date) AS Live FROM track_trainer WHERE date = '$today_date'";
                  $res_l = mysqli_query($connect, $live);

                  $live_row = mysqli_fetch_assoc($res_l);
                ?>
                <div class="card-header">
                    <h3>Today Live Tracking Trainer <sup class="text-danger"><?php echo $live_row['Live'];?> Package Training IS Live Today</sup><span class="float-right"><?php echo $today_date;?></span></h3>
                </div>
                <div class="card-body">
                    <?php
                        $track = "SELECT * FROM track_trainer, users, package WHERE 
                                track_trainer.trainer_id = users.id AND
                                track_trainer.package_id = package.package_id AND 
                                track_trainer.date = '$today_date'";
                        $res = mysqli_query($connect, $track);
                     ?>

                    <?php while ($row = mysqli_fetch_assoc($res)){?>
                        <div class="col-md-6 col-sm-12 float-left mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo $row['package_name'];?>  <span class="float-right text-capitalize">By <?php echo $row['first_name'].' '.$row['last_name'];?></span></h5>
                                </div>
                                <div class="card-body">

                                    <?php
                                    $status = $row['process'];

                                    if ($status == '1'){
                                        echo '<button class="btn btn-primary col-md-6 float-left">Training Is On Going</button>';
                                    }elseif ($status == '2'){
                                        echo '<button class="btn btn-primary col-md-6 float-left">Training Is On Going</button>';
                                    }

                                    if ($status == '1'){
                                        echo '<button class="btn btn-success col-md-6 float-left">Training Is On Going</button>';
                                    }elseif($status == '2'){
                                        echo '<button class="btn btn-danger col-md-6 float-left">Training Is Complete</button>';
                                    }
                                    ?>



                                    <br/>
                                    <div class="mt-5"></div>
                                    <span class="font-weight-bold"> Start Time : </span> <?php  echo $row['time']?><br/><br/>
                                    <span class="font-weight-bold"> End Time : </span> <?php echo $row['end_time']?></span><br/>


                                </div>
                            </div>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
    <?php include "layouts/script.php";?>

</body>
</html>



