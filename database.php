<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'studentdb';

$connection = mysqli_connect($host, $user, $password, $database);

if($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    // echo "Successfully connect";
}

?>