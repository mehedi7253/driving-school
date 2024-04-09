<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 9:57 PM
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
                        <li class="active">Update Track Package</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Live Track Training</h3>
                            <?php
                                $sql = "SELECT * FROM package, users WHERE package.trainer_id = users.id AND package.trainer_id = $userdata[id]";
                                $res = mysqli_query($connect, $sql);

                                $data = mysqli_fetch_assoc($res);


                            ?>
                        </div>
                        <div class="card-body">
                            <h2>
                                <?php
                                if (isset($_POST['btn']))
                                {
                                    $trainer_id  = $_POST['trainer_id'];
                                    $package_id  = $_POST['package_id'];
//                                    $date        = $_POST['date'];
                                    $time        = $_POST['time'];

                                    $date = date('Y-m-d');

                                    if ($time == ''){
                                        echo "<span class='text-danger'>Please Select Time</span><br/>";
                                    }


                                        $sql_track = "INSERT INTO track_trainer (trainer_id, package_id, date, time, process) VALUES ('$trainer_id', '$package_id', '$date', '$time', '1')";
                                        $res_track = mysqli_query($connect, $sql_track);

                                        echo "<script>document.location.href='next_track.php?track=$date'</script>";
//                                        echo "<span class='text-success'>You Have Successfully Strated Your Training Session</span>";

                                }
                                ?>
                            </h2>

                            <form action="" method="post">
                                <div>
                                    <input name="trainer_id" hidden value="<?php echo $data['trainer_id'];?>">
                                    <input name="package_id" hidden value="<?php echo $data['package_id'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Select Time</label>
                                    <input type="time" name="time" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="btn"  class="btn btn-success col-md-4" value="Start Training">
                                </div>
                            </form>
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



