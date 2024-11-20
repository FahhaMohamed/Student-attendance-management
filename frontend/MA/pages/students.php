<?php
include (__DIR__ . "/../../utils/sessions.php");
_session("MA");

include "../../../backend/config/connection.php";
include __DIR__ . "/../../../backend/MA/approvalDecision.php";
include __DIR__ . "/../../../backend/MA/filterApprovalModified.php";
include __DIR__ . "/../../utils/isHash.php";

//for brake the twice problem
if (isset($_POST['add'])) {
    include __DIR__ . "/../../../backend/MA/studentCRUD/addStudent.php";
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
    <title>MA - Students list</title>
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
                        <option value="All status" <?php if ($filter == 'All status') echo 'selected'; ?>>All status</option>
                        <option value="Active" <?php if ($filter == 'Active') echo 'selected'; ?>>Active</option>
                        <option value="Pending" <?php if ($filter == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Null" <?php if ($filter == 'Null') echo 'selected'; ?>>Null</option>
                    </select>
                </div>
                <div class="select-cont">
                    <select id="batch" name="batch" class="dropdown">
                        <option value="">All batches</option>
                        <?php
                        $sql_batches = "SELECT * FROM batches";
                        $result_batches = mysqli_query($conn, $sql_batches);
                        while ($row_batch = mysqli_fetch_assoc($result_batches)) {
                            $batch_option = $row_batch['batch'];
                            echo "<option value=\"$batch_option\" " . (($batch == $batch_option) ? 'selected' : '') . ">$batch_option</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="filter-btn">Filter</button>
            </form>
            <div class="add-new-student" id="addStudentIcon" onclick="openModal()">
                <label for="add">Add New</label>
                <i class="bi bi-person-plus-fill"></i>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="header">Reg no</th>
                    <th class="header">Name</th>
                    <th class="header">Email</th>
                    <th class="header">Status</th>
                    <th class="header">Password</th>
                    <th class="header">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $regNo = $row['regNo'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $status = $row['status'];
                    $password = $row['password'];

                    if (is_password_hash($password)) {
                        $password = '-Password Changed-';
                    }

                    echo "<tr>
                            <td>{$regNo}</td>
                            <td>{$name}</td>
                            <td>{$email}</td>
                            <td>{$status}</td>
                            <td>
                                <i class='bi bi-lock-fill' id='lock-{$regNo}' onclick='showPasswordInput(\"{$regNo}\")'> Locked</i>
                                <input type='password' id='password-{$regNo}' value='{$password}' class='password-field' style='display: none;' readonly>
                                <input type='password' id='input-{$regNo}' class='input-password' placeholder='MA Password' style='display: none;' onkeyup='checkPassword(\"{$regNo}\")'>
                            </td>
                            <td>
                                <i class='bi bi-pencil-fill' onclick='toggleEdit(this)'></i>
                                <div class='action-buttons' style='display: none;'>
                                    <button class='btn approve-btn' onclick='editCourse(\"{$row['id']}\", \"{$name}\",  \"{$email}\", \"{$password}\",\"{$status}\",\"{$regNo}\",\"{$row['batch']}\",\"{$row['semester']}\")'>Edit</button>
                                    <button class='btn reject-btn' onclick='deleteCourse(\"{$row['id']}\",\"{$status}\")'>Delete</button>
                                </div>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <?php include __DIR__ ."/../modelForms/studentModelForm.php" ?>

    <script src="../../assets/popup.js"></script>
    <script src="../assets/enablePassword.js"></script>
    <script src="../assets/editStudent.js"></script>
</body>
</html>

<?php include __DIR__ ."/../../../backend/MA/studentCRUD/addStudent.php"; ?>
