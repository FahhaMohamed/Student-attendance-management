<?php include __DIR__ ."/../../../backend/MA/lecturerCRUD/addLecturer.php" ?>

<div id="addStudentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalTitle">Add New Lecturer</h2>
        <form method="POST" action="">

            <input type="hidden" id="lecturerId" name="lecturerId">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="batch">Position:</label>
            <div class="select-batch">
                <div class="select-con">
                    <div class="drop">
                        <select name="batch-select" id="selectPosition" onclick="toggleTextBox()">
                            <option value="">Add New Position</option>
                            <?php
                            $sql_batches = "SELECT DISTINCT position FROM employee";
                            $result = mysqli_query($conn, $sql_batches);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['position']}'>{$row['position']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="text" id="tbatch" name="tbatch">
            </div>

            <label for="semester">Department:</label>
            <div class="select-batch">
                <div class="drop">
                    <select name="semester-select" id="department">
                        <option value="">Select department</option>
                        <?php
                        $sql_batches = "SELECT DISTINCT department FROM employee";
                        $result = mysqli_query($conn, $sql_batches);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['department']}'>{$row['department']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label for="email" id="mail">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password" id="pass">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="add" style="width: 100%; padding: 15px; margin: 20px 0; display: block; border: none; border-radius: 5px; background-color: #007bff; color: #fff; cursor: pointer; font-size: 16px; font-weight: bold; transition: background-color 0.3s;">Add Lecturer</button>
        </form>
    </div>
</div>
