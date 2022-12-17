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
                    <li class="active">Books</li>
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
            <form action="../functions/addBook.php" method="POST" enctype="multipart/form-data">
                <h2>Add Book</h2>
                <input type="text" name="name" placeholder="Book Name" required>
                <input type="text" name="isbn" placeholder="ISBN Number" required>
                <div class="select">
                    <select name="category" id="">
                        <option value="" selected>Category</option>
                        <?php
                        $catSql = "SELECT * FROM `Category_Details` WHERE CAT_Status = 'active' ORDER BY CAT_Name ASC";
                        $categories = mysqli_query($conn, $catSql);
                        while ($cat = mysqli_fetch_array($categories)) {
                            echo "<option value='" . $cat['CAT_ID'] . "'>" . $cat['CAT_Name'] . "</option>";
                        }
                        ?>
                    </select>
                    <select name="author" id="">
                        <option value="" selected>Author</option>
                        <?php
                        $autSql = "SELECT * FROM `Author_Details` WHERE AUT_Status = 'active' ORDER BY AUT_Name ASC";
                        $authors = mysqli_query($conn, $autSql);
                        while ($aut = mysqli_fetch_array($authors)) {
                            echo "<option value='" . $aut['AUT_ID'] . "'>" . $aut['AUT_Name'] . "</option>";
                        }
                        ?>
                    </select>
                    <select name="publication" id="">
                        <option value="" selected>Publication</option>
                        <?php
                        $pubSql = "SELECT * FROM `Publication_Details` WHERE PUB_Status = 'active' ORDER BY PUB_Name ASC";
                        $publications = mysqli_query($conn, $pubSql);
                        while ($pub = mysqli_fetch_array($publications)) {
                            echo "<option value='" . $pub['PUB_ID'] . "'>" . $pub['PUB_Name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="text" name="publishDate" placeholder="Published Date" required>
                <input type="number" name="page" id="" placeholder="No. of Page" required>
                <input type="number" name="costPrice" placeholder="Cost Price" required>
                <input type="number" name="stock" placeholder="No. of Books" required>
                <input type="file" name="bookImage" required>
                <input type="submit" value="Add Book">
            </form>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>