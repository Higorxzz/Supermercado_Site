<?php
session_start();
require "../php/conexao.php";

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$totalProdutos = $pdo->query("SELECT COUNT(*) FROM produtos")->fetchColumn();
$totalUsuarios = $pdo->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Admin - Dashboard</title>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="shortcut icon" href="../img/icons/Logo-japao-sem-fundo.ico" type="image/x-icon">
</head>
<body>
<aside class="sidebar">
  <h2>Japão Admin</h2>
  <a href="index.php">📊 Dashboard</a>
  <a href="produtos.php">📦 Produtos</a>
  <a href="cadastrar_produto.php">➕ Cadastrar Produto</a>
  <a href="../index.php">🏠 Voltar ao site</a>
  <a href="../logout.php" class="btn-danger">🚪 Sair</a>
</aside>

<div class="admin-container">

<main class="main-content">

  <div class="topbar">
    <h1>Dashboard</h1>
  </div>

  <div class="cards">
    <div class="card">
      <h3>Produtos cadastrados</h3>
      <span><?= $totalProdutos ?></span>
    </div>

    <div class="card">
      <h3>Clientes cadastrados</h3>
      <span><?= $totalUsuarios ?></span>
    </div>
  </div>

</main>
</div>

</body>
</html>
