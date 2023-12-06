<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("connect.php");
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION['user_id'])) {
    // Se estiver logado, redirecione para a página principal ou faça qualquer outra coisa
    header("Location: view_data.php");
    exit();
}
// Processar o formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Coloque aqui o código de processamento do formulário de login
    include("process_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="./css/styles.css">
    <?php include_once("header.php");?>
</head>

<body>
    <div class="subscribe-container center-icons-flex">
        <form action="process_form.php" method="post">
            <h2>Subscribe</h2>
                <p></p>
            <label for="id">Student ID:</label>
            <input type="text" id="id" name="id" required><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit" name="subscribe">Subscribe</button>
        </form>
    </div>
</body>
    <footer>
    <?php include_once("footer.php"); ?>
    </footer>
</html>

