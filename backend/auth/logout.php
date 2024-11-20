<?php

    session_start();
    session_destroy();
    header("Location: ../../frontend/students/pages/auth/login.php");

