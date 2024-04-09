<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 11:22 AM
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
                        <li class="active">Withdraw Application</li>
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
                            <h3>Your Application List</h3>
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
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Apllication Title</th>
                                            <th>Application</th>
                                            <th>Status</th>
                                            <th>Withdraw</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                            // GET ALL APPLICATION
                                            $sql = "SELECT * FROM application_package WHERE user_id = $userdata[id]";
                                            $res = mysqli_query($connect, $sql);

                                            $i = 1;
                                            while ($application = mysqli_fetch_assoc($res)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $application['title'];?></td>
                                                    <td>
                                                        <a href='#description' data-toggle='modal' class='btn btn-info desc' data-id='<?php echo $application['application_id'];?>'><i class='fa fa-eye'></i> View</a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = $application['app_status'];
                                                            if (($status) == '0'){?>
                                                                <button class="btn btn-danger text-white">Pending</button>
                                                                <?php
                                                            }
                                                            if (($status) == '1'){?>
                                                                <button class="btn btn-success text-white">Received</button>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($application['app_status'] == 0){

                                                                echo "<a href='delete.php?withdraw=$application[application_id]' class='btn btn-danger text-white'>Wihdraw</a>";
                                                            }else{
                                                                echo "<a class='btn btn-success disabled text-white'>Received</a>";
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




<div class="modal fade" id="description" tabindex="-1" role="dialog" aria-labelledby="formModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal"> Your Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark ml-4" id="desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).on('click', '.desc', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
    });


    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'view_desc.php',
            data: {application_id:id},
            dataType: 'json',
            success: function(response){
                $('.application_id').val(response.application_id);
                $('#desc').html(response.application);

            }
        });
    }
</script>
