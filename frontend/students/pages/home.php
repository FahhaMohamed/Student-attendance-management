<?php

    include(__DIR__."/../../utils/sessions.php");

    _session("student")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dashboard.css">
    <title>Student</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="auth/resetPassword.php">Reset Password</a></li>
        <li><a href="#" onclick="confirmLogout()">Logout</a></li>
    </ul>
</nav>

<script>
    function confirmLogout() {
        if (confirm("Are you sure to logout?")) {
            window.location.href = "../../../backend/auth/logout.php";
        }
    }
</script>


</body>
</html>