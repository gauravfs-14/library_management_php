<?php
session_start();

if (isset($_SESSION)) {
    echo "<script>location.href='http://localhost/library_management/'</script>";
}

require("../config/db_connect.php");

if ($_POST) {
    $unameForm = $_POST['username'];
    $passwordForm = $_POST['password'];
} else {
    echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
    echo "<script>location.href='http://localhost/library_management/admin/admin_login.php'</script>";
}

$sql = "SELECT * FROM `Admin_Details` WHERE Admin_Username = '$unameForm'";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {
        $uname = $row['Admin_Username'];
        $password = $row['Admin_Password'];
    }

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
} else {
    echo "<script>alert('Username or Password Incorrect')</script>";
    echo "<script>location.href='http://localhost/library_management/admin/admin_login.php'</script>";
}
