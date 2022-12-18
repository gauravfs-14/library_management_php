<?php
session_start(); //Start the session

//Get the connection data
require("../config/db_connect.php");

//Check if user is logged in or not
if (isset($_SESSION['uname'])) {
    //check if data received from form
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
        //Check if the book already exists in the database
        $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Book_Details` WHERE BOOK_Name = '$name'"));
        if ($num > 0) {
            echo "<script>alert('Book Already Exist!')</script>";
            echo "<script>location.href='../admin/books.php'</script>";
        }
        //If book does not exist already
        $sql = "INSERT INTO `Book_Details`(`BOOK_ID`, `BOOK_Name`, `BOOK_ISBN`, `AUT_ID`, `CAT_ID`, `PUB_ID`, `BOOK_Pub_Date`, `BOOK_Stock`, `BOOK_Price`, `BOOK_Page`, `BOOK_Image`, `BOOK_Add_Date`) VALUES (NULL,'$name','$isbn','$author','$category','$publication','$publishDate','$stock','$costPrice','$page','../assets/image/uploads/$imageName', CURRENT_TIMESTAMP)";
        //Query the SQL Statement
        $res = mysqli_query($conn, $sql);
        //Check if the SQL statement has been executed successfully
        if ($res) {
            //Write the image into the file system
            $upload = move_uploaded_file($bookImage['tmp_name'], "../assets/image/uploads/$imageName");
            //Check if the image is uploaded successfully
            if (!$upload) {
                echo "<script>alert('Failed to upload Image!')</script>";
                echo "<script>location.href='../admin/books.php'</script>";
            }
            echo "<script>alert('Book Details Added Successfully!')</script>";
            echo "<script>location.href='../admin/books.php'</script>";
        } else {
            echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
            echo "<script>location.href='../admin/books.php'</script>";
        }
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/books.php'</script>";
    }
    //If user is not logged in
} else {
    echo "<script>location.href='../index.php'</script>";
}
