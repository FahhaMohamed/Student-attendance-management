<?php

    include(__DIR__."/../../../utils/sessions.php");

    session();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/authStyle.css">
    <title>Student Attendance Management</title>
</head>
<body>
    
<div class="container">

    <?php
    
        include __DIR__ . '/../../../../backend/auth/loginUser.php';

    ?>
        <h2>Login here</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" name="submit">
        </form>
        <div class="login-link">Didn't register your account? <a href="register.php">Register account</a></div>
    </div>

</body>
</html>