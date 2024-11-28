 <?php
session_start();

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    $produto = $id_produto; 

    if (isset($_COOKIE['carrinho'])) {
        $carrinho = json_decode($_COOKIE['carrinho'], true);
    } else {
        $carrinho = [];
    }
    $carrinho[] = $produto;

    setcookie('carrinho', json_encode($carrinho), time() + 3600); 
    header("Location: carrinho.php");
}
?> 
