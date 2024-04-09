<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 7:57 PM
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
                        <?php
                        if (isset($_GET['profile'])){
                            $id = $_GET['profile'];

                            $q = "SELECT * FROM users WHERE id = $id";

                            $r = mysqli_query($connect, $q);
                            $data = mysqli_fetch_assoc($r);

                        }
                        ?>

                        <li class="active text-capitalize"><?php echo $data['role'];?> Profile</li>
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
                        <div class="card-body">
                            <div class="col-md-4 col-sm-12 float-left">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        <center class="m-t-30"> <img src="../images/<?php echo $data['image'];?>" title="<?php echo $data['first_name'];?>" width="100%" height="200" />
                                            <h4 class="card-title m-t-10 text-capitalize mt-3"><?php echo $data['first_name'];?> <span><?php echo $data['last_name'];?></span></h4><br/>
                                            <?php
                                            $status = $data['status'];
                                            if (($status) == '0'){?>
                                                <a href="user_active.php?status=<?php echo $data['id'];?>" class="btn btn-success" onclick="return confirm('Are You Sure To In-Active User')">Active User</a>
                                                <?php
                                            }
                                            if (($status) == '1'){?>
                                                <a href="user_active.php?status=<?php echo $data['id'];?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Active user')">Inactive User</a>
                                                <?php
                                            }
                                            ?>
                                        </center>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8 col-sm-12 float-left">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Name </th>
                                                <td class="font-weight-bold text-capitalize"><?php echo $data['first_name'].' '.$data['last_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email </th>
                                                <td class="font-weight-bold"><?php echo $data['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender  </th>
                                                <td class="font-weight-bold"><?php echo $data['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address  </th>
                                                <td class="font-weight-bold"><?php echo $data['police'].', '.$data['postal'].', '.$data['city'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone </th>
                                                <td class="font-weight-bold"><?php echo $data['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date Of Birth  </th>
                                                <td class="font-weight-bold"><?php echo $data['date_of_birth']; ?></td>
                                            </tr>
                                        </table>
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



