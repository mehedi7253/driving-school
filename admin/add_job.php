<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 12:12 PM
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
                        <li class="active">Job Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Job Post</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_POST['btn']))
                                {
                                    $title     = $_POST['title'];
                                    $post_date = $_POST['post_date'];
                                    $end_date  = $_POST['end_date'];
                                    $vacancy   = $_POST['vacancy'];
                                    $descirption = $_POST['description'];

                                    if ($title == ''){
                                        $_SESSION['title'] = 'Please Enter Job Title';
                                    }elseif ($post_date == ''){
                                        $_SESSION['post_date'] = 'Please Enter Application Start Date';
                                    }elseif ($end_date == ''){
                                        $_SESSION['post_end'] = 'Please Enter Application End Date';
                                    }elseif ($vacancy == '') {
                                        $_SESSION['vacancy'] = 'Please Enter Job Vacancy';
                                    }elseif ($descirption == ''){
                                        $_SESSION['desc'] = 'Please Enter Job Requirements';
                                    }else{

                                        //add job post
//                                        $job_post = "INSERT INTO job_posts (title, post_date, )"
                                        $job_post = "INSERT INTO job_posts (title, post_date, end_date, vacancy, description, status) VALUES ('$title', '$post_date', '$end_date', '$vacancy', '$descirption', '0')";
                                        $res_job = mysqli_query($connect, $job_post);

                                        if ($res_job){
                                            $_SESSION['success'] = 'Job Post Create Successful';
                                        }else{
                                            $_SESSION['error'] = 'Job Post Create Failed..!!';
                                        }
                                    }
                                }
                            ?>
                            <?php
                            if(isset($_SESSION['title'])){
                                echo "
                                    <div class='alert alert-danger alert-dismissible' id='title' style='background-color: red; color: white'>
                                     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['title']."
                                    </div>
                                            ";
                                unset($_SESSION['title']);
                            }
                            if(isset($_SESSION['post_date'])){
                                echo "
                                    <div class='alert alert-danger alert-dismissible' id='post_date' style='background-color: red; color: white'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['post_date']."
                                    </div>
                                    ";
                                unset($_SESSION['post_date']);
                            }
                            if(isset($_SESSION['post_end'])){
                                echo "
                                    <div class='alert alert-danger alert-dismissible' id='post_end' style='background-color: red; color: white'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                      <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['post_end']."
                                    </div>
                                    ";
                                unset($_SESSION['post_end']);
                            }
                            if(isset($_SESSION['vacancy'])){
                                echo "
                                    <div class='alert alert-danger alert-dismissible' id='vacancy' style='background-color: red; color: white'>
                                         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['vacancy']."
                                    </div>
                                ";
                                unset($_SESSION['vacancy']);
                            }
                            if(isset($_SESSION['desc'])){
                                echo "
                                        <div class='alert alert-danger alert-dismissible' id='desc' style='background-color: red; color: white'>
                                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                              <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['desc']."
                                        </div>
                                    ";
                                unset($_SESSION['desc']);
                            }
                            if(isset($_SESSION['error'])){
                                echo "
                                    <div class='alert alert-danger alert-dismissible' id='error' style='background-color: red; color: white'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                       <span><i class='fa fa-exclamation-triangle'> </i></span>  ".$_SESSION['error']."
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
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="font-weight-bold">JOb Title <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="text" name="title" placeholder="Enter Job Title" class="form-control" value="<?php if ($_POST){
                                        echo $_POST['title'];
                                    }?>">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Application Start Date <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="date" name="post_date" class="form-control"  value="<?php if ($_POST){
                                        echo $_POST['post_date'];
                                    }?>">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Application End Date <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="date" name="end_date" class="form-control"  value="<?php if ($_POST){
                                        echo $_POST['end_date'];
                                    }?>">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Vacancy <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="number" name="vacancy" placeholder="Enter Number Of Vacancy" class="form-control"   value="<?php if ($_POST){
                                        echo $_POST['vacancy'];
                                    }?>">
                                </div>
                                 <div class="form-group"
                                     <label class="font-weight-bold">Job Requirement <sup class="text-danger font-weight-bold">*</sup></label>
                                      <textarea name="description" id="application" placeholder="Enter Job Requirement" class="form-control"></textarea>
                                  </div>
                                <div class="form-group">
                                    <input type="submit" name="btn" value="Post Job" class="btn btn-success col-md-5">
                                </div>

                            </form>
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



<script>
    //validation message
    $(function() {
        setTimeout(function() { $("#title").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#post_date").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#post_end").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#vacancy").fadeOut(1500); }, 3000)
    })
    $(function() {
        setTimeout(function() { $("#desc").fadeOut(1500); }, 5000)
    })

</script>