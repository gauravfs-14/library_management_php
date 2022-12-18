<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/books.php'</script>";
    }
    $sql = "DELETE FROM Book_Details WHERE `Book_Details`.`BOOK_ID` = $id";
    $image = mysqli_query($conn, "SELECT * FROM Book_Details WHERE `Book_Details`.`BOOK_ID` = $id");
    unlink(mysqli_fetch_assoc($image)['BOOK_Image']);
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='../admin/books.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/books.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
