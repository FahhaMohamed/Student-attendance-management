<?php
include __DIR__ . "/../config/connection.php";

// Initialize variables
$filter = "";
$batch = "";

// Capture and validate POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['filter'])) {
        $filter = $_POST['filter'];
    }
    if (isset($_POST['batch'])) {
        $batch = $_POST['batch'];
    }
}

// Construct the SQL query based on filters
$sql = "SELECT * FROM students WHERE (status = 'Pending' OR status = 'Active' OR status = 'Null')";

if (!empty($batch)) {
    $sql .= " AND batch = ?";
}
if (!empty($filter) && $filter != 'All status') {
    $sql .= " AND status = ?";
}

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters dynamically based on the presence of filters
if (!empty($batch) && (!empty($filter) && $filter != 'All status')) {
    $stmt->bind_param('ss', $batch, $filter);
} elseif (!empty($batch)) {
    $stmt->bind_param('s', $batch);
} elseif (!empty($filter) && $filter != 'All status') {
    $stmt->bind_param('s', $filter);
}

// Execute the statement and fetch the results
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die("Invalid query!");
}