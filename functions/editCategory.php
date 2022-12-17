<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $id = $_POST['id'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/category.php'</script>";
    }
    $sql = "UPDATE Category_Details SET CAT_Name = '$name', CAT_Status = '$status' WHERE CAT_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Category Details Edited Successfully!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/category.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/category.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
