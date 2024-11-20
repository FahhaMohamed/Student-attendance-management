<?php
include __DIR__ . "/../config/connection.php";

//Accept the request

if (isset($_POST['approve'])) {

    $id = $_POST['id'];

    $select = "UPDATE students SET status = 'Active' WHERE id='$id'";

    $result = mysqli_query($conn, $select);

    echo "<script type = 'text/javascript'>";
    echo "alert('User Approved!');";
    echo "window.location.href = 'approval.php'";
    echo "</script>";

}



//Decline the active student

if (isset($_POST['decline'])) {

    $id = $_POST['id'];

    $select = "UPDATE students SET status = 'Pending' WHERE id='$id'";

    $result = mysqli_query($conn, $select);


}

//Delete user and reject request

if (isset($_POST['deny'])) {

    $id = $_POST['id'];

    $select = "UPDATE students SET status = 'Null' WHERE id='$id'";

    $result = mysqli_query($conn, $select);


}