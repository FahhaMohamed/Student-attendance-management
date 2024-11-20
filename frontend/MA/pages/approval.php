<?php

include (__DIR__ . "/../../utils/sessions.php");

_session("MA");

include "../../../backend/config/connection.php";

include __DIR__ . "/../../../backend/MA/approvalDecision.php";

include __DIR__ . "/../../../backend/MA/filterApproval.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/approvalStyle.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Management Assistant</title>
</head>

<body>
    <?php include ("../../models/sidebar.php") ?>

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
                            echo 'selected'; ?>>All status</option>
                        <option value="Active" <?php if ($filter == 'Active')
                            echo 'selected'; ?>>Active</option>
                        <option value="Pending" <?php if ($filter == 'Pending')
                            echo 'selected'; ?>>Pending</option>
                    </select>
                </div>
                <div class="select-cont">
                    <select id="batch" name="select" class="dropdown">
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
        </div>

        <table>
            <thead>
                <tr>
                    <th class="header">Reg no</th>
                    <th class="header">Name</th>
                    <th class="header">Email</th>
                    <th class="header">Status</th>
                    <th class="header">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['regNo']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['status']}</td>
                            <td>";
                    if ($row['status'] === 'Active') {
                        echo "<form action='approval.php' method='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button class='btn decline-btn' type='submit' name='decline'>Decline</button>
                              </form>";
                    } else {
                        echo "<form action='approval.php' method='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button class='btn approve-btn' type='submit' name='approve'>Approve</button>
                                <button class='btn reject-btn' type='submit' name='deny'>Reject</button>
                              </form>";
                    }
                    echo "</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>