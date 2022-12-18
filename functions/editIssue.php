<?php
session_start(); //start the session

//get the connection data
require("../config/db_connect.php");

//check if the user is logged in
if (isset($_SESSION['uname'])) {
    //check if the data received from issue page
    if ($_POST) {
        $id = $_POST['id'];
        $book = $_POST['book'];
        $status = $_POST['status'];
        $student = $_POST['student'];
        $date = date('Y-m-d', strtotime($_POST['issueTo']));
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/issue.php'</script>";
    }
    $sql = "UPDATE Issue_Details SET BOOK_ID = '$book', SD_ID = '$student', ISS_Status = '$status', ISS_To = '$date' WHERE ISS_ID = $id";
    //query the sql statement
    $res = mysqli_query($conn, $sql);
    //check if the SQL statement succeeded
    if ($res) {
        echo "<script>alert('Issue Details Edited Successfully!')</script>";
        echo "<script>location.href='../admin/issue.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/issue.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
