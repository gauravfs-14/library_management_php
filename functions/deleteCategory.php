<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//check if the user is logged in or not
if (isset($_SESSION['uname'])) {
    //check if the id received from the category page
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
    $sql = "DELETE FROM Category_Details WHERE `Category_Details`.`CAT_ID` = $id";
    //query the sql statement
    $result = mysqli_query($conn, $sql);
    //check if the query was successful
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
}
//if user not logged in
else {
    echo "<script>location.href='../index.php'</script>";
}
