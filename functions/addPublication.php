<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    }
    $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Publication_Details` WHERE PUB_Name = '$name'"));
    if ($num > 0) {
        echo "<script>alert('Publication Already Exist!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/author.php'</script>";
    }
    $sql = "INSERT INTO `Publication_Details` (`PUB_ID`, `PUB_Name`, `PUB_Status`) VALUES (NULL, '$name', '$status');";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Publication Details Added Successfully!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
