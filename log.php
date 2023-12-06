<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("connect.php");
session_start();

function authenticateUser($username, $password) {
    $validemail = '';
    $validpassword = '';
    return ($username === $validemail && $password === $validpassword);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (authenticateUser($username, $password)) {
        $_SESSION['email'] = $email;
        $_SESSION['login_time'] = time();
    } else {
        $errorMessage = "Invalid Email or Password";
        echo "Error: Invalid credentials for email: " . htmlspecialchars($email);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="./css/styles.css">
    <?php include_once("header.php"); ?>
</head>

<body>
    <div class="login-container">
        <div class="center-icons-flex">
            <form action="process_login.php" method="post">
                <h2>Login | View Data</h2>
                <p></p>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
        <footer>
            <?php include_once("footer.php"); ?>
        </footer>
    
