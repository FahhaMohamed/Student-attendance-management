<?php

    include __DIR__ ."/../config/connection.php";

    if (isset($_POST['submit'])) {
        $email = $_SESSION['email'];
        $password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $error = array();

        if (empty($password) OR empty($confirm_password)) {
            array_push($error, "Please fill all fields.");
        }
        if ($password!==$confirm_password) {
            array_push($error, "Password does not match.");
        }
        if (strlen($password)<8) {
            array_push($error, "Weak Password, Please enter at least 8 characters");
        }if (count($error) > 0) {
            echo '<div class="alert alert-danger">';
            foreach ($error as $value) {
                echo $value . '<br>';
                break;
            }
            echo '</div>';
        }else {

            $sql = "UPDATE students SET password = '$password_hash' WHERE email='$email'";

            $result = mysqli_query($conn, $sql);

            echo "<script type = 'text/javascript'>";
            echo "alert('Password changed!');";
            echo "window.location.href = '../home.php'";
            echo "</script>";
        }
    }

