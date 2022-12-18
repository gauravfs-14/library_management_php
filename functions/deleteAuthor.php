<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//check if the user is logged in or not
if (isset($_SESSION['uname'])) {
    //check if the id received from the author page
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    $sql = "DELETE FROM Author_Details WHERE `Author_Details`.`AUT_ID` = $id";
    //Query the SQL Statement
    $result = mysqli_query($conn, $sql);
    //check the query executed successfully
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
}
//if the user is not logged in
else {
    echo "<script>location.href='../index.php'</script>";
}
