<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA - Course Allocation</title>
    <link rel="stylesheet" href="../assets/allocationFormStyle.css">
</head>

<body>

    <div class="controls">
        <select id="semester" class="styled-select" name="semester">
            <option value="All">All Semesters</option>
            
            <?php
             
                include __DIR__ ."/../../utils/getAll.php";
                
                $isGetAll = getAll("semesters");

                while ($result = mysqli_fetch_assoc($isGetAll) ) {
                    $semester_id = $result['id'];
                    $semester = $result['semester'];

                    echo "<option value=\"$semester_id\"" . (($filter_semester == $semester_id) ? ' selected' : '') . ">$semester</option>";
                }
             ?>
        </select>
        <input type="text" id="title" placeholder="Enter Title" class="styled-input" required>
    </div>

    <br>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Course</th>
                <th>Lecturers</th>
                <th>Batch</th>
                <th>Select Students</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="courseTableBody">
        </tbody>
    </table>

    <br>

    <div class="buttons">
        <button class="styled-button" onclick="addRow()">Add</button>
        <button class="styled-button">Save</button>
    </div>

    <!-- The Modal -->
    <div id="studentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Select Students</h2>
            <label><input type="checkbox" id="selectAll"> Select All</label>
            <div id="studentList">
                <!-- Student checkboxes will be dynamically added here -->
            </div>
        </div>
    </div>

    <script src="../assets/allocationForm.js"></script>
</body>

</html>
