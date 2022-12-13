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
                    <li>Books</li>
                </a>
                <a href="./author.php">
                    <li>Author</li>
                </a>
                <a href="./category.php">
                    <li class="active">Category</li>
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
            <h1>Categories</h1>
            <a href="./addCategory.php">
                <button>Add Category</button>
            </a>
            <table>
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Category Name</th>
                        <th>Category Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM Category_Details");
                    if (mysqli_num_rows($res) == 0) {
                        echo "<p>No records Found.</p>";
                    } else {

                        $i = 1;
                        while ($row = mysqli_fetch_array($res)) {
                            $id = $row['CAT_ID'];
                            $name = $row['CAT_Name'];
                            $status = $row['CAT_Status'];
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $status ?></td>
                                <td><?php echo "<a href='../functions/deleteCategory.php?id=" . $id . "'>" ?><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>