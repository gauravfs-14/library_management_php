<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: ../student/dashboard.php");
}
if (!isset($_SESSION['uname'])) {
    header("Location: ../admin/admin_login.php");
}
if (isset($_GET)) {
    $id = $_GET["id"];
} else {
    header("Location: ./books.php");
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
            <form action="../functions/editBook.php" method="POST" enctype="multipart/form-data">
                <?php
                $res = mysqli_query($conn, "SELECT * FROM Book_Details JOIN Author_Details ON Book_Details.AUT_ID = Author_Details.AUT_ID JOIN Category_Details ON Book_Details.CAT_ID = Category_Details.CAT_ID JOIN Publication_Details ON Book_Details.PUB_ID = Publication_Details.PUB_ID WHERE BOOK_ID = $id");
                if (mysqli_num_rows($res) == 0) {
                    echo "<p>No records Found.</p>";
                } else {
                    while ($row = mysqli_fetch_array($res)) {
                ?>
                        <h2>Add Book</h2>
                        <input type="text" name="name" placeholder="Book Name" required <?php echo "value='" . $row['BOOK_Name'] . "'"; ?>>
                        <input type="text" name="isbn" placeholder="ISBN Number" required <?php echo "value='" . $row['BOOK_ISBN'] . "'"; ?>>
                        <input type="hidden" name="id" <?php echo "value='$id'"; ?>>
                        <div class="select">
                            <select name="category" id="">
                                <option value="">Category</option>
                                <?php
                                $catSql = "SELECT * FROM `Category_Details` ORDER BY CAT_Name ASC";
                                $categories = mysqli_query($conn, $catSql);
                                while ($cat = mysqli_fetch_array($categories)) {
                                    if ($row["CAT_Name"] == $cat['CAT_Name']) {
                                        echo "<option selected value='" . $cat['CAT_ID'] . "'>" . $cat['CAT_Name'] . "</option>";
                                    } else {
                                        echo "<option value='" . $cat['CAT_ID'] . "'>" . $cat['CAT_Name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <select name="author" id="">
                                <option value="">Author</option>
                                <?php
                                $autSql = "SELECT * FROM `Author_Details` ORDER BY AUT_Name ASC";
                                $authors = mysqli_query($conn, $autSql);
                                while ($aut = mysqli_fetch_array($authors)) {
                                    if ($row['AUT_Name'] == $aut['AUT_Name']) {
                                        echo "<option selected value='" . $aut['AUT_ID'] . "'>" . $aut['AUT_Name'] . "</option>";
                                    } else {
                                        echo "<option value='" . $aut['AUT_ID'] . "'>" . $aut['AUT_Name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <select name="publication" id="">
                                <option value="">Publication</option>
                                <?php
                                $pubSql = "SELECT * FROM `Publication_Details` ORDER BY PUB_Name ASC";
                                $publications = mysqli_query($conn, $pubSql);
                                while ($pub = mysqli_fetch_array($publications)) {
                                    if ($row['PUB_Name'] == $pub['PUB_Name']) {
                                        echo "<option selected value='" . $pub['PUB_ID'] . "'>" . $pub['PUB_Name'] . "</option>";
                                    } else {
                                        echo "<option value='" . $pub['PUB_ID'] . "'>" . $pub['PUB_Name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <input type="text" name="publishDate" placeholder="Published Date" required <?php echo "value='" . $row['BOOK_Pub_Date'] . "'"; ?>>
                        <input type="number" name="page" id="" placeholder="No. of Page" required <?php echo "value='" . $row['BOOK_Page'] . "'"; ?>>
                        <input type="number" name="costPrice" placeholder="Cost Price" required <?php echo "value='" . $row['BOOK_Price'] . "'"; ?>>
                        <input type="number" name="stock" placeholder="No. of Books" required <?php echo "value='" . $row['BOOK_Stock'] . "'"; ?>>
                        <input type="file" name="bookImage2">
                        <input type="submit" value="Edit Book">
                <?php
                    }
                }
                ?>
            </form>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>