<?php
session_start(); //Start the session

//Get the connection data
require("../config/db_connect.php");

//Check if the user is logged in or not
if (isset($_SESSION['uname'])) {
    //check if the data received from the form
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
    //check if category already exists  in database
    $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Category_Details` WHERE CAT_Name = '$name'"));
    if ($num > 0) {
        echo "<script>alert('Category Already Exist!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    //if category doesn't exist
    $sql = "INSERT INTO `Category_Details` (`CAT_ID`, `CAT_Name`, `CAT_Status`) VALUES (NULL, '$name', '$status');";
    //query the sql statement
    $res = mysqli_query($conn, $sql);
    //check if category successfully created
    if ($res) {
        echo "<script>alert('Category Details Added Successfully!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
    //If user is not logged in
} else {
    echo "<script>location.href='../index.php'</script>";
}
