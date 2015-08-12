<?php
/*
* Functions file, full of commonly used parts
*/

function hashPassword($password) {

    $password = hash("sha256", $password);
    $password = md5($password);
    
    return $password;

}

function sanitised($input) {

    include 'include/connection.php';

    $output = htmlspecialchars($input);
    $output = mysqli_real_escape_string($connection, $output);
    
    return $output;

}

function loggedIn() {

    return isset($_COOKIE["User"]);

}
