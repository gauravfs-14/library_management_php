<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: ../student/dashboard.php");
}
if (isset($_SESSION['uname'])) {
    header("Location: ../admin/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/index.css" />
    <link rel="stylesheet" href="../assets/css/login-signup.css">
</head>

<body>
    <nav id="topbar">
        <div class="logo"><a href="../index.php"><img src="../assets/image/logo.png" /></a></div>
        <ul>
            <li><a href="../admin/admin_login.php">Admin</a></li>
        </ul>
    </nav>
    <div class="wrapper">
        <div class="loginContainer">
            <div class="img"></div>
            <form action="../functions/studentSignUp.php" method="POST" id="signup" onsubmit="return validate()">
                <h2>Student Sign Up</h2>
                <p id="message"></p>
                <input type="text" name="name" placeholder="Name" class="name" required id="name">
                <input type="email" name="email" id="email" placeholder="Email" class="email" required>
                <input type="password" name="password" id="password" placeholder="Password" class="password" required>

                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="confirmPassword" required>
                <input type="submit" value="Sign Up">
                <p>Already have an account? <a href="student_login.php">Login</a></p>
            </form>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
    <script src="../assets/js/student_signup.js"></script>
</body>

</html>