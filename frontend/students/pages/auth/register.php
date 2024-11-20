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

            include (__DIR__ . "/../../../../backend/students/register.php");

        ?>
        <h2>Register as Student</h2>
        <form action="register.php" method="POST">

            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" value="Register" name="submit">
        </form>
        <div class="login-link">Already registered account? <a href="login.php">Login</a></div>
    </div>

</body>

</html>