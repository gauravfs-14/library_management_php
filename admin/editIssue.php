<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: http://localhost/library_management/student/dashboard.php");
}
if (!isset($_SESSION['uname'])) {
    header("Location: http://localhost/library_management/admin/admin_login.php");
}
if (isset($_GET)) {
    $id = $_GET["id"];
} else {
    header("Location: ./issue.php");
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
            <form action="../functions/editIssue.php" method="POST">
                <?php
                $res = mysqli_query($conn, "SELECT * FROM Issue_Details WHERE ISS_ID = $id");
                if (mysqli_num_rows($res) == 0) {
                    echo "<p>No records Found.</p>";
                } else {
                    while ($row = mysqli_fetch_array($res)) {
                ?>
                        <h2>Edit Issue</h2>
                        <input type="hidden" name="id" <?php echo "value='$id'"; ?>>
                        <select name="book" id="">
                            <option value="">Book Name</option>
                            <?php
                            $bookSql = "SELECT * FROM `Book_Details`";
                            $books = mysqli_query($conn, $bookSql);
                            while ($book = mysqli_fetch_array($books)) {
                                if ($row['BOOK_ID'] == $book['BOOK_ID']) {
                                    echo "<option selected value='" . $book['BOOK_ID'] . "'>" . $book['BOOK_Name'] . "</option>";
                                } else {
                                    echo "<option value='" . $book['BOOK_ID'] . "'>" . $book['BOOK_Name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <select name="student" id="">
                            <option value="">Student Name</option>
                            <?php
                            $stdSql = "SELECT * FROM `Student_Details`";
                            $students = mysqli_query($conn, $stdSql);
                            while ($std = mysqli_fetch_array($students)) {
                                if ($row['SD_ID'] == $std['SD_ID']) {
                                    echo "<option selected value='" . $std['SD_ID'] . "'>" . $std['SD_Name'] . "</option>";
                                } else {
                                    echo "<option value='" . $std['SD_ID'] . "'>" . $std['SD_Name'] . "</option>";
                                }
                            }
                            ?>
                        </select>

                        <label for="data">Issue Till:</label>
                        <input type="date" name="issueTo" id="date" required <?php echo "value='" . $row['ISS_To'] . "'"; ?>>
                        <select name="status" id="">
                            <option value="active" <?php if ($row['ISS_Status'] == "active") {
                                                        echo "selected";
                                                    } ?>>Active</option>
                            <option value="inactive" <?php if ($row['ISS_Status'] == "inactive") {
                                                            echo "selected";
                                                        } ?>>Inactive</option>
                        </select>
                        <input type="submit" value="Edit Issue">
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