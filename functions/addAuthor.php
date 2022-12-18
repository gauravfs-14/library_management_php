<?php
session_start(); //Start the session

//get connection data
require("../config/db_connect.php");

//Check if user is logged in or not
if (isset($_SESSION['uname'])) {
    //Check if data received from form
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
    }
    //If data not received from form
    else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    //Check if the author already exists in the database
    $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Author_Details` WHERE AUT_Name = '$name'"));
    if ($num > 0) {
        echo "<script>alert('Author Already Exist!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    //If author does not exist
    $sql = "INSERT INTO `Author_Details` (`AUT_ID`, `AUT_Name`, `AUT_Status`) VALUES (NULL, '$name', '$status');";
    //Query the SQL statement
    $res = mysqli_query($conn, $sql);
    //Check if the SQL statement executed successfully
    if ($res) {
        echo "<script>alert('Author Details Added Successfully!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    //If user is not logged in
} else {
    echo "<script>location.href='../index.php'</script>";
}
