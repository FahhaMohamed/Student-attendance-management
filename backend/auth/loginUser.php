<?php

include __DIR__ . '/../config/connection.php';
//finding the password hash or not
include __DIR__ . '/../../frontend/utils/isHash.php';

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $error = array();

    if (empty($email) || empty($password)) {
        array_push($error, "Please Fill all fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Email is not valid");
    }

    $student = "SELECT * FROM students WHERE email='$email' AND (status='Active' OR status='Pending')";

    $ma = "select * from ma where email='$email'";

    $studResult = mysqli_query($conn, $student);
    $maResult = mysqli_query($conn, $ma);

    $studRow = mysqli_fetch_array($studResult, MYSQLI_ASSOC);
    $maRow = mysqli_fetch_array($maResult, MYSQLI_ASSOC);

    $studCount = mysqli_num_rows($studResult);
    $maCount = mysqli_num_rows($maResult);

    if ($studCount > 0) {
        $row = $studRow;
    }else if ($maCount > 0) {
        $row = $maRow;
    }

    

    if (!empty($row)) {
        if($row["status"] === 'Pending') {

            array_push($error, "Please wait until get approval!!!");

        } else {
            $storedPassword = $row["password"];
        $isPasswordCorrect = false;

        if (is_password_hash($storedPassword)) {
            $isPasswordCorrect = password_verify($password, $storedPassword);
        } else {
            $isPasswordCorrect = ($password === $storedPassword);
            if ($isPasswordCorrect) {
                // Rehash the plain password and update the database
                $newHashedPassword = password_hash($storedPassword, PASSWORD_DEFAULT);
                $updatePasswordQuery = "UPDATE " . ($studCount > 0 ? "students" : "ma") . " SET password='$newHashedPassword' WHERE email='$email'";
                mysqli_query($conn, $updatePasswordQuery);
            }
        }

        if ($isPasswordCorrect) {
            echo '<div class="alert-success">Login Successfully.</div>';

            session_start();
            if ($row["type"] === 'MA') {
                $_SESSION["MA"] = "yes";
                header("Location: ../../../MA/pages/home.php");
                die();
            }

            if ($row["type"] === 'student') {
                $_SESSION["student"] = "yes";
                $_SESSION["email"] = $row['email'];
                header("Location: ../home.php");
                die();
            }
        } else {
            array_push($error, "Wrong Password");
        }
        }
    } else {
        array_push($error, "Email does not exist");
    }

    if (count($error) > 0) {
        echo '<div class="alert alert-danger">';
        foreach ($error as $value) {
            echo $value . '<br>';
            break;
        }
        echo '</div>';
    }
}

