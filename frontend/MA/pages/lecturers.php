<?php
include (__DIR__ . "/../../utils/sessions.php");

_session("MA");

include "../../../backend/config/connection.php";

include __DIR__ . "/../../../backend/MA/filterLecturers.php";

include __DIR__ . "/../../utils/isHash.php";

//for brake the twice problem
if (isset($_POST['add'])) {
    include __DIR__ . "/../../../backend/MA/lecturerCRUD/addLecturer.php";
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
    <title>MA - Lecturers list</title>
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
                        <option value="All status" <?php if ($filter == 'All status')
                            echo 'selected'; ?>>All Status
                        </option>
                        <option value="Active" <?php if ($filter == 'Active')
                            echo 'selected'; ?>>Active</option>

                        <option value="Null" <?php if ($filter == 'Null')
                            echo 'selected'; ?>>Null</option>
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
                            echo "<option value=\"$batch_option\" " . (($batch == $batch_option) ? 'selected' : '') . ">$batch_option</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="filter-btn">Filter</button>
            </form>
            <div class="add-new-student" id="addStudentIcon">
                <label for="add">Add New</label>
                <i class="bi bi-person-plus-fill"></i>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="header">Name</th>
                    <th class="header">Email</th>
                    <th class="header">Position</th>
                    <th class="header">Status</th>
                    <th class="header">Password</th>
                    <th class="header">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $position = $row['position'];
                    $status = $row['status'];
                    $password = $row['password'];

                    if (is_password_hash($password)) {
                        $password = '-Password Changed-';
                    }

                    echo "<tr>
                            <td>{$name}</td>
                            <td>{$email}</td>
                            <td>{$position}</td>
                            <td>{$status}</td>
                            <td>
                                <i class='bi bi-lock-fill' id='lock-{$id}' onclick='showPasswordInput(\"{$id}\")'> Locked</i>
                                <input type='password' id='password-{$id}' value='{$password}' class='password-field' style='display: none;' readonly>
                                <input type='password' id='input-{$id}' class='input-password' placeholder='MA Password' style='display: none;' onkeyup='checkPassword(\"{$id}\")'>
                            </td>
                            <td>
                                <i class='bi bi-pencil-fill' onclick='toggleEdit(this)'></i>
                                <div class='action-buttons' style='display: none;'>
                                    <button class='btn approve-btn' onclick='editCourse(\"{$row['id']}\", \"{$name}\",  \"{$email}\", \"{$password}\",\"{$status}\",\"{$position}\",\"{$row['department']}\")'>Edit</button>
                                    <button class='btn reject-btn' onclick='deleteCourse(\"{$row['id']}\"), (\"{$status}\")'>Delete</button>
                                </div>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <?php include __DIR__ ."/../modelForms/lecturerModelForm.php" ?>

    <script src="../../assets/popup.js"></script>
    <script src="../assets/enablePassword.js"></script>
    <script src="../assets/editLecturer.js"></script>

</body>

</html>

<?php include __DIR__ ."/../../../backend/MA/lecturerCRUD/addLecturer.php"; ?>