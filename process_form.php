<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if $conn is defined and there is a connection error
    if (!isset($conn) || $conn->connect_error) {
        die("Connection failed: " . ($conn ? $conn->connect_error : "Not connected to the database."));
    }

    // Validate and sanitize input
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if the ID already exists in the table
    $check_query = "SELECT id FROM class WHERE id = '$id'";
    $result = $conn->query($check_query);

    if (!$result) {
        die("Error checking ID: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "Error: ID already exists.";
    } else {
        // Insert the new record
        $sql = "INSERT INTO class (id, name, email, password) VALUES ('$id', '$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to view_data.php
            header("Location: view_data.php");
            exit();
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
}
?>
