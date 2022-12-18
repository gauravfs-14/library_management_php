<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: ../student/dashboard.php");
}
if (!isset($_SESSION['uname'])) {
    header("Location: ../admin/admin_login.php");
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
    <link rel="stylesheet" href="../assets/css/bookDetail.css">
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
            <?php
            if ($_GET) {
                $bookid = $_GET["id"];
            } else {
                header("Location: http://localhost/library_management/admin/books.php");
            }
            $res = mysqli_query($conn, "SELECT * FROM Book_Details JOIN Author_Details ON Book_Details.AUT_ID = Author_Details.AUT_ID JOIN Category_Details ON Book_Details.CAT_ID = Category_Details.CAT_ID JOIN Publication_Details ON Book_Details.PUB_ID = Publication_Details.PUB_ID WHERE BOOK_ID = $bookid");
            if (mysqli_num_rows($res) == 0) {
                echo "<p>No records Found.</p>";
            } else {
                $i = 1;
                while ($row = mysqli_fetch_array($res)) {
                    $id = $row['BOOK_ID'];
                    $name = $row['BOOK_Name'];
                    $isbn = $row['BOOK_ISBN'];
                    $author = $row['AUT_Name'];
                    $category = $row['CAT_Name'];
                    $publication = $row["PUB_Name"];
                    $pubDate = $row["BOOK_Pub_Date"];
                    $stock = $row['BOOK_Stock'];
                    $price = $row['BOOK_Price'];
                    $page = $row['BOOK_Page'];
                    $image = $row['BOOK_Image'];
                    $addDate = $row['BOOK_Add'];

            ?>
                    <h1><?php echo $name ?></h1>
                    <div class="container">
                        <img src="<?php echo $image ?>" alt="">
                        <ul>
                            <li><strong>Name:</strong> <?php echo $name ?></li>
                            <li><strong>ISBN:</strong> <?php echo $isbn ?></li>
                            <li><strong>Author:</strong> <?php echo $author ?></li>
                            <li><strong>Category:</strong> <?php echo $category ?></li>
                            <li><strong>Publication:</strong> <?php echo $publication ?></li>
                            <li><strong>Published Date:</strong> <?php echo $pubDate ?></li>
                            <li><strong>Stock:</strong> <?php echo $stock ?></li>
                            <li><strong>Price:</strong> Rs.<?php echo $price ?></li>
                            <li><strong>Pages: </strong><?php echo $page ?></li>
                            <li><strong>Date Added:</strong> <?php echo date("Y-m-d", $addDate) ?></li>
                        </ul>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>