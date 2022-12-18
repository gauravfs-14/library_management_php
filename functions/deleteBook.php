<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//check if the user is logged in or not
if (isset($_SESSION['uname'])) {
    //check if the id received from the book page
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/books.php'</script>";
    }
    $sql = "DELETE FROM Book_Details WHERE `Book_Details`.`BOOK_ID` = $id";
    //delete the image from the filesystem
    $image = mysqli_query($conn, "SELECT * FROM Book_Details WHERE `Book_Details`.`BOOK_ID` = $id");
    unlink(mysqli_fetch_assoc($image)['BOOK_Image']);
    //query the sql statement
    $result = mysqli_query($conn, $sql);
    //check if the sql statement executed successfully
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='../admin/books.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/books.php'</script>";
    }
}
//if user is not logged in
else {
    echo "<script>location.href='../index.php'</script>";
}
