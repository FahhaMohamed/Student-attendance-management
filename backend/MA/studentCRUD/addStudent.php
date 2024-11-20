<?php

include __DIR__ . "/../../config/connection.php";
include __DIR__ . "/../../utils/existsCheck.php";

if (isset($_POST["add"])) {

    $id = $_POST['studentId'] ?? null;
    $name = $_POST['name'] ?? null;
    $regNo = $_POST['regNo'] ?? null;
    $batch = $_POST['batch-select'] ?? null;
    $tbatch = $_POST['tbatch'] ?? null;
    $semester = $_POST['semester-select'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $errors = array();

    if (empty($batch) || $batch === '') {
        $batch = $tbatch;

        $sql = "INSERT INTO batches (batch) VALUES ('$batch')";
        $execute = mysqli_query($conn, $sql);
    }

    if (empty($batch)) {
        array_push($errors, "Cannot add the student, No batch selected!!");
    }

    if (empty($semester)) {
        array_push($errors, "Cannot add the student, No semester selected!!");
    }

    if (existsCheck($conn, 'students', 'email', $email) && empty($id)) {
        array_push($errors, "Cannot add the student, Email is already exists!!");
    }

    if (existsCheck($conn, 'students', 'regNo', $regNo) && empty($id)) {
        array_push($errors, "Cannot add the student, Registration number is already exists!!");
    }


    if (count($errors) <= 0) {
        if (empty($id)) {

            $type = 'student';
            $status = 'Null';

            $sql = "INSERT INTO students (name, regNo, email, password, semester, status, type, batch) VALUES ('$name', '$regNo', '$email', '$password', $semester, '$status', '$type', '$batch')";
            $result = mysqli_query($conn, $sql);

            echo "<script type = 'text/javascript'>";
            echo "alert('Successfully added!');";
            echo "window.location.href = '../pages/students.php'";
            echo "</script>";

        } else if (!empty($id)) {


            $sql1 = "SELECT * FROM students WHERE id='$id'";
            $check = mysqli_query($conn, $sql1);
            $data = mysqli_fetch_array($check);

            if ($data['status'] === 'Null') {
                $sql = "UPDATE students SET name = '$name', regNo = '$regNo', batch = '$batch',  email = '$email', password = '$password', semester = '$semester' WHERE id = '$id'";
            } else {
                $sql = "UPDATE students SET name = '$name', regNo = '$regNo', batch = '$batch', semester = '$semester' WHERE id = '$id'";
            }

            $result = mysqli_query($conn, $sql);

            echo "<script type = 'text/javascript'>";
            echo "alert('$name Successfully updated!');";
            echo "window.location.href = '../pages/students.php'";
            echo "</script>";
        }
    } else {
        echo "<script type = 'text/javascript'>";
        foreach ($errors as $value) {
            echo "alert('$value');";
            break;
        }
        echo "window.location.href = '../pages/students.php'";
        echo "</script>";
    }
}