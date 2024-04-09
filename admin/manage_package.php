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
                        <li class="active">Pakage List</li>
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
                        <h3> All Package's <a href="add_package.php" class="btn btn-info float-right"> <i class="fa fa-plus"></i> Add New Package</a></h3>
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
                        $sql = "SELECT * FROM package, users WHERE package.trainer_id = users.id";
                        $res = mysqli_query($connect, $sql);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="bootstrap-data-table">
                                <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Package</th>
                                    <th>Trainer</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Description</th>
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
                                        <td class="text-capitalize"><?php echo $row['package_name'];?></td>
                                        <td class="text-capitalize"><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                        <td><?php echo number_format($row['price'], 2);?>T.K</td>
                                        <td><?php echo $row['duration'];?></td>
                                        <td>
                                            <a href='#description' data-toggle='modal' class='btn btn-info desc' data-id='<?php echo $row['package_id'];?>'><i class='fa fa-eye'></i> View</a>
                                        </td>
                                        <td>
                                            <?php
                                            $status = $row['status'];
                                            if (($status) == '0'){?>
                                                <a href="package_publish.php?status=<?php echo $row['package_id'];?>" class="btn btn-success" onclick="return confirm('Are You Sure To Un-publish')">Published</a>
                                                <?php
                                            }
                                            if (($status) == '1'){?>
                                                <a href="package_publish.php?status=<?php echo $row['package_id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Published')">Publish Now</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="edit_package.php?package=<?php echo $row['package_id'];?>" class="btn btn-primary"> <i class="fa fa-edit"></i> Edit</a> |
                                            <a href="delete.php?package=<?php echo $row['package_id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete..!!')"><i class="fa fa-trash"></i> Delete</a>
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
                <h5 class="modal-title" id="formModal"> Package Description</h5>
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
            data: {package_id:id},
            dataType: 'json',
            success: function(response){
                $('.package_id').val(response.package_id);
                $('#desc').html(response.description);

            }
        });
    }
</script>
