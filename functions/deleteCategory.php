<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
    $sql = "DELETE FROM Category_Details WHERE `Category_Details`.`CAT_ID` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
