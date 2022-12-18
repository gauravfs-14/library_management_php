<?php
session_start();

if (
    isset($_SESSION) &&
    session_unset() &&
    session_destroy()
) {
    echo "<script>alert('Logout Successful')</script>";
    echo "<script>location.href='../index.php'</script>";
} else {
    echo "<script>location.href='../index.php'</script>";
}
