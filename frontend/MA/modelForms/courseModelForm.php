<?php include __DIR__ . "/../../../backend/MA/courseCRUD/addCourse.php" ?>

<form method="POST" action="">
    <div id="addStudentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle">Add New Course</h2>

            <input type="hidden" id="courseId" name="courseId">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <label for="code">Course code:</label>
            <input type="text" id="code" name="code" placeholder="EC5070">

            <label for="department">Department:</label>
            <div class="select-batch">
                <div class="drop">
                    <select name="department" id="department">
                        <option value="">Select department</option>
                        <?php
                        $sql_batches = "SELECT DISTINCT department FROM employee";
                        $result = mysqli_query($conn, $sql_batches);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . htmlspecialchars($row['department']) . "\">" . htmlspecialchars($row['department']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label for="semester">Semester:</label>
            <div class="select-batch">
                <div class="drop">
                    <select name="semester" id="semester">
                        <option value="">Select semester</option>
                        <?php
                        $sql_batches = "SELECT * FROM semesters";
                        $result = mysqli_query($conn, $sql_batches);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . htmlspecialchars($row['id']) . "\">" . htmlspecialchars($row['semester']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label for="labs">Labs:</label>
            <input type="number" id="labs" name="labs">

            <label for="assignments">Assignments:</label>
            <input type="number" id="assignments" name="assignments">

            <button type="submit" name="add"
                style="width: 100%; padding: 15px; margin: 20px 0; display: block; border: none; border-radius: 5px; background-color: #007bff; color: #fff; cursor: pointer; font-size: 16px; font-weight: bold; transition: background-color 0.3s;">Save
                Course</button>


        </div>
    </div>
</form>