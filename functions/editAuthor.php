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
        echo "<script>location.href='http://localhost/library_management/admin/author.php'</script>";
    }
    $sql = "UPDATE Author_Details SET AUT_Name = '$name', AUT_Status = '$status' WHERE AUT_ID = $id";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Author Details Updated Successfully!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/author.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/author.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
