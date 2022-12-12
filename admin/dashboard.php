<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location: http://localhost/library_management/admin/admin_login.php");
}
if (isset($_SESSION['email'])) {
    header("Location: http://localhost/library_management/student/dashboard.php");
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
        <div class="logo"><img src="../assets/image/logo.png" /></div>

        <ul>
            <li><a href="../functions/logout.php">Logout</a> </li>
        </ul>
    </nav>
    <div class="wrapper">
        <nav id="sidebar" class="activeSidebar">
            <div class="iconParent">
                <i class="fa-solid fa-angles-left icon"></i>
            </div>
            <ul>
                <li class="active">Dashboard</li>
                <li>Books</li>
                <li>Author</li>
                <li>Category</li>
                <li>Issue</li>
                <li>Publication</li>
                <li>Students</li>
            </ul>
        </nav>
        <div class="content">

        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>