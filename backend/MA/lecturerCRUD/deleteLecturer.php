<?php
include(__DIR__ . "/../../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM employee WHERE id = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);

            if (mysqli_stmt_execute($stmt)) {
                echo "Lecturer deleted successfully";
            } else {
                echo "Error deleting lecturer: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid ID";
    }
} else {
    echo "Invalid request method";
}

mysqli_close($conn);


