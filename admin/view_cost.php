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
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2> View Cost Benefit Analysis <a href="add_cost.php" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Cost</a></h2>
                    </div>
                    <div class="card-body" style="background-color: #F7F7F7" id="mainFrame">
                        <div class="col-md-4 col-sm-12 float-left">
                           <div class="card">
                               <div class="card-header">
                                   <h3>Total Earn</h3>
                               </div>
                               <div class="card-body">
                                   <div class="mt-5 mb-5">
                                       <h3>
                                           <?php
                                           $total_benefit = "SELECT pay_able, SUM(pay_able) AS Total_benefit FROM invoice";
                                           $benefit       = mysqli_query($connect, $total_benefit);

                                           $res_benfit = mysqli_fetch_assoc($benefit);

                                           echo number_format($res_benfit['Total_benefit'],2).' '.'Taka';
                                           ?>
                                       </h3>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <div class="col-md-8 col-sm-12 float-left">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['search']))
                                    {
                                        $searchKey = $_POST['src'];
                                        $sql_s = "SELECT * FROM cost_benifit WHERE month = '$searchKey'";

                                        $res_s = mysqli_query($connect, $sql_s);

                                        $rows = $res_s->num_rows;
                                    }

                                        $sql_q_2 = "SELECT * FROM cost_benifit";
                                        $res_2   = mysqli_query($connect, $sql_q_2);

                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group input-group col-md-7">
                                            <select name="src" class="form-control">
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
                                            <input type="submit" class="btn btn-info ml-2" name="search" value="Submit">
                                        </div>
                                    </form>


                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Month</th>
                                                    <th>Reason</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_POST['search'])== true) {
                                                    if ($rows > 0) {

                                                        $i = 1;

                                                        while ($row = mysqli_fetch_assoc($res_s)){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $row['month'];?></td>
                                                                <td><?php echo $row['reason'];?></td>
                                                                <td><?php echo number_format($row['amount'],2);?> T.K</td>
                                                            </tr>
                                                        <?php }
                                                    }else{
                                                        echo "<span class='text-danger'>No Data Found</span>";
                                                    }
                                                }else{
                                                    $i = 1;

                                                    while ($row_2 = mysqli_fetch_assoc($res_2)){?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $row_2['month'];?></td>
                                                            <td><?php echo $row_2['reason'];?></td>
                                                            <td><?php echo number_format($row_2['amount'],2);?> T.K</td>
                                                        </tr>
                                                    <?php }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td class="border-0">Total Cost</td>
                                                <td class="border-0">
                                                    <?php

                                                        if (isset($_POST['search']) == true){
                                                            $total = "SELECT amount, SUM(amount) AS TotalCost FROM cost_benifit WHERE month = '$searchKey'";
                                                            $res_t = mysqli_query($connect, $total);

                                                            $total_result = mysqli_fetch_assoc($res_t);

                                                            echo number_format($total_result['TotalCost'], 2).' '.'T.K';
                                                        }else{
                                                            $total = "SELECT amount, SUM(amount) AS TotalCost FROM cost_benifit";
                                                            $res_t = mysqli_query($connect, $total);

                                                            $total_result = mysqli_fetch_assoc($res_t);

                                                            echo number_format($total_result['TotalCost'], 2).' '.'T.K';
                                                        }

                                                    ?>
                                                </td>
                                            </tfoot>
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



