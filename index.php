<?php
session_start();

if (isset($_SESSION['uname'])) {
    header("Location: ./admin/dashboard.php");
} elseif (isset($_SESSION['email'])) {
    header("Location: ./student/dashboard.php");
} else {
    header('Location: ./student/student_login.php');
}
