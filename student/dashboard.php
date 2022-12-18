<?php
session_start();

if (isset($_SESSION['uname'])) {
    header("Location: ../admin/dashboard.php");
}
if (!isset($_SESSION['email'])) {
    header("Location: ../student/student_login.php");
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
    <link rel="stylesheet" href="../assets/css/details.css">
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
        <div class="contentStudent">
            <h1>Books Issued</h1>
            <table>
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Book Name</th>
                        <th>Student Name</th>
                        <th>Status</th>
                        <th>Issue From</th>
                        <th>Issue To</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM Issue_Details JOIN Book_Details ON Book_Details.BOOK_ID = Issue_Details.BOOK_ID JOIN Student_Details ON Student_Details.SD_ID = Issue_Details.SD_ID WHERE Issue_Details.SD_ID =" . $_SESSION['stdID']);
                    if (mysqli_num_rows($res) == 0) {
                        echo "<p>No records Found.</p>";
                    } else {
                        $i = 1;
                        while ($row = mysqli_fetch_array($res)) {
                            $id = $row['ISS_ID'];
                            $bookName = $row['BOOK_Name'];
                            $studentName = $row['SD_Name'];
                            $status = $row['ISS_Status'];
                            $issFrom = $row['ISS_From'];
                            $issTo = $row['ISS_To'];
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $bookName; ?></td>
                                <td><?php echo $studentName ?></td>
                                <td><?php echo $status ?></td>
                                <td><?php echo date('Y-m-d', strtotime($issFrom)) ?></td>
                                <td><?php echo $issTo ?></td>
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