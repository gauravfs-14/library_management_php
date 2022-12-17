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
    <link rel="stylesheet" href="../assets/css/details.css">
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
            <h1>Books</h1>
            <div class="col">

                <a href="./addBook.php">
                    <button>Add Book</button>
                </a>
                <div class="searchPanel">
                    <form method="POST">
                        <input type="search" name="search" placeholder="Search...">
                        <input type="submit" value="Search" name="submit">
                    </form>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Book Name</th>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit']) && isset($_POST['search'])) {
                        $searchString = $_POST['search'];
                        $res = mysqli_query($conn, "SELECT * FROM Book_Details JOIN Author_Details ON Book_Details.AUT_ID = Author_Details.AUT_ID JOIN Category_Details ON Book_Details.CAT_ID = Category_Details.CAT_ID WHERE Book_Details.BOOK_Name LIKE '%$searchString%' OR Book_Details.BOOK_ISBN = '$searchString' OR Author_Details.AUT_Name LIKE '%$searchString%' OR Category_Details.CAT_Name LIKE '%$searchString%' ORDER BY Book_Details.BOOK_Name ASC");
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
                                $stock = $row['BOOK_Stock'];
                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $isbn ?></td>
                                    <td><?php echo $author ?></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo $stock ?></td>
                                    <td>
                                        <?php echo "<a href='./bookDetail.php?id=" . $id . "'>" ?>
                                        <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <?php echo "<a href='./editBook.php?id=" . $id . "'>" ?><i class="fa-solid fa-pen-to-square"></i></a>
                                        <?php echo "<a href='../functions/deleteBook.php?id=" . $id . "'>" ?><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            }
                        }
                    } else {
                        $res = mysqli_query($conn, "SELECT * FROM Book_Details JOIN Author_Details ON Book_Details.AUT_ID = Author_Details.AUT_ID JOIN Category_Details ON Book_Details.CAT_ID = Category_Details.CAT_ID ORDER BY Book_Details.BOOK_Name ASC");
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
                                $stock = $row['BOOK_Stock'];
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $isbn ?></td>
                                    <td><?php echo $author ?></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo $stock ?></td>
                                    <td>
                                        <?php echo "<a href='./bookDetail.php?id=" . $id . "'>" ?>
                                        <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <?php echo "<a href='./editBook.php?id=" . $id . "'>" ?><i class="fa-solid fa-pen-to-square"></i></a>
                                        <?php echo "<a href='../functions/deleteBook.php?id=" . $id . "'>" ?><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                    <?php
                                $i++;
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="page">

            </div>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>