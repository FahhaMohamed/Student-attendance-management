<?php

    session_start();
    if(!isset($_SESSION["student"])) {
        header("Location: login.php");
    }

?>

<?php

    include "../../../../backend/config/connection.php";

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];

        $error = array();

        if(empty($email)) {

            array_push($error, "Please enter your email.");

        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            array_push($error, "Email is not valid");

        }

        if($email !== $_SESSION['email']) {
            array_push($error, "Email does not exist.");
        }

        if (count($error) > 0) {
            echo '<div class="alert alert-danger">';
            foreach ($error as $value) {
                echo $value . '<br>';
                break;
            }
            echo '</div>';
        }else{
            header("Location: forgotPass.php");
        }

    }

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

        <h2>Forgot password</h2>
        <form action="resetPassword.php" method="POST">
            <input type="email" name="email" placeholder="Enter email address" required>
            <input type="submit" value="Continue" name="submit">
        </form>
        <div class="login-link">Alreday remember password? <a href="changePass.php">Change password</a></div>
    </div>

</body>
</html>