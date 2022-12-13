<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    }
    $sql = "DELETE FROM Publication_Details WHERE `Publication_Details`.`PUB_ID` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/publication.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
