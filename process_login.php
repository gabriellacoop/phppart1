<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("connect.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if $conn is defined and there is a connection error
    if (!isset($conn) || $conn->connect_error) {
        die("Connection failed: " . ($conn ? $conn->connect_error : "Not connected to the database."));
    }

    // Validate and sanitize input
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if the email and password match in the table
    $check_query = "SELECT * FROM class WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($check_query);

    if (!$result) {
        die("Error checking login: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // Login successful, redirect to view_data.php or another page
        header("Location: view_data.php");
        exit();
    } else {
        // Error message for invalid credentials
        $errorMessage = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="your_styles.css"> <!-- Replace with your actual stylesheet link -->
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">
        <form action="welcome.php" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>

        <?php if (isset($errorMessage)) : ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>
