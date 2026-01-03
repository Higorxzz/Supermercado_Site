<?php
session_start();

$id = $_POST['id_produto'];
$quantidade = (float) $_POST['quantidade'];

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_SESSION['carrinho'][$id])) {
    $_SESSION['carrinho'][$id]['quantidade'] += $quantidade;
} else {
    $_SESSION['carrinho'][$id] = [
        'id' => $id,
        'nome' => $_POST['nome'],
        'preco' => (float) $_POST['preco'],
        'tipo_venda' => $_POST['tipo_venda'],
        'quantidade' => $quantidade,
        'imagem' => $_POST['imagem']
    ];
}

header("Location: ../carrinho.php");
exit;
?>