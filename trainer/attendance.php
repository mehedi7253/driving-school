<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2020
 * Time: 9:33 PM
 */

    include "../php/config.php";

    if(isset($_POST['attnd_btn'])) {
        foreach ($_POST['status'] as $id => $attendance_status) {
            $package_id = $_POST['package_id'] [$id];
            $roll_no    = $_POST['student_id'][$id];
            $status     = $_POST['status'][$id];
            $date       = $_POST['date'];

            $sql_attnd = "INSERT INTO attendance (date, student_id, status, package_id) VALUES ('$date', '$roll_no', '$status', '$package_id')";
            $result = mysqli_query($connect, $sql_attnd);
        }
        if ($result) {
            $_SESSION['success'] = 'Student Attendance Record successfully';

            echo "<script>document.location.href='take_attendance.php'</script>";
        } else {
            $_SESSION['error'] = 'Student Attendance Record Failed';

            echo "<script>document.location.href='take_attendance.php'</script>";
        }
    }

?>
