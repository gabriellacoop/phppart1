<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("connect.php");

$upload_directory = __DIR__ . '/img/';


// Processar o formulário de upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    // Verificar se o arquivo foi enviado sem erros
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Obter informações sobre o arquivo enviado
        $file_name = basename($_FILES['image']['name']);
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];

        // Pasta de destino para salvar a imagem (certifique-se de ter permissões adequadas)
        $upload_directory = "img/";

        // Caminho completo para o arquivo
        $target_path = $upload_directory . $file_name;

        // Verificar se o arquivo é uma imagem
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (!in_array($file_type, $allowed_types)) {
            die("Error: Only JPEG, PNG, and GIF images are allowed.");
        }

        // Verificar o tamanho do arquivo (limite de 5 MB)
        $max_size = 5 * 1024 * 1024; // 5 MB em bytes
        if ($file_size > $max_size) {
            die("Error: File size exceeds the limit of 5 MB.");
        }

        // Mover o arquivo para o diretório de upload
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            // Inserir informações na tabela pic
            $insert_query = "INSERT INTO pic (file_name, upload_timestamp) VALUES ('$file_name', NOW())";

            if ($conn->query($insert_query) === TRUE) {
                echo "Upload successful!";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error: " . $_FILES['image']['error'];
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
    <title>Upload Picture</title>
    <?php include_once("header.php"); ?>
</head>

<body>
    <div class="center-icons-flex">
        <div class="subscribe-container">
            <h2>Upload Your Picture</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="image">Choose an image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <button type="submit" name="upload">Upload</button>
        </form>
    </div>
    </div>
    <footer>
        <?php include_once("footer.php"); ?>
    </footer>
</body>

</html>
