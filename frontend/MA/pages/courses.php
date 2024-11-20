<?php
include (__DIR__ . "/../../utils/sessions.php");

_session("MA");

include "../../../backend/config/connection.php";
include __DIR__ . "/../../../backend/MA/filterCourse.php";
include __DIR__ . "/../../utils/isHash.php";

//for brake the twice problem
if (isset($_POST['add'])) {
    include __DIR__ . "/../../../backend/MA/courseCRUD/addCourse.php";
    exit; // Stop execution after form submission
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="../assets/approvalStyle.css">
    <link rel="stylesheet" href="../assets/form.css">
    <title>MA - Courses list</title>
</head>

<?php include ("../../models/sidebar.php") ?>

<body>
    <div class="app-bar">
        <!-- items will be added -->
    </div>

    <div class="container">
        <!-- Filter Form -->
        <div class="filter">
            <form method="post" class="filter-form">
                <div class="select-cont">
                    <select id="filter" name="filter" class="dropdown">
                        <option value="All Semesters">All Semesters</option>
                        <?php
                        $sql_batches = "SELECT * FROM semesters";
                        $result_batches = mysqli_query($conn, $sql_batches);

                        while ($row_batch = mysqli_fetch_assoc($result_batches)) {
                            $batch_option = $row_batch['id'];
                            echo "<option value=\"$batch_option\"" . (($filter == $batch_option) ? ' selected' : '') . ">$row_batch[semester]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="select-cont">
                    <select id="batch" name="select" class="dropdown">
                        <option value="">All Departments</option>
                        <?php
                        $sql_batches = "SELECT DISTINCT department FROM employee";
                        $result_batches = mysqli_query($conn, $sql_batches);

                        while ($row_batch = mysqli_fetch_assoc($result_batches)) {
                            $batch_option = $row_batch['department'];
                            echo "<option value=\"$batch_option\"" . (($batch == $batch_option) ? ' selected' : '') . ">$batch_option</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="filter-btn">Filter</button>
            </form>
            <div class="add-new-student" id="addStudentIcon">
                <label for="add">Add New</label>
                <i class="bi bi-pen-fill"></i>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="header">Name</th>
                    <th class="header">Course Code</th>
                    <th class="header">Labs</th>
                    <th class="header">Assignments</th>
                    <th class="header">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $name = htmlspecialchars($row['name']);
                    $code = htmlspecialchars($row['code']);
                    $labs = htmlspecialchars($row['labs']);
                    $assignments = htmlspecialchars($row['assignments']);
                    $department = htmlspecialchars($row['department']);
                    $semester = htmlspecialchars($row['semester']);

                    echo "<tr>
                            <td>{$name}</td>
                            <td>{$code}</td>
                            <td>{$labs}</td>
                            <td>{$assignments}</td>
                            <td>
                                <i class='bi bi-pencil-fill' onclick='toggleEdit(this)'></i>
                                <div class='action-buttons' style='display: none;'>
                                    <button class='btn approve-btn' onclick='editCourse(\"{$row['id']}\", \"{$name}\", \"{$code}\", \"{$labs}\", \"{$assignments}\", \"{$department}\", \"{$semester}\")'>Edit</button>
                                    <button class='btn 
                                    ' onclick='deleteCourse(\"{$row['id']}\")'>Delete</button>
                                </div>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <?php include __DIR__ ."/../modelForms/courseModelForm.php" ?>

    <script src="../../assets/popup.js"></script>
    <script src="../assets/editCourse.js"></script>

</body>

</html>

<?php include __DIR__ ."/../../../backend/MA/courseCRUD/addCourse.php"; ?>
