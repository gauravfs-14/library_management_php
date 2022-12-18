<?php
session_start(); //start the session

//get the connection information
require("../config/db_connect.php");

//Check if  the user is logged in or not
if (isset($_SESSION['uname'])) {
    //check if data received from the form
    if ($_POST) {
        $name = $_POST['name'];
        $status = $_POST['status'];
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    }
    //check if publication already exists
    $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `Publication_Details` WHERE PUB_Name = '$name'"));
    if ($num > 0) {
        echo "<script>alert('Publication Already Exist!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    }
    //if publication does not exist
    $sql = "INSERT INTO `Publication_Details` (`PUB_ID`, `PUB_Name`, `PUB_Status`) VALUES (NULL, '$name', '$status');";
    $res = mysqli_query($conn, $sql);
    //query the sql statement
    if ($res) {
        echo "<script>alert('Publication Details Added Successfully!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    } else {
        echo "<script>alert('Some Error Occurred. Proceed Again!')</script>";
        echo "<script>location.href='../admin/publication.php'</script>";
    }
}
//if the user is not logged in
else {
    echo "<script>location.href='../index.php'</script>";
}
