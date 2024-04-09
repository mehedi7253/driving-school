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
                                            if (isset($_GET['pay']))
                                            {
                                                $packa_id = $_GET['pay'];

                                                $sql = "SELECT * FROM invoice, enroll_student WHERE
                                                        invoice.enroll_id = enroll_student.enroll_id AND 
                                                        invoice.enroll_id = $packa_id";
                                                $res = mysqli_query($connect, $sql);

                                                $data = mysqli_fetch_assoc($res);
                                            }
                                            if (isset($_POST['payment']))
                                            {
                                                $pay_able= $_POST['pay_able'];
                                                $create = @date('Y-m-d H:i:s');

                                                $sql_next = "UPDATE invoice SET pay_able = '$pay_able', payment_by = 'Bank', pament_date = '$create' WHERE enroll_id = $packa_id";
                                                $res = mysqli_query($connect, $sql_next);

                                                $_SESSION['success'] = 'Payment Done';
                                                echo "<script>document.location.href='payment.php'</script>";

                                            }

                                            if (isset($_POST['cancel'])){

                                                $sql_up = "DELETE FROM invoice WHERE enroll_id = $packa_id"; // cancel payment
                                                $res    = mysqli_query($connect, $sql_up); // connect with query and database

                                                $_SESSION['error'] = 'You Have Cancel You payment';
                                                echo "<script>document.location.href='payment.php?'</script>";
                                            }
                                            ?>
                                        </h4>
                                        <div class="mt-2">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <input name="pay_able" hidden value="<?php echo $data['price'];?>">
                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="text" disabled class="form-control" name="account_holder" value="<?php echo number_format($data['price'],2);?>">
                                                </div>
                                                <div class="form-group">
                                                    <label></label>
                                                    <input type="submit" name="payment" class="btn btn-success col-md-5" value="Pay Now">
                                                    <input type="submit" name="cancel" class="btn btn-danger col-md-5" value="Cancel">
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


