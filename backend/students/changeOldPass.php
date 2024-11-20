<?php

    include __DIR__."/../config/connection.php";
    include __DIR__ ."/../../frontend/utils/isHash.php";

    if (isset($_POST['submit'])) {

        $email = $_SESSION['email'];
        $password = $_POST['password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        $error = array();

        $sql = "select * from students where email='$email'";
            
        $result = mysqli_query($conn, $sql);
            
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            

        if (empty($password) OR empty($confirm_password) OR empty($new_password)) {
            array_push($error, "Please fill all fields.");
        }
        if($row) {

            if(!is_password_hash($row["password"])) {
                $row["password"] = password_hash($row["password"], PASSWORD_DEFAULT);
            }

            if (password_verify($password, $row["password"])) {

                if ($new_password!==$confirm_password) {
                    array_push($error, "Password does not match.");
                }
                if (strlen($new_password)<8) {
                    array_push($error, "Weak Password, Please enter at least 8 characters");
                }if (count($error) > 0) {
                    echo '<div class="alert alert-danger">';
                    foreach ($error as $value) {
                        echo $value . '<br>';
                        break;
                    }
                    echo '</div>';
                }else {
        
                    $sql = "UPDATE students SET password = '$password_hash' WHERE email='$email'";
        
                    $resulti = mysqli_query($conn, $sql);
        
                    echo "<script type = 'text/javascript'>";
                    echo "alert('Password changed!');";
                    echo "window.location.href = '../home.php'";
                    echo "</script>";
                }

            }else {
                array_push($error, "Incorrect password.");

                echo '<div class="alert alert-danger">';
                foreach ($error as $value) {
                echo $value . '<br>';
                break;
                }
                echo '</div>';
            }
        }
        
        
    }

?>