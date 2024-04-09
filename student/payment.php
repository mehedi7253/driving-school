<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 10:34 AM
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
                        <li class="active">Payment History</li>
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
                            <h3 class="text-center">Payment History</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_SESSION['success'])){
                                    echo "
                                        <div class='alert alert-success alert-dismissible'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <h6><i class='icon fa fa-check'></i> Success!</h6>
                                          ".$_SESSION['success']."
                                        </div>
                                          ";
                                    unset($_SESSION['success']);
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
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Package Name</th>
                                            <th>Price</th>
                                            <th>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $sql_get = "SELECT * FROM  users, enroll_student, package WHERE
                                                  enroll_student.student_id = users.id AND 
                                                  enroll_student.package_id = package.package_id AND 
                                                  enroll_student.student_id = '$userdata[id]'";
                                    $res_get = mysqli_query($connect, $sql_get); // select payment data from invoice
                                    $i = 1;
                                    while ($payment = mysqli_fetch_assoc($res_get)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $payment['package_name'];?></td>
                                            <td><?php echo number_format($payment['price'],2);?>T.K</td>
                                            <td>
                                                <?php
                                                $payment_id  = $payment['enroll_id'];

                                                $sql_invoice = "SELECT * FROM invoice, users, enroll_student, package WHERE 
                                                                invoice.student_id = users.id AND
                                                                invoice.package_id = package.package_id AND 
                                                                enroll_student.student_id = users.id AND
                                                                invoice.enroll_id = $payment_id AND 
                                                                invoice.student_id = '$userdata[id]'";
                                                $res_invoice = mysqli_query($connect, $sql_invoice);

                                                $pay_btn = mysqli_fetch_assoc($res_invoice);
                                                ?>

                                                <?php
                                                if ($pay_btn == 0){
                                                    echo '<a href="payment_now.php?payment='.$payment_id.'" class="btn btn-primary">Pay Now</a>';
                                                }else{
                                                    echo '<a href="invoice.php?invoice='.$pay_btn['invoice_number'].'" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Invoice</a>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php }
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



