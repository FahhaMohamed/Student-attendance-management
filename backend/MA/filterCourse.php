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
    if (isset($_POST['select'])) {
        $batch = $_POST['select'];
    }
}

// Construct the SQL query based on filters
$sql = "SELECT * FROM courses WHERE 1=1";

if (!empty($batch)) {
    $sql .= " AND department = ?";
}
if (!empty($filter) && $filter != 'All Semesters') {  // Ensure 'All Semesters' check matches the dropdown value
    $sql .= " AND semester = ?";
}

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters dynamically based on the presence of filters
$paramTypes = "";
$params = [];

if (!empty($batch)) {
    $paramTypes .= "s";
    $params[] = $batch;
}
if (!empty($filter) && $filter != 'All Semesters') {  // Ensure 'All Semesters' check matches the dropdown value
    $paramTypes .= "s";
    $params[] = $filter;
}

// Bind parameters if there are any
if (!empty($paramTypes)) {
    $stmt->bind_param($paramTypes, ...$params);
}

// Execute the statement and fetch the results
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die("Invalid query!");
}

