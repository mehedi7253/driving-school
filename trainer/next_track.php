<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 10:41 PM
 */
?>
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
    <?php include "layouts/side_bar.php" ?>
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
                                if (isset($_GET['track'])){
                                    $date = $_GET['track'];

                                    $end_process = "SELECT * FROM users, track_trainer WHERE track_trainer.trainer_id = users.id AND track_trainer.date = '$date'";
                                    $res_process = mysqli_query($connect, $end_process);

                                    $data = mysqli_fetch_assoc($res_process);
                                }
                            ?>
                        </div>
                        <div class="card-body">
                            <h2>
                                <?php
                                if (isset($_POST['btn']))
                                {
                                    $time = date('H:i:s');

                                    $track_up = "UPDATE track_trainer SET end_time = '$time', process = '2' WHERE date = '$date' AND trainer_id = '$userdata[id]'";
                                    $res_up   = mysqli_query($connect, $track_up);

                                    echo "<script>document.location.href='next_track.php?track=$date'</script>";
                                }
                                ?>
                            </h2>

                            <div class="">
                                <?php
                                $status = $data['process'];

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
                               <span class="font-weight-bold"> Start Time : </span> <?php  echo $data['time']?><br/><br/>
                                <span class="font-weight-bold"> End Time : </span> <?php echo $data['end_time']?></span><br/>
                            </div>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="btn"  class="btn btn-danger col-md-4 mt-5" value="End Training">
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




