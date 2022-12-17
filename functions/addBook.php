<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_POST) {
        $name = $_POST['name'];
        $isbn = $_POST['isbn'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $publication = $_POST['publication'];
        $publishDate = $_POST['publishDate'];
        $page = $_POST['page'];
        $costPrice = $_POST['costPrice'];
        $stock = $_POST['stock'];
        $bookImage = $_FILES['bookImage'];
        $imageName = $bookImage['name'];
        $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Book_Details` WHERE BOOK_Name = '$name'"));
        if ($num > 0) {
            echo "<script>alert('Book Already Exist!')</script>";
            echo "<script>location.href='http://localhost/library_management/admin/books.php'</script>";
        }
        $sql = "INSERT INTO `Book_Details`(`BOOK_ID`, `BOOK_Name`, `BOOK_ISBN`, `AUT_ID`, `CAT_ID`, `PUB_ID`, `BOOK_Pub_Date`, `BOOK_Stock`, `BOOK_Price`, `BOOK_Page`, `BOOK_Image`, `BOOK_Add_Date`) VALUES (NULL,'$name','$isbn','$author','$category','$publication','$publishDate','$stock','$costPrice','$page','../assets/image/uploads/$imageName', CURRENT_TIMESTAMP)";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $upload = move_uploaded_file($bookImage['tmp_name'], "../assets/image/uploads/$imageName");
            if (!$upload) {
                echo "<script>alert('Failed to upload Image!')</script>";
                echo "<script>location.href='http://localhost/library_management/admin/books.php'</script>";
            }
            echo "<script>alert('Book Details Added Successfully!')</script>";
            echo "<script>location.href='http://localhost/library_management/admin/books.php'</script>";
        } else {
            echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
            echo "<script>location.href='http://localhost/library_management/admin/books.php'</script>";
        }
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='http://localhost/library_management/admin/books.php'</script>";
    }
} else {
    echo "<script>location.href='http://localhost/library_management'</script>";
}
