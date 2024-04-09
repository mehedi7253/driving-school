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
                        <li class="active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3 mb-5">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                   <div class="col-md-4 col-sm-12 float-left">
                       <div class="card mt-2">
                           <div class="card-body">
                               <img src="../images/<?php echo $userdata['image']?>" class="img-fluid" style="height: 200px; width: 100%"><br/>
                               <p class="mt-3 text-capitalize text-dark text-center"><?php echo $userdata['first_name'].' '.$userdata['last_name'];?></p>
                           </div>
                       </div>
                   </div>
                    <div class="col-md-8 col-sm-12 float-left">
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">Name <span class="ml-2">:</span>  <?php echo $userdata['first_name'].' '.$userdata['last_name'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Email <span class="ml-3">:</span>  <?php echo $userdata['email'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">Phone <span class="ml-2">:</span>  <?php echo $userdata['phone'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">Post <span class="ml-4">:</span>  <?php echo $userdata['police'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">City <span class="ml-4">:</span>  <?php echo $userdata['city'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">Post Code <span class="ml-1">:</span>  <?php echo $userdata['postal'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">Full Address <span class="ml-2">:</span> <?php echo $userdata['police'].', '.$userdata['postal'].', '.$userdata['city'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">Birth Date <span class="ml-2">:</span>  <?php echo date('d - M - Y', strtotime($userdata['date_of_birth']))?></label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-capitalize">Gender <span class="ml-2">:</span> <?php echo $userdata['gender'];?></label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-info float-right" href="update_profile.php">Update Profile</a>
                </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
    <?php include "layouts/script.php";?>

</body>
</html>



