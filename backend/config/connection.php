<?php

    $hostname = "localhost";
    $dbname = "student-attendance-management";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if (!$conn) {
        die("Something went wrong.");
    }

?>