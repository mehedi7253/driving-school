
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
                        <li class="active">Trainer Application </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <?php
                    if (isset($_GET['application'])){
                        $id = $_GET['application'];

                        $sql = "SELECT * FROM apply_job WHERE apply_job_id = $id";
                        $result = mysqli_query($connect, $sql);

                        $data = mysqli_fetch_assoc($result);
                    }

                    ?>

                    <div class="card" id="mainFrame">
                        <div class="card-header">
                            <p>Application ID: <?php echo $data['apply_job_id'];?> <span><img src="../images/logo.JPG" style="70px; width: 70px; border-radius: 50%" class="float-right"></span></p>
                        </div>
                        <div class="card-body">
                            <div class="image ml-3">
                                <img src="../images/<?php echo $data['image'];?>" style="height: 150px; width: 150px">
                            </div>

                            <div class="mt-4">
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>First Name</label>
                                    <input disabled value="<?php echo $data['first_name'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Last Name</label>
                                    <input disabled  value="<?php echo $data['last_name'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Email</label>
                                    <input disabled value="<?php echo $data['email'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Phone Number</label>
                                    <input disabled value="<?php echo $data['phone'];?>" class="form-control">
                                </div>

                                <div class="form-group ml-3">
                                    <label>NID</label>
                                    <input disabled value="<?php echo $data['nid'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Title</label>
                                    <input disabled value="<?php echo $data['title'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Experience</label>
                                    <input disabled value="<?php echo $data['expreance'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Present Address</label>
                                    <textarea disabled class="form-control"><?php echo $data['pres_address'];?></textarea>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Parmanent Address</label>
                                    <textarea disabled class="form-control"><?php echo $data['parm_address'];?></textarea>
                                </div>
                                <div class="form-group ml-3">
                                    <label>Date Of Birth</label>
                                    <input disabled value="<?php echo $data['dob'];?>" class="form-control">
                                </div>
                                <div class="form-group ml-3">
                                    <label>Gender</label>
                                    <input disabled value="<?php echo $data['gender'];?>" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info float-right" type="pss" id="prntPSS"> <i class="fa fa-print" style="color: yellow"></i> Print Application</button>
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