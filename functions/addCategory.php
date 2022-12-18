<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
    $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Category_Details` WHERE CAT_Name = '$name'"));
    if ($num > 0) {
        echo "<script>alert('Category Already Exist!')</script>";
        echo "<script>location.href='../admin/author.php'</script>";
    }
    $sql = "INSERT INTO `Category_Details` (`CAT_ID`, `CAT_Name`, `CAT_Status`) VALUES (NULL, '$name', '$status');";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Category Details Added Successfully!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/category.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
