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
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    }
    $sql = "UPDATE Publication_Details SET PUB_Name = '$name', PUB_Status = '$status' WHERE PUB_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Publication Details Edited Successfully!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
