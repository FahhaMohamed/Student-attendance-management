<?php

include __DIR__ . "/../../config/connection.php";
include __DIR__ . "/../../utils/existsCheck.php";

if (isset($_POST["add"])) {

    $id = $_POST['courseId'] ?? null;
    $name = $_POST['name'] ?? null;
    $code = $_POST['code'] ?? null;
    $department = $_POST['department'] ?? null;
    $semester = $_POST['semester'] ?? null;
    $labs = $_POST['labs'] ?? null;
    $assignments = $_POST['assignments'] ?? null;

    $errors = array();

    if (empty($department)) {
        array_push($errors, "Cannot add the course, No Department selected!!");
    }

    if (empty($semester)) {
        array_push($errors, "Cannot add the course, No Semester selected!!");
    }

    if (existsCheck($conn, 'courses', 'code', $code) && empty($id)) {
        array_push($errors, "Cannot add the course, Course code is already exists!!");
    }

    if (existsCheck($conn, 'courses', 'name', $name) && empty($id)) {
        array_push($errors, "Cannot add the course, Course name is already exists!!");
    }


    if (count($errors) <= 0) {
        if (empty($id)) {

            $sql = "INSERT INTO courses (name, code, semester, labs, assignments, department) VALUES ('$name', '$code', $semester, $labs, $assignments, '$department')";
            $result = mysqli_query($conn, $sql);

            echo "<script type = 'text/javascript'>";
            echo "alert('Successfully added!');";
            echo "window.location.href = '../pages/courses.php'";
            echo "</script>";

        } else if (!empty($id)) {

            $sql = "UPDATE courses SET name = '$name', code = '$code', semester = $semester, labs = $labs, assignments = $assignments, department = '$department' WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);

            echo "<script type = 'text/javascript'>";
            echo "alert('$name Successfully updated!');";
            echo "window.location.href = '../pages/courses.php'";
            echo "</script>";
        }
    } else {
        echo "<script type = 'text/javascript'>";
        foreach ($errors as $value) {
            echo "alert('$value');";
            break;
        }
        echo "window.location.href = '../pages/courses.php'";
        echo "</script>";
    }
}