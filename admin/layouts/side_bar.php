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
        <a class="navbar-brand" href="admin_dashboard.php">Admin Panel</a>
        <a class="navbar-brand hidden" href="./"><img src="front/images/logo2.png" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="admin_dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Admin Dashboard </a>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-user-plus" style="color: yellow"></i>
                    Manage Trainer
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-plus" style="color: red"></i><a href="add_trainer_app.php">Add Trainer</a></li>
                    <li><i class="fa fa-edit" style="color: #007bff;"></i><a href="manage_trainer.php">Manage Trainer</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="manage_student.php"> <i class="menu-icon fa fa-users" style="color: #007bff"></i> Manage Student </a>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-cab" style="color: #e4606d"></i>
                    Manage Vehicle
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-plus" style="color: red"></i><a href="add_car.php">Add Vehicle</a></li>
                    <li><i class="fa fa-edit" style="color: #007bff;"></i><a href="manage_car.php">Manage Vehicle</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-shopping-basket" style="color: #007bff;"></i>
                    Manage Packages
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-plus" style="color: red"></i><a href="add_package.php">Add Package</a></li>
                    <li><i class="fa fa-edit" style="color: #007bff;"></i><a href="manage_package.php">Manage Package</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-book" style="color:yellow"></i>
                    Job Post
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-plus" style="color: red"></i><a href="add_job.php">Add Job Post</a></li>
                    <li><i class="fa fa-edit" style="color: #007bff;"></i><a href="manage_job.php">Manage Job Post</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-dollar" style="color: yellow"></i>
                   Cost Benefit
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-plus" style="color: red"></i><a href="add_cost.php">Add Cost</a></li>
                    <li><i class="fa fa-eye" style="color: #007bff;"></i><a href="view_cost.php">View Cost Benefit</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="manage_application.php"> <i class="menu-icon fa fa-file-word-o" style="color: #1c7430;"></i> Job Application List </a>
            </li>

            <li class="active">
                <a href="student_application.php"> <i class="menu-icon fa fa-file-word-o"></i>Student Application List </a>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-user-plus" style="color: #1c7430"></i>
                   Enroll Student In Package
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-plus" style="color: red"></i><a href="enrrol_student.php">Enroll Student</a></li>
                    <li><i class="fa fa-edit" style="color: #007bff;"></i><a href="enroll_list.php">Enroll List</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-calendar"></i>
                    Manage Schedule
                </a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-plus" style="color: red"></i><a href="add_schedule.php">Upload Schedule</a></li>
                    <li><i class="fa fa-edit" style="color: #007bff;"></i><a href="manage_schedule.php">Update Schedule</a></li>
                </ul>
            </li>

            <li class="active">
                <a href="attendance.php"> <i class="menu-icon fa fa-file" style="color: #e4606d;"></i> Student Attendance List</a>
            </li>

            <li class="active">
                <a href="manage_application.php"> <i class="menu-icon fa fa-file-word-o" style="color: #e4606d;"></i>Job Application List </a>
            </li>

            <li class="active">
                <a href="all_payment.php"> <i class="menu-icon fa fa-dollar" style="color: #e4606d;"></i> All Payment</a>
            </li>
            <li class="active">
                <a href="message.php"> <i class="menu-icon fa fa-envelope" style="color: yellow;"></i> Public Message</a>
            </li>
        </ul>
    </div>
</nav>
