<?php
session_start();

require("../config/db_connect.php");

if (isset($_SESSION['uname'])) {
    if ($_POST) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $isbn = $_POST['isbn'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $publication = $_POST['publication'];
        $publishDate = $_POST['publishDate'];
        $page = $_POST['page'];
        $costPrice = $_POST['costPrice'];
        $stock = $_POST['stock'];
        $bookImage = $_FILES['bookImage2'];
        $imageName = $bookImage['name'];
        if ($imageName != "") {
            $prevImage = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Book_Details WHERE BOOK_ID = $id"))['BOOK_Image'];
            unlink($prevImage);
            $sql = "UPDATE Book_Details SET BOOK_Name = '$name', BOOK_ISBN = '$isbn', AUT_ID = '$author', CAT_ID = '$category', PUB_ID = '$publication', BOOK_Pub_Date = '$publishDate', BOOK_Stock = '$stock', BOOK_Price = '$costPrice', BOOK_Page = '$page', BOOK_Image = '../assets/image/uploads/$imageName' WHERE BOOK_ID = '$id'";
        } else {
            $sql = "UPDATE Book_Details SET BOOK_Name = '$name', BOOK_ISBN = '$isbn', AUT_ID = '$author', CAT_ID = '$category', PUB_ID = '$publication', BOOK_Pub_Date = '$publishDate', BOOK_Stock = '$stock', BOOK_Price = '$costPrice', BOOK_Page = '$page' WHERE BOOK_ID = '$id'";
        }
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $upload = move_uploaded_file($bookImage['tmp_name'], "../assets/image/uploads/$imageName");
            if ($upload) {
            }
            echo "<script>alert('Book Details Edited Successfully!')</script>";
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
