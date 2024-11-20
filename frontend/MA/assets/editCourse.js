function toggleEdit(element) {
  var actionButtons = element.nextElementSibling;
  actionButtons.style.display = "block";
  element.style.display = "none";
}

function editCourse(id, name, code, labs, assignments, department, semester) {
  document.getElementById("modalTitle").innerText = "Edit Course";
  document.getElementById("courseId").value = id;
  document.getElementById("name").value = name;
  document.getElementById("code").value = code;
  document.getElementById("labs").value = labs;
  document.getElementById("assignments").value = assignments;
  document.getElementById("department").value = department;
  document.getElementById("semester").value = semester; // Set the semester value
  document.getElementById("addStudentModal").style.display = "block";
}

function deleteCourse(id) {
  if (confirm("Are you sure to remove this Course?")) {
    var xhr = new XMLHttpRequest();
    xhr.open(
      "POST",
      "../../../backend/MA/courseCRUD/deleteCourse.php",
      true
    );
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      console.log("Response status:", xhr.status);
      console.log("Response text:", xhr.responseText);

      if (xhr.status === 200) {
        alert(xhr.responseText); // Show the response from PHP
        if (xhr.responseText.includes("successfully")) {
          location.reload();
        }
      } else {
        alert("An error occurred while deleting the Course");
      }
    };
    xhr.onerror = function () {
      alert("Request failed");
    };
    console.log("Sending request to delete Course with ID:", id);
    xhr.send("id=" + id);
  }
}

function closeModal() {
  document.getElementById("addStudentModal").style.display = "none";
  document.getElementById("courseForm").reset();
  document.getElementById("modalTitle").innerText = "Add New Course";
  location.reload();
}

document.addEventListener('click', function(event) {
  var actionButtons = document.querySelectorAll('.action-buttons');
  actionButtons.forEach(function(buttons) {
      var pencilIcon = buttons.previousElementSibling;
      if (buttons.style.display === 'block' && !buttons.contains(event.target) && !pencilIcon.contains(event.target)) {
          buttons.style.display = 'none';
          pencilIcon.style.display = 'block';
      }
  });
});
