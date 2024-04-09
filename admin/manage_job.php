<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 12:13 PM
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
                        <li class="active">Mnage Job Post</li>
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
                            <h3> All Job Post's <a href="add_job.php" class="btn btn-info float-right"> <i class="fa fa-plus"></i> Add New Job Post</a></h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_SESSION['error'])){
                                echo "
                                    <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <span><i class='fas fa-exclamation-triangle'> </i></span>  ".$_SESSION['error']."
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
                            <?php
                            //get all package
                            $sql = "SELECT * FROM job_posts";
                            $res = mysqli_query($connect, $sql);
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="bootstrap-data-table">
                                    <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Requirments</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td class="text-capitalize"><?php echo $row['title'];?></td>
                                            <td><?php echo date('M - d - Y', strtotime($row['post_date']));?></td>
                                            <td><?php echo date('M - d - Y', strtotime($row['end_date']));?></td>
                                            <td>
                                                <a href='#description' data-toggle='modal' class='btn btn-info desc' data-id='<?php echo $row['job_post_id'];?>'><i class='fa fa-eye'></i> View</a>
                                            </td>
                                            <td>
                                                <?php
                                                $status = $row['status'];
                                                if (($status) == '0'){?>
                                                    <a href="job_post_sts.php?status=<?php echo $row['job_post_id'];?>" class="btn btn-success" onclick="return confirm('Are You Sure To Un-publish')">Published</a>
                                                    <?php
                                                }
                                                if (($status) == '1'){?>
                                                    <a href="job_post_sts.php?status=<?php echo $row['job_post_id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Published')">Publish Now</a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="delete.php?job_post=<?php echo $row['job_post_id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete..!!')"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php }?>
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
                <h5 class="modal-title" id="formModal"> Job Requirement's</h5>
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
            data: {job_post_id :id},
            dataType: 'json',
            success: function(response){
                $('.job_post_id ').val(response.job_post_id );
                $('#desc').html(response.description);

            }
        });
    }
</script>

