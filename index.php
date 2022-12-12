<?php
session_start();

if (isset($_SESSION['uname'])) {
    header("Location: http://localhost/library_management/admin/dashboard.php");
} elseif (isset($_SESSION['email'])) {
    header("Location: http://localhost/library_management/student/dashboard.php");
} else {
    header('Location: http://localhost/library_management/student/student_login.php');
}
