<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 7/8/2020
 * Time: 3:27 PM
 */

    include '../php/db_connect.php';


    $q = intval($_GET['q']);
    $sql="SELECT * FROM package, enroll_student, users WHERE 
            enroll_student.student_id = users.id AND 
            enroll_student.package_id = package.package_id AND 
            package.package_id = '".$q."'";
    $result = mysqli_query($connect,$sql);

?>


<form action="attendance.php" method="post">

    <div class="form-group">
        <label>Date</label>
        <input type="date" name="date" class="form-control">
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="tableExport" style="width:100%;">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Attendance</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            while ($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td> <input type="text" hidden name="package_id[]" value="<?php echo $q;?>">
                        <input type="text" hidden name="student_id[]" value="<?php echo $row['id'];?>">
                        <?php echo $row['student_id'];?>
                    </td>
                    <td class="text-capitalize"><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></td>
                    <td>
                        <input type="checkbox" name="status[]" value="Present"> Present
                        <input type="checkbox" name="status[]" value="Absent"> Absent
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div class="form-group">
        <input type="submit" name="attnd_btn" class="btn btn-success" value="Submit">
    </div>
</form>
