<?php

function session()
{

    session_start();

    if (isset($_SESSION["student"])) {
        header("Location: ../home.php");
    }

    if (isset($_SESSION["lecturer"])) {
        header("Location: ../../../lecturers/pages/home.php");
    }

    if (isset($_SESSION["MA"])) {
        header("Location: ../../../MA/pages/home.php");
    }

}


function _session($type)
{

    session_start();

    if ($type == "MA") {

        if (!isset($_SESSION[$type])) {
            header("Location: ../../students/pages/auth/login.php");
        }

    }

    if ($type == "student") {

        if (!isset($_SESSION["student"])) {

            header("Location: auth/login.php");

        } else {

            include "../../../backend/config/connection.php";

            $email = $_SESSION["email"];

            $sqli = "select * from students where email='$email' AND status='Active'";

            $result = mysqli_query($conn, $sqli);

            $rowCount = mysqli_num_rows($result);

            if ($rowCount ==0) {
                session_destroy();
                header("Location: auth/login.php");
                exit;
            }
        }
    }

    if ($type == "lecturer") {
        # code...
    }

}
