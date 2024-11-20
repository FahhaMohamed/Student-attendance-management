<?php
include (__DIR__ . "/../../utils/sessions.php");
_session("MA");

include "../../../backend/config/connection.php";

//for brake the twice problem
// if (isset($_POST['add'])) {
//     include __DIR__ . "/../../../backend/MA/studentCRUD/addStudent.php";
//     exit; // Stop execution after form submission
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="../assets/approvalStyle.css">
    <link rel="stylesheet" href="../assets/form.css">
    <title>MA - Course allocation</title>

</head>

<?php include ("../../models/sidebar.php") ?>

<body>
    <div class="app-bar">
        <!-- items will be added -->
    </div>

    <div class="container">
        <!-- Filter Form -->
        <div class="filter">

            <div class="add-new-student" id="addStudentIcon" onclick="navigate('allocationForm')">
                <label for="add">Create New Allocation</label>
                <i class="bi bi-plus-circle-fill" style="padding: 6px"></i>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="header">Title</th>
                    <th class="header">Semester</th>
                    <th class="header">Email</th>
                    <th class="header">Status</th>
                    <th class="header">Password</th>
                    <th class="header">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>
        function navigate(page) {

            document.body.classList.add('fade-in-out');


            setTimeout(() => {
                window.location.href = `${page}.php`;
            }, 200);

        }

    </script>
</body>

</html>

<!-- <?php include __DIR__ . "/../../../backend/MA/studentCRUD/addStudent.php"; ?> -->