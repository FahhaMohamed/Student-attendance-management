const students = ['Student A', 'Student B', 'Student C', 'Student D'];

function addRow() {
    const tbody = document.getElementById('courseTableBody');
    const tr = document.createElement('tr');

    tr.innerHTML = `
    <td>
        <select name='course'>
            <option value="">Select</option>
            <?php
                $courses = getAll("courses");
                while ($row = mysqli_fetch_assoc($courses)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<option value='$id'>$name</option>";
                }
            ?>
        </select>
    </td>
    <td>
        <select name='lecturer'>
            <option value="">Select</option>
            <?php
                $lecturers = getAll("employee");
                while ($row = mysqli_fetch_assoc($lecturers)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<option value='$id'>$name</option>";
                }
            ?>
        </select>
    </td>
    <td>
        <select name='batch'>
            <option value="">Select</option>
            <?php
                $batches = getAll("batches");
                while ($row = mysqli_fetch_assoc($batches)) {
                    $batch = $row['batch'];
                    echo "<option value='$batch'>$batch</option>";
                }
            ?>
        </select>
    </td>
    <td>
        <button type="button" onclick="openModal()">View</button>
    </td>
    <td>
        <button type="button" onclick="deleteRow(this)">Delete</button>
    </td>
    `;

    tbody.appendChild(tr);
}

function deleteRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function openModal() {
    const modal = document.getElementById('studentModal');
    const studentList = document.getElementById('studentList');
    studentList.innerHTML = '';

    students.forEach(student => {
        const label = document.createElement('label');
        label.innerHTML = `<input type="checkbox" class="studentCheckbox"> ${student}`;
        studentList.appendChild(label);
        studentList.appendChild(document.createElement('br'));
    });

    modal.style.display = 'block';
}

function closeModal() {
    document.getElementById('studentModal').style.display = 'none';
}

document.getElementById('selectAll').addEventListener('change', function () {
    const checkboxes = document.querySelectorAll('.studentCheckbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

window.onclick = function (event) {
    const modal = document.getElementById('studentModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
