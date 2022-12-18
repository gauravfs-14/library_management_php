<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//check if the user is logged in
if (isset($_SESSION['uname'])) {
    //check if the data received from the form
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $id = $_POST['id'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
    $sql = "UPDATE Category_Details SET CAT_Name = '$name', CAT_Status = '$status' WHERE CAT_ID = '$id'";
    //query the sql statement
    $res = mysqli_query($conn, $sql);
    //check if the sql statement executed successfully
    if ($res) {
        echo "<script>alert('Category Details Edited Successfully!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
