<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/28/2020
 * Time: 9:09 PM
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
                        <li class="active">Add Trainer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2> Add Cost <a href="view_cost.php" class="btn btn-primary float-right"><i class="fa fa-eye"></i> View Cost Benefit Analysis</a></h2>
                    </div>
                    <div class="card-body" style="background-color: #F7F7F7">
                        <?php
                            if (isset($_POST['btn']))
                            {
                                $month   = $_POST['month'];
                                $amount  = $_POST['amount'];
                                $reason  = $_POST['reason'];

                                if ($month == ''){
                                    $_SESSION['month'] = 'Select Month';
                                }elseif ($amount == ''){
                                    $_SESSION['amount'] = 'Please Enter Amount';
                                }elseif ($reason == ''){
                                    $_SESSION['reason'] = 'Please Enter Cost Reason';
                                }else{
                                    $sql = "INSERT INTO cost_benifit (month, amount, reason) VALUES ('$month', '$amount', '$reason')";
                                    $res = mysqli_query($connect, $sql);

                                    if ($res){
                                        $_SESSION['success'] = 'Cost Added Successful';
                                    }else{
                                        $_SESSION['error'] = 'Cost Added Failed';
                                    }
                                }
                            }
                        ?>

                        <?php
                            if(isset($_SESSION['month'])){
                                echo "
                                        <div class='alert alert-danger alert-dismissible' id='month' style='background-color: red; color: white'>
                                         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['month']."
                                        </div>
                                                ";
                                unset($_SESSION['month']);
                            }
                            if(isset($_SESSION['amount'])){
                                echo "
                                            <div class='alert alert-danger alert-dismissible' id='amount' style='background-color: red; color: white'>
                                             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['amount']."
                                            </div>
                                                    ";
                                unset($_SESSION['amount']);
                            }
                            if(isset($_SESSION['reason'])){
                                echo "
                                            <div class='alert alert-danger alert-dismissible' id='reason' style='background-color: red; color: white'>
                                             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['reason']."
                                            </div>
                                                    ";
                                unset($_SESSION['reason']);
                            }
                            if(isset($_SESSION['error'])){
                                echo "
                                        <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                           <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['error']."
                                        </div>
                                        ";
                                unset($_SESSION['error']);
                            }


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
                        <form action="" method="post">
                            <div class="form-group">
                                <label class="font-weight-bold">Select Month <sup class="text-danger">*</sup></label>
                                <select name="month" class="form-control">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Amount <sup class="text-danger">*</sup></label>
                                <input type="text" name="amount" placeholder="Enter Amount" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Cost Reason <sup class="text-danger">*</sup></label>
                                <input type="text" name="reason" placeholder="Enter Cost Reason" class="form-control">
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="submit" name="btn" class="btn btn-success col-4 btn-block">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="trainer_add.php" class="float-right  btn btn-info">Back</a>
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
<script>
    //validation message
    $(function() {
        setTimeout(function() { $("#month").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#amount").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#reason").fadeOut(1500); }, 3000)
    })

</script>


