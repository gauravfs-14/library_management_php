<?php
session_start(); //start the session

//get the connection data
require("../config/db_connect.php");

//check if the user is already logged in 
if (isset($_SESSION['uname'])) {
    //check if the data received from the form
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $id = $_POST['id'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    $sql = "UPDATE Author_Details SET AUT_Name = '$name', AUT_Status = '$status' WHERE AUT_ID = $id";
    //query the sql statement
    $res = mysqli_query($conn, $sql);
    //check if the sql statement has been executed successfully
    if ($res) {
        echo "<script>alert('Author Details Updated Successfully!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    //if user not logged in
} else {
    echo "<script>location.href='../index.php'</script>";
}
