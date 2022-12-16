<?php
session_start();

if (isset($_SESSION)) {
    echo "<script>location.href='http://localhost/library_management'</script>";
}

require("../config/db_connect.php");

if ($_POST) {
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];
} else {
    echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
    echo "<script>location.href='http://localhost/library_management/student/student_login.php'</script>";
}

$sql = "SELECT * FROM `Student_Details` WHERE SD_Email = '$emailForm'";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['SD_ID'];
        $email = $row['SD_Email'];
        $password = $row['SD_Password'];
        $name = $row['SD_Name'];
    }
    if ($emailForm == $email && $password == $passwordForm) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['stdID'] = $id;
        if ($_SESSION['email'] == $email && $_SESSION['name'] == $name) {
            session_write_close();
            echo "<script>alert('Login Successful')</script>";
            echo "<script>location.href='http://localhost/library_management/student/dashboard.php'</script>";
        }
    } else {
        echo "<script>alert('Username or Password Incorrect')</script>";
        echo "<script>location.href='http://localhost/library_management/student/student_login.php'</script>";
    }
} else {
    echo "<script>alert('Username or Password Incorrect')</script>";
    echo "<script>location.href='http://localhost/library_management/student/student_login.php'</script>";
}
