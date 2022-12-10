<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/index.css" />
    <link rel="stylesheet" href="../assets/css/student_login.css">
</head>

<body>
    <nav id="topbar">
        <div class="logo"><img src="../assets/image/logo.png" /></div>
        <ul>
            <li><a href="../admin/dashboard.php">Admin</a></li>
        </ul>
    </nav>
    <div class="wrapper">
        <div class="loginContainer">
            <div class="img"></div>
            <form action="">
                <h2>Student Sign Up</h2>
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" id="" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="password" name="password" id="" placeholder="Confirm Placeholder">
                <input type="submit" value="Sign Up">
                <p>Already have an account? <a href="student_login.php">Login</a></p>
            </form>

        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>