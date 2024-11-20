function toggleTextBox() {
    var batch = document.getElementById("tbatch");
    var dropdown = document.getElementById("selectPosition");

    if (dropdown.value === "") {
        batch.style.display = "inline";
    } else {
        batch.style.display = "none";
    }
}

function toggleEdit(element) {
    var actionButtons = element.nextElementSibling;
    actionButtons.style.display = "block";
    element.style.display = "none";
}

function editCourse(id, name, email, password, status, position, department) {
    document.getElementById("modalTitle").innerText = "Edit Lecturer";
    document.getElementById("lecturerId").value = id;
    document.getElementById("name").value = name;
    document.getElementById("selectPosition").value = position;
    document.getElementById("department").value = department;

    if (status === 'Null') {
        document.getElementById("email").value = email;
        document.getElementById("password").value = password;
        document.getElementById("email").type = "text";
        document.getElementById("password").type = "text";
        document.getElementById("mail").style.display = "block";  // Ensure labels are visible
        document.getElementById("pass").style.display = "block";
    } else {
        document.getElementById("mail").style.display = "none";
        document.getElementById("pass").style.display = "none";
        document.getElementById("email").type = "hidden";
        document.getElementById("password").type = "hidden";
    }
    
    document.getElementById("addStudentModal").style.display = "block";
}



function deleteCourse(id, status) {
    if (status === "Active") {
      alert("Can't delete, Lecturer is in Active");
    } else {
      if (confirm("Are you sure to remove this Lecturer?")) {
        var xhr = new XMLHttpRequest();
        xhr.open(
          "POST",
          "../../../backend/MA/lecturerCRUD/deleteLecturer.php",
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
            alert("An error occurred while deleting the lecturer");
          }
        };
        xhr.onerror = function () {
          alert("Request failed");
        };
        console.log("Sending request to delete lecturer with ID:", id);
        xhr.send("id=" + id);
      }
    }
  }

function closeModal() {
    document.getElementById("addStudentModal").style.display = "none";
    document.getElementById("form").reset();
    document.getElementById("modalTitle").innerText = "Add New Lecturer";
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