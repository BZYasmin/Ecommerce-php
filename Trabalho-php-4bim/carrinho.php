<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="carrinho.css">
</head>
<body>
<?php
session_start();

if (isset($_COOKIE['carrinho'])) {
    $carrinho = json_decode($_COOKIE['carrinho'], true);
    echo "<h1>Seu Carrinho</h1>";
    echo "<ul>";
    foreach ($carrinho as $item) {
        echo "<li>Produto ID: $item</li>"; 
    }
    echo "</ul>";
} else {
    echo "<p>Seu carrinho está vazio.</p>";
}
?>
</body>
</html>
