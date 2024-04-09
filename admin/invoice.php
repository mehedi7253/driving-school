<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 3:17 PM
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
                        <li class="active">Payment Invoice</li>
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
                        <div class="card-header" >
                            <h4>Your Invoice</h4>
                            <?php
                            if (isset($_GET['invoice'])){
                                $invoice = $_GET['invoice'];

                                $sql1 = "SELECT * FROM invoice, users WHERE invoice.student_id = users.id AND invoice_number = '$invoice'"; // select invoice by user id
                                $res1 = mysqli_query($connect, $sql1); // connect with query and database
                                $data1 = mysqli_fetch_assoc($res1);

                            }
                            ?>
                        </div>
                        <div class="card-body" id="mainFrame">
                            <div class="col-md-12">
                                <div class="invoice-title">
                                    <div class="invoice-number font-weight-bold">Invoice Number:  #<?php echo $data1['invoice_number'];?>
                                        <span class="float-right">
                                            <?php
                                            $status = $data1['payment_status'];
                                            if (($status) == '0'){?>
                                                <span class="text-success font-weight-bold">Payment Received</span>
                                                <?php
                                            }
                                            if (($status) == '1'){?>
                                                <span class="text-danger font-weight-bold">Pending</span>
                                                <?php
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            <span class="text-capitalize"><?php echo $data1['first_name']. ' '.$data1['last_name'];?></span><br>
                                            <?php echo $data1['postal'].', '.$data1['police'];?> ,<?php echo $data1['city'];?><br>
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Payment Date:</strong><br>
                                            <?php echo $data1['pament_date'];?><br><br><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            <?php echo $data1['payment_by'];?><br>
                                            <strong>Acoount Holder:</strong><br>
                                            <span class="text-capitalize"><?php echo $data1['account_holder'];?></span><br>

                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Account Number:</strong><br>
                                            <?php echo $data1['account_number'];?><br><br><br>
                                        </address>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">Booking Summary</div>
                                        <p class="section-lead">All items here cannot be deleted.</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-md">
                                                <tr>
                                                    <th class="text-center">Package</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Due</th>
                                                </tr>
                                                <?php
                                                $sql = "SELECT * FROM  invoice, package WHERE invoice.package_id = package.package_id AND invoice.invoice_number = '$invoice'"; // select user information and view invoice

                                                $res = mysqli_query($connect, $sql); // connect with query and database
                                                $i =1;
                                                while ($row = mysqli_fetch_assoc($res)){?>
                                                    <tr class="text-center">
                                                        <td><?php echo $row['package_name'];?></td>
                                                        <td class="text-center"><?php echo number_format($row['price'], '2');?> T.K</td>
                                                        <td>
                                                            <?php
                                                            $pro_price = $row['price']; // total price
                                                            $pay_price = $row['pay_able']; // totatl payble

                                                            $total_price = $pro_price - $pay_price; // due amount
                                                            echo number_format($total_price,2 ); // due amount
                                                            ?> T.K
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-md-right">
                                <button class="btn btn-warning btn-icon icon-left" type="pss" id="prntPSS"><i class="fa fa-print"></i> Print</button>
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
<script type="application/javascript">
    // print invoice
    $(document).ready(function () {

        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });

    });
</script>
</body>
</html>



