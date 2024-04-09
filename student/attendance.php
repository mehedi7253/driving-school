
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
                        <li class="active">My Attendance List</li>
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
                            <h3 class="text-center">Attendance Lsit</h3>
                        </div>
                        <div class="card-body" id="mainFrame">
                            <?php
                            if (isset($_POST['search']))
                            {
                                $searchKey = $_POST['src'];
                                $sql_s = "SELECT users.id, users.first_name, users.last_name, package.package_id, package.package_name, attendance.attendance_id, attendance.student_id, attendance.package_id, attendance.status AS atten_sts, attendance.date FROM
                                                 attendance, users, package WHERE  
                                                 attendance.student_id = users.id AND 
                                                 attendance.package_id = package.package_id AND
                                                  attendance.student_id = $userdata[id] AND 
                                                 attendance.date = '$searchKey'";

                                $res_s = mysqli_query($connect, $sql_s);

                                $rows = $res_s->num_rows;
                            }

                            $all_attendance = "SELECT users.id, users.first_name, users.last_name, package.package_id, package.package_name, attendance.attendance_id, attendance.student_id, attendance.package_id, attendance.status AS atten_sts, attendance.date FROM
                                                 attendance, users, package WHERE  
                                                 attendance.student_id = users.id AND
                                                  attendance.package_id = package.package_id AND 
                                                  attendance.student_id = $userdata[id]";

                            $res_attendance = mysqli_query($connect, $all_attendance);
                            ?>
                            <form action="" method="post">
                                <div class="form-group input-group col-md-4">
                                    <input type="date" class="form-control" name="src"  value="<?php if($_POST) {
                                        echo $_POST['src'];
                                    } ?>" >
                                    <input type="submit" class="btn btn-info ml-2" name="search" value="Submit">
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Studnet ID</th>
                                        <th>Name</th>
                                        <th>Package</th>
                                        <th>Date</th>
                                        <th>Attendance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_POST['search'])== true) {
                                        if ($rows > 0) {
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($res_s)) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['student_id']?></td>
                                                    <td class="text-capitalize"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                                    <td><?php echo $row['package_name']; ?></td>
                                                    <td><?php echo $row['atten_sts']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                </tr>
                                            <?php }
                                        }
                                    }else{
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($res_attendance)) {?>
                                            <tr class="text-center">
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row['student_id']?></td>
                                                <td class="text-capitalize"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                                <td><?php echo $row['package_name']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['atten_sts']; ?></td>

                                            </tr>
                                        <?php }
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td><span class="float-right">Total Present : </span></td>
                                            <td class="text-center">
                                                <?php
                                                    $sql_present = "SELECT status, COUNT(status) AS Present, student_id FROM attendance WHERE status = 'present' AND student_id = '$userdata[id]'";
                                                    $res_prsent = mysqli_query($connect, $sql_present);
                                                    $row_prsent = mysqli_fetch_assoc($res_prsent);

                                                    echo $row_prsent['Present'].' '.'Days'
                                                ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td><span class="float-right">Total Absent : </span></td>
                                            <td class="text-center">
                                                <?php
                                                $sql_absent = "SELECT status, COUNT(status) AS Absent, student_id FROM attendance WHERE status = 'Absent' AND student_id = '$userdata[id]'";
                                                $res_absent = mysqli_query($connect, $sql_absent);
                                                $row_absent = mysqli_fetch_assoc($res_absent);

                                                echo $row_absent['Absent'].' '.'Days'
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td><span class="float-right">Total Class : </span></td>
                                            <td class="text-center">
                                                <?php
                                                    $sql_class = "SELECT status, COUNT(status) AS TotalClass, student_id FROM attendance WHERE student_id = '$userdata[id]'";
                                                    $res_class = mysqli_query($connect, $sql_class);
                                                    $row_class = mysqli_fetch_assoc($res_class);

                                                    echo $row_class['TotalClass'].' '.'Days'
                                                ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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


