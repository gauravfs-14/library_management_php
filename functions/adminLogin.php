<?php
session_start(); //start the session

//check if the user is already logged in
if (isset($_SESSION)) {
    echo "<script>location.href='../index.php'</script>";
}

//get the connection details
require("../config/db_connect.php");

//check if the data received from the form
if ($_POST) {
    $unameForm = $_POST['username'];
    $passwordForm = $_POST['password'];
} else {
    echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
    echo "<script>location.href='../admin/admin_login.php'</script>";
}

$sql = "SELECT * FROM `Admin_Details` WHERE Admin_Username = '$unameForm'";
//Query the SQL Statement
$res = mysqli_query($conn, $sql);

//check if the user exists in the database or not
if (mysqli_num_rows($res) > 0) {
    //get the information of single user
    while ($row = mysqli_fetch_assoc($res)) {
        $uname = $row['Admin_Username'];
        $password = $row['Admin_Password'];
    }
    //check if the credentials match
    if ($uname == $unameForm && $password == $passwordForm) {
        //assign the session variable
        $_SESSION['uname'] = $uname;
        //check it the session is created or not
        if ($_SESSION['uname'] == $uname) {
            session_write_close();
            echo "<script>alert('Login Successful')</script>";
            echo "<script>location.href='../admin/dashboard.php'</script>";
        }
    } else {
        echo "<script>alert('Username or Password Incorrect')</script>";
        echo "<script>location.href='../admin/admin_login.php'</script>";
    }
}
//if the user doesn't exist
else {
    echo "<script>alert('Username or Password Incorrect')</script>";
    echo "<script>location.href='../admin/admin_login.php'</script>";
}
