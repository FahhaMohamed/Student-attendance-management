<?php

include __DIR__ . "/../../config/connection.php";
include __DIR__ . "/../../utils/existsCheck.php";

if (isset($_POST["add"])) {

    $id = $_POST['lecturerId'] ?? null;
    $name = $_POST['name'] ?? null;
    $position = $_POST['batch-select'] ?? null;
    $tposition = $_POST['tbatch'] ?? null;
    $department = $_POST['semester-select'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $errors = array();

    // If no position selected from dropdown, use the text input
    if (empty($position) || $position === '') {
        $position = $tposition;
    }

    // Validate input
    if (empty($name) || empty($position) || empty($department) || empty($email) || empty($password)) {
        array_push($errors, "Please fill all the fields.");
    }

    // Check if email already exists
    if (existsCheck($conn, 'employee', 'email', $email) && empty($id)) {
        array_push($errors, "Cannot add the lecturer, Email already exists.");
    }

    // Proceed if there are no validation errors
    if (count($errors) == 0) {
        if (empty($id)) {
            // Insert new lecturer
            $type = 'lecturer';
            $status = 'Null';

            $sql = "INSERT INTO employee (name, email, password, department, type, position, status) 
                    VALUES ('$name', '$email', '$password', '$department', '$type', '$position', '$status')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script type='text/javascript'>
                        alert('Successfully added!');
                        window.location.href = '../pages/lecturers.php';
                      </script>";
            } else {
                echo "<script type='text/javascript'>
                        alert('Error adding lecturer.');
                      </script>";
            }

        } else {
            // Update existing lecturer
            $sql1 = "SELECT * FROM employee WHERE id='$id'";
            $check = mysqli_query($conn, $sql1);
            $data = mysqli_fetch_array($check);

            if ($data['status'] === 'Null') {
                $sql = "UPDATE employee SET name = '$name', department = '$department', position = '$position', email = '$email', password = '$password' WHERE id = '$id'";
            } else {
                $sql = "UPDATE employee SET name = '$name', department = '$department', position = '$position' WHERE id = '$id'";
            }

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script type='text/javascript'>
                        alert('$name Successfully updated!');
                        window.location.href = '../pages/lecturers.php';
                      </script>";
            } else {
                echo "<script type='text/javascript'>
                        alert('Error updating lecturer.');
                      </script>";
            }
        }
    } else {
        // Display the first error
        echo "<script type='text/javascript'>
                alert('" . $errors[0] . "');
                window.location.href = '../pages/lecturers.php';
              </script>";
    }
}
