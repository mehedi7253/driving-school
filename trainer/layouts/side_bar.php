<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 7:31 PM
 */
?>
<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href=""><?php echo $userdata['first_name'].' '.$userdata['last_name'];?></a>
<!--        <a class="navbar-brand hidden" href=""><img src="front/images/logo2.png" alt="Logo"></a>-->
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href=""> <i class="menu-icon fa fa-dashboard"></i>Trainer Dashboard </a>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-user" style="color: #007bff;"></i>
                    My Profile
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-user" style="color: yellow;"></i><a href="index.php">Profile</a></li>
                    <li><i class="fa fa-edit" style="color: blue;"></i><a href="update_profile.php">Update Profile</a></li>
                    <li><i class="fa fa-lock" style="color: #e4606d;"></i><a href="change_pass.php">Change Password</a></li>
                    <li><i class="fa fa-photo" style="color: #007bff;"></i><a href="change_pic.php">Change Profile Picture</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-calendar" style="color: yellow;"></i>
                    Attendance
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-lock" style="color: #e4606d;"></i><a href="take_attendance.php">Take Attendance</a></li>
                    <li><i class="fa fa-photo" style="color: #007bff;"></i><a href="manage_attendance.php">View Atendance</a></li>
                </ul>
            </li>

            <li class="active">
                <a href="enroll_student.php"> <i class="menu-icon fa fa-users" style="color: white"></i>Enrolled Student </a>
            </li>

            <li class="active">
                <a href="track.php"> <i class="menu-icon fa fa-cab" style="color: #e4606d"></i>Update Tracking Status </a>
            </li>
            <li class="active">
                <a href="schedule.php"> <i class="menu-icon fa fa-calendar" style="color: yellow"></i>Schedule</a>
            </li>

        </ul>
    </div>
</nav>
