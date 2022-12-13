<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: http://localhost/library_management/student/dashboard.php");
}
if (!isset($_SESSION['uname'])) {
    header("Location: http://localhost/library_management/admin/admin_login.php");
}
require("../config/db_connect.php")
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
    <link rel="stylesheet" href="../assets/css/adminDashboard.css">
</head>

<body>
    <nav id="topbar">
        <div class="logo"><a href="../index.php"><img src="../assets/image/logo.png" /></a></div>

        <ul>
            <li><a href="../functions/logout.php">Logout <i class="fa-solid fa-right-from-bracket"></i></a> </li>
        </ul>
    </nav>
    <div class="wrapper">
        <nav id="sidebar" class="activeSidebar">
            <div class="iconParent">
                <i class="fa-solid fa-angles-left icon"></i>
            </div>
            <ul>
                <a href="./dashboard.php">
                    <li class="active">Dashboard</li>
                </a>
                <a href="./books.php">
                    <li>Books</li>
                </a>
                <a href="./author.php">
                    <li>Author</li>
                </a>
                <a href="./category.php">
                    <li>Category</li>
                </a>
                <a href="./issue.php">
                    <li>Issue</li>
                </a>
                <a href="./publication.php">
                    <li>Publication</li>
                </a>
                <a href="./student_details.php">
                    <li>Students</li>
                </a>
            </ul>
        </nav>
        <div class="content">
            <h1>At a Glance</h1>
            <div class="cardContainer">
                <div class="card">
                    <i class="fa-solid fa-book"></i>
                    <h2>Total Books</h2>
                    <p>
                        <?php
                        echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Book_Details`"));
                        ?>
                    </p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-pen-nib"></i>
                    <h2>Total Authors</h2>
                    <p>
                        <?php
                        echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Author_Details` WHERE AUT_Status = 'active'"));
                        ?>
                    </p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-tags"></i>
                    <h2>Total Categories</h2>
                    <p><?php
                        echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Category_Details` WHERE CAT_Status = 'active'"));
                        ?></p>
                </div>
                <div class="card">
                    <i class="fa-sharp fa-solid fa-stamp"></i>
                    <h2>Total Issue</h2>
                    <p><?php
                        echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Issue_Details` WHERE ISS_Status = 'active'"));
                        ?></p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-print"></i>
                    <h2>Total Publications</h2>
                    <p><?php
                        echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Publication_Details` WHERE PUB_Status = 'active'"));
                        ?></p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-users"></i>
                    <h2>Total Students</h2>
                    <p><?php
                        echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Student_Details`"));
                        ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>