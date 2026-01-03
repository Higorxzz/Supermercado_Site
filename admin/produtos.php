<?php
session_start();

$produtos = $pdo->query("SELECT * FROM produtos ORDER BY id_produto DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Produtos</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<div class="admin-container">

<?php include "menu.php"; ?>

<main class="main-content">

<h2>Produtos cadastrados</h2>

<table class="table">
<tr>
  <th>Imagem</th>
  <th>Nome</th>
  <th>Preço</th>
  <th>Estoque</th>
</tr>

<?php foreach ($produtos as $p): ?>
<tr>
  <td>
    <?php if ($p['imagem']): ?>
      <img src="../<?= $p['imagem'] ?>" width="50">
    <?php endif; ?>
  </td>
  <td><?= $p['nome_produto'] ?></td>
  <td>R$ <?= number_format($p['preco_venda'],2,',','.') ?></td>
  <td><?= $p['estoque'] ?></td>
</tr>
<?php endforeach; ?>
</table>

</main>
</div>

</body>
</html>
