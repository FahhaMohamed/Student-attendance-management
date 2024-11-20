<?php
include __DIR__ ."/../../../backend/MA/studentCRUD/addStudent.php";
?>



<form method="POST" action="">
    <div id="addStudentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle">Add New Student</h2>

            <input type="hidden" id="studentId" name="studentId">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="regNo">Registration Number:</label>
            <input type="text" id="regNo" name="regNo" placeholder="20XX/E/XXX" required>

            <label for="batch">Batch:</label>
            <div class="select-batch">
                <div class="select-con">
                    <div class="drop">
                        <select name="batch-select" id="selectBatch" onclick="toggleTextBox()">
                            <option value="">Add New Batch</option>
                            <?php
                            $sql_batches = "SELECT * FROM batches";
                            $result = mysqli_query($conn, $sql_batches);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['batch']}'>{$row['batch']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="text" name="tbatch" placeholder="XXBatch" id="tbatch" >
            </div>

            <label for="semester">Semester:</label>
            <div class="select-batch">
                <div class="drop">
                    <select name="semester-select" id="semester">
                        <option value="">Select semester</option>
                        <?php
                        $sql_batches = "SELECT * FROM semesters";
                        $result = mysqli_query($conn, $sql_batches);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['semester']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label for="email" id="mail">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password" id="pass">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="add" style="width: 100%; padding: 15px; margin: 20px 0; display: block; border: none; border-radius: 5px; background-color: #007bff; color: #fff; cursor: pointer; font-size: 16px; font-weight: bold; transition: background-color 0.3s;">Save Student</button>
        </div>
    </div>
</form>
