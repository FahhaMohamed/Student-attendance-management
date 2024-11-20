<?php
include (__DIR__ . "/../../utils/sessions.php");
_session("MA");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="../assets/home.css">
    <title>Management Assistant</title>
</head>

<?php include("../../models/sidebar.php") ?>

<body>
    <div class="app-bar">
        <!-- items will be added -->
    </div>
    
    <div class="dashboard">
        
        <div class="container">
            <div class="card blue">
                <h2>Students</h2>
                <p>9,823</p>
            </div>
            <div class="card red">
                <h2>Lecturers</h2>
                <p>9,823</p>
            </div>
            <div class="card yellow">
                <h2>Total Employee</h2>
                <p>9,823</p>
            </div>            
        </div>
    </div>
</body>

</html>


