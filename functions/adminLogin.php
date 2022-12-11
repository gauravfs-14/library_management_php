<?php
session_start();

require("../config/db_connect.php");

$sql = "SELECT * FROM `Admin_Details`";

$res = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($res)) {
    $uname = $row['Admin_Username'];
    $password = $row['Admin_Password'];
}

$unameForm = $_POST['username'];
$passwordForm = $_POST['password'];


if ($uname == $unameForm && $password == $passwordForm) {
    $_SESSION['uname'] = $uname;
    if ($_SESSION['uname'] == $uname) {
        session_write_close();
        echo "<script>alert('Login Successful')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/dashboard.php'</script>";
    }
} else {
    echo "<script>alert('Username or Password Incorrect')</script>";
    echo "<script>location.href='http://localhost/library_management/admin/admin_login.php'</script>";
}
