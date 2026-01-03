<?php
session_start();
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/admin_produtos.css">
    <link rel="shortcut icon" href="../img/icons/Logo-japao-sem-fundo.ico" type="image/x-icon">
    <title>Admin - Cadastrar Produto</title>
    
</head>
<body>
<div class="admin-form-container">
<h2>Cadastrar Produto</h2>

<form action="salvar_produto.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="nome_produto" placeholder="Nome do produto" required>

    <textarea name="descricao" placeholder="Descrição do produto" rows="4" required></textarea>

    <input type="text" name="marca" placeholder="Marca">

    <input type="text" name="categoria" placeholder="Categoria" required>

    <input type="text" name="subcategoria" placeholder="Subcategoria" required>

    <input type="number" step="0.01" name="preco_venda" placeholder="Preço de venda" required>

    <input type="number" name="estoque" placeholder="Estoque" required>

    <input type="text" name="unidade_medida" placeholder="Unidade (kg, un, pct)">

    <select name="tipo_venda" required>
        <option value="">Tipo de venda</option>
        <option value="unidade">Por unidade</option>
        <option value="kg">Por peso (kg)</option>
    </select>


    <label>Imagem do produto:</label>
    <input type="file" name="imagem" accept="image/*" required>

    <button type="submit">Cadastrar Produto</button>

</form>
</div>
</body>
</html>
