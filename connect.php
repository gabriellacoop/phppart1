<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hostname = "localhost";
$mydatabase = "project";
$username = "root";
$password = "";

$conn = new mysqli($hostname, $username, $password, $mydatabase);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
