<?php

include (__DIR__ . "/../config/connection.php");

if (isset($_POST["submit"])) {


    $email = $_POST["email"];
    $password = $_POST["password"];


    $error = array();

    if (empty($email) or empty($password)) {
        array_push($error, "Please Fill all fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Email is not valid");
    }

    $sqli = "select * from students where email='$email'";

    $result = mysqli_query($conn, $sqli);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        array_push($error, "You don't have an account, please contact your Management Assistant.");
        
    }else if ($row_count > 1) {
        array_push($error, "Invalid email address.");
    }else if ($row['password'] != $password) {
        array_push($error, "Wrong email or password.");
    }else if ($row['status'] == 'Active') {
        array_push($error, "This account already registered.");
    }

    if (count($error) > 0) {
        echo '<div class="alert alert-danger">';
        foreach ($error as $value) {
            echo $value . '<br>';
            break;
        }
        echo '</div>';
    } else {

        $sql = "update students set status='Pending' where email = '$email'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("Location: ../../../models/success.php");
            exit();
        } else {
            die("Something went wrong.");
        }


    }


}