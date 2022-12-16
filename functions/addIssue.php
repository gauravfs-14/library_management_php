<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_POST) {
        $book = $_POST['book'];
        $status = $_POST['status'];
        $student = $_POST['student'];
        $date = date('Y-m-d', strtotime($_POST['issueTo']));
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/issue.php'</script>";
    }
    $sql = "INSERT INTO `Issue_Details`(`ISS_ID`, `BOOK_ID`, `SD_ID`, `ISS_From`, `ISS_To`, `ISS_Status`) VALUES (NULL,'$book','$student',CURRENT_TIMESTAMP,'$date','$status')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Issue Details Added Successfully!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/issue.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/issue.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
