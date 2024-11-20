<?php

function is_password_hash($password)
{
    return preg_match('/^\$2y\$/', $password) === 1;
}