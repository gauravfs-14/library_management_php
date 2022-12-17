<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: http://localhost/library_management/student/dashboard.php");
}
if (!isset($_SESSION['uname'])) {
    header("Location: http://localhost/library_management/admin/admin_login.php");
}
require("../config/db_connect.php");
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
    <link rel="stylesheet" href="../assets/css/addCatPubAut.css">
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
                    <li>Dashboard</li>
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
                    <li class="active">Issue</li>
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
            <form action="../functions/addIssue.php" method="POST">
                <h2>Create Issue</h2>
                <select name="book" id="">
                    <option value="" selected>Book Name</option>
                    <?php
                    $bookSql = "SELECT * FROM `Book_Details`";
                    $books = mysqli_query($conn, $bookSql);
                    while ($book = mysqli_fetch_array($books)) {
                        echo "<option value='" . $book['BOOK_ID'] . "'>" . $book['BOOK_Name'] . "</option>";
                    }
                    ?>
                </select>
                <select name="student" id="">
                    <option value="" selected>Student Name</option>
                    <?php
                    $stdSql = "SELECT * FROM `Student_Details`";
                    $students = mysqli_query($conn, $stdSql);
                    while ($std = mysqli_fetch_array($students)) {
                        echo "<option value='" . $std['SD_ID'] . "'>" . $std['SD_Name'] . "</option>";
                    }
                    ?>
                </select>

                <label for="data">Issue Till:</label>
                <input type="date" name="issueTo" id="date" required>
                <select name="status" id="">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <input type="submit" value="Issue">
            </form>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>