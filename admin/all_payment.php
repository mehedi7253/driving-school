<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/20/2020
 * Time: 3:59 PM
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
                        <li class="active">Payment List</li>
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
                            <h3 class="text-center">Student Payment List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="bootstrap-data-table">
                                    <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Package Name</th>
                                        <th>Price</th>
                                        <th>Invoice</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $sql_get =  "SELECT * FROM invoice, users, package WHERE 
                                                invoice.student_id = users.id AND
                                                invoice.package_id = package.package_id";
                                    $res_get = mysqli_query($connect, $sql_get); // select payment data from invoice
                                    $i = 1;
                                    while ($payment = mysqli_fetch_assoc($res_get)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $payment['id'];?></td>
                                            <td><?php echo $payment['first_name'].' '.$payment['last_name'];?></td>
                                            <td><?php echo $payment['package_name'];?></td>
                                            <td><?php echo number_format($payment['price'],2);?>T.K</td>
                                            <td>
                                                <a href="invoice.php?invoice=<?php echo $payment['invoice_number'];?>" class="text-info"><?php echo $payment['invoice_number'];?></a>
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



