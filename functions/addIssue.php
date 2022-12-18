<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//check if the user is logged in or not
if (isset($_SESSION['uname'])) {
    //check if the data received from the form
    if ($_POST) {
        $book = $_POST['book'];
        $status = $_POST['status'];
        $student = $_POST['student'];
        $date = date('Y-m-d', strtotime($_POST['issueTo']));
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/issue.php'</script>";
    }
    $sql = "INSERT INTO `Issue_Details`(`ISS_ID`, `BOOK_ID`, `SD_ID`, `ISS_From`, `ISS_To`, `ISS_Status`) VALUES (NULL,'$book','$student',CURRENT_TIMESTAMP,'$date','$status')";
    //Query the SQL Statement
    $res = mysqli_query($conn, $sql);
    //Check if the SQL statement succeeded
    if ($res) {
        echo "<script>alert('Issue Details Added Successfully!')</script>";
        echo "<script>location.href='../admin/issue.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/issue.php'</script>";
    }
    //if the user is not logged in
} else {
    echo "<script>location.href='../index.php'</script>";
}
