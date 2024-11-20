<?php
 function getAll($tablename) {
     
    include __DIR__."/../../backend/config/connection.php";
    
    $sql = "SELECT * from $tablename";
    $execute = mysqli_query($conn, $sql);

    return $execute;
 }