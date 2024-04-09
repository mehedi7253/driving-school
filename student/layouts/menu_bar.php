<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 7:35 PM
 */
?>
<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
    </div>

    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="../images/<?php echo $userdata['image'];?>" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="index.php"><i class="fa fa- user"></i>My Profile</a>
                <a class="nav-link" href="update_profile.php"><i class="fa fa -cog"></i>Settings</a>
                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
            </div>
        </div>
    </div>
</div>

