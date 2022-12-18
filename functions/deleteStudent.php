<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/student_details.php'</script>";
    }
    $sql = "DELETE FROM Student_Details WHERE `Student_Details`.`SD_ID` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='../admin/student_details.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/student_details.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
