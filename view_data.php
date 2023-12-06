<?php include_once("header.php"); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("connect.php");

// Conectar ao banco de dados
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Processar exclusão se um ID for fornecido na consulta
if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $delete_query = "DELETE FROM class WHERE id = '$delete_id'";
    
    if ($conn->query($delete_query) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Query para obter dados da tabela
$sql = "SELECT id, name, email FROM class";
$result = $conn->query($sql);

// Verificar se há dados
if ($result->num_rows > 0) {
    echo "<h2>Data from Database</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>";

    // Loop através dos resultados e exibir na tabela
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td>";
        echo "<td><a href='view_data.php?delete_id={$row['id']}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<p><a href='login.php'>Add new record</a></p>";
} else {
    echo "No data in the database.";
}

// Fechar a conexão
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
  <title>Add or delete your data</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
      text-align: center;
    }

    h2 {
      color: #673ab7;
    }

    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 15px;
      text-align: center;
    }

    th {
      background-color: #673ab7;
      color: #fff;
    }

    p {
      text-align: center;
      margin-top: 20px;
    }

    a {
      color: #673ab7;
      text-decoration: none;
    }

  </style>
</head>
<body>
  <a href="logout.php" class="center-icon-flex">Logout</a>
  <footer>
  <?php include_once("footer.php"); ?>
  </footer>
</body>
</html>

