<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//check if the user is logged in
if (isset($_SESSION['uname'])) {
    //check if the id received from the publication page
    if ($_GET) {
        $id = $_GET['id'];
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    }
    $sql = "DELETE FROM Publication_Details WHERE `Publication_Details`.`PUB_ID` = $id";
    //query the sql statement
    $result = mysqli_query($conn, $sql);
    //check if the sql statement was successful
    if ($result) {
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
