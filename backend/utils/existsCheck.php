<?php 
    if (!function_exists('existsCheck')) {
        function existsCheck($conn,$table, $checkKey, $checkValue) {
            $sql = "SELECT * FROM $table WHERE $checkKey = '$checkValue'";
            $execute = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($execute);
            return $count > 0;
        }
    }

