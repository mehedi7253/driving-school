<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 11:03 AM
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
                        <li class="active">Payment System</li>
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
                            <h3 class="text-center">Online Payment</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-2 col-sm-12 float-lefto">

                            </div>
                            <div class="col-md-8 col-sm-12 mt-3 float-left">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-center mt-2">To Pay By Credit Card/Bacnk Account Please Fill Out The Fields Bellow </p>

                                        <h4>
                                            <?php
                                                //get package data
                                                if (isset($_GET['payment']))
                                                {
                                                    $packa_id = $_GET['payment'];

                                                    $sql = "SELECT * FROM package, enroll_student WHERE
                                                            enroll_student.package_id = package.package_id AND 
                                                            enroll_student.enroll_id = $packa_id";
                                                    $res = mysqli_query($connect, $sql);

                                                    $data = mysqli_fetch_assoc($res);
                                                }
                                                if (isset($_POST['payment']))
                                                {
                                                    $enroll_id       = $_POST['enroll_id'];
                                                    $student_id      = $_POST['student_id'];
                                                    $package_id      = $_POST['package_id'];
                                                    $price           = $_POST['price'];
                                                    $account_holder  = $_POST['account_holder'];
                                                    $account_number  = $_POST['account_number'];
                                                    $invoice_number = (rand(10,1000000));

                                                    if ($account_holder == ''){
                                                        echo "<span class='text-danger'>Please Enter Account Holder Name</span><br/>";
                                                    }elseif ($account_number == ''){
                                                        echo "<span class='text-danger'>Please Enter Account Number</span><br/>";
                                                    }else{

                                                        $payment = "INSERT INTO invoice (student_id, package_id, price, account_holder, account_number, invoice_number, enroll_id) VALUES ('$student_id', '$package_id', '$price', '$account_holder', '$account_number', '$invoice_number', '$enroll_id')";
                                                        $res_paym = mysqli_query($connect, $payment);

                                                        $_SESSION['success'] = 'Payment Successful';
                                                        echo "<script>document.location.href='next_payment.php?pay=$packa_id'</script>";
                                                    }
                                                }
                                            ?>
                                        </h4>
                                        <div class="mt-5">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <input name="enroll_id"  hidden value="<?php echo $data['enroll_id'];?>">
                                                    <input name="student_id" hidden value="<?php echo $userdata['id'];?>">
                                                    <input name="package_id" hidden value="<?php echo $data['package_id'];?>">
                                                    <input name="price" hidden  value="<?php echo $data['price'];?>">

                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="text" class="form-control" name="account_holder" placeholder="Account Holder Name">
                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="text" class="form-control" name="account_number" placeholder="Acount Number">
                                                </div>
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="submit" name="payment" class="btn btn-success col-md-5" value="Next">
                                                    <a href="payment_now.php" type="reset" class="btn btn-danger col-md-5">Cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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


