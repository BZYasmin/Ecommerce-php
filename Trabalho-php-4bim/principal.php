<?php

$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos de Beleza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Beauty</h1>
        <nav>
            <a href="index.php">Login</a> | 
            <a href="carrinho.php">Carrinho</a>
        </nav>
    </header>

    <main>
        <h2>Produtos</h2>
        <div class="produtos">
         <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='produto'>";
                    echo "<img src='imgs/" . $row['imagem'] . "' alt='" . $row['nome'] . "'>";
                    echo "<h3>" . $row['nome'] . "</h3>";
                    echo "<p>" . $row['descricao'] . "</p>";
                    echo "<p>R$ " . number_format($row['preco'], 2, ',', '.') . "</p>";
                    echo "<a href='adicionar_carrinho.php?id=" . $row['id'] . "'>Adicionar ao Carrinho</a>";
                    echo "</div>";
                }
            } else {
                echo "Nenhum produto encontrado.";
            }
            ?>
        </div>
    </main>
</body>
</html>

<?php
$conn->close();
?>
