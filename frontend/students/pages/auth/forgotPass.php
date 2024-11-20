<?php

    session_start();
    if(!isset($_SESSION["student"])) {
        header("Location: login.php");
    }

    include __DIR__ ."/../../../../backend/students/changePassViaMail.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/authStyle.css">
    <title>Reset Password</title>
</head>
<body>
    
<div class="container">

        <h2>Change password</h2>
        <form  method="POST">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" value="Change" name="submit">
        </form>
    </div>

</body>
</html>