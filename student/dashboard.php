<?php
session_start();

if (isset($_SESSION['uname'])) {
    header("Location: http://localhost/library_management/admin/dashboard.php");
}
if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/library_management/student/student_login.php");
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
</head>

<body>
    <nav id="topbar">
        <div class="logo"><a href="../index.php"><img src="../assets/image/logo.png" /></a></div>

        <ul>
            <li>Welcome: <?php echo $_SESSION['name']; ?></li>
            <li><a href="../functions/logout.php">Logout</a> </li>
        </ul>
    </nav>
    <div class="wrapper">

    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>