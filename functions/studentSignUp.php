<?php
require("../config/db_connect.php"); //get connection configuration

//check if user is logged in
if (isset($_SESSION)) {
    echo "<script>location.href='../index.php'</script>";
}

//check if data is received from the form
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
} else {
    //If data not received from form
    echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
    echo "<script>location.href='../student/student_signup.php'</script>";
}

//check if password and confirm password are same
if ($password !== $confirmPassword) {
    echo "<script>alert('Passwords do not match')</script>";
    echo "<script>location.href='../student/student_signup.php'</script>";
} else {

    //if passwords match

    $user = mysqli_query($conn, "SELECT * FROM `Student_Details` WHERE SD_Email = '$email'");
    //check if user already exists
    if (mysqli_num_rows($user) == 0) {
        $sql = "INSERT INTO `Student_Details` (`SD_ID`, `SD_Email`, `SD_Password`, `SD_Name`) VALUES (NULL, '$email', '$password', '$name');";
        $result = mysqli_query($conn, $sql);
        //check if signup successful
        if ($result) {
            echo "<script>alert('User Signup Successfully. Proceed to Login!')</script>";
            echo "<script>location.href='../student/student_login.php'</script>";
        } else {
            echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
            echo "<script>location.href='../student/student_signup.php'</script>";
        }
    } else {
        echo "<script>alert('User Already Exist. Proceed to Login!')</script>";
        echo "<script>location.href='../student/student_login.php'</script>";
    }
}
