<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_POST) {
        $id = $_POST['id'];
        $book = $_POST['book'];
        $status = $_POST['status'];
        $student = $_POST['student'];
        $date = date('Y-m-d', strtotime($_POST['issueTo']));
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/issue.php'</script>";
    }
    $sql = "UPDATE Issue_Details SET BOOK_ID = '$book', SD_ID = '$student', ISS_Status = '$status', ISS_To = '$date' WHERE ISS_ID = $id";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Issue Details Edited Successfully!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/issue.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/issue.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
