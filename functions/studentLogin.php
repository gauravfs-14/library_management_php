<?php
session_start(); //Start The Session

//Check if user is already logged in
if (isset($_SESSION)) {
    echo "<script>location.href='../index.php'</script>";
}

//Get Database Connection Data
require("../config/db_connect.php");

//Check if data received from form or not
if ($_POST) {
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];
}
//If Data not received
else {
    echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
    echo "<script>location.href='../student/student_login.php'</script>";
}

$sql = "SELECT * FROM `Student_Details` WHERE SD_Email = '$emailForm'";

//Query the SQL Statement
$res = mysqli_query($conn, $sql);

//Check if the user is available in the database or not
if (mysqli_num_rows($res) > 0) {
    //Get the data of single user
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['SD_ID'];
        $email = $row['SD_Email'];
        $password = $row['SD_Password'];
        $name = $row['SD_Name'];
    }
    //check if the credentials are valid or not
    if ($emailForm == $email && $password == $passwordForm) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['stdID'] = $id;
        //Check if the session is created or not
        if ($_SESSION['email'] == $email && $_SESSION['name'] == $name) {
            session_write_close();
            echo "<script>alert('Login Successful')</script>";
            echo "<script>location.href='../student/dashboard.php'</script>";
        }
        //If credentials not matched
    } else {
        echo "<script>alert('Username or Password Incorrect')</script>";
        echo "<script>location.href='../student/student_login.php'</script>";
    }
    //If no user found in database
} else {
    echo "<script>alert('Username or Password Incorrect')</script>";
    echo "<script>location.href='../student/student_login.php'</script>";
}
