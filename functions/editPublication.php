<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//check if the user is logged in
if (isset($_SESSION['uname'])) {
    //check it the data received from the publication page
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $id = $_POST['id'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    }
    $sql = "UPDATE Publication_Details SET PUB_Name = '$name', PUB_Status = '$status' WHERE PUB_ID = '$id'";
    //query the sql statement
    $res = mysqli_query($conn, $sql);
    //check if the sql statement succeeded
    if ($res) {
        echo "<script>alert('Publication Details Edited Successfully!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}
