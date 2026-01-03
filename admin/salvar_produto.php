<?php
session_start();
require "../php/conexao.php";

// segurança admin
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    die("Acesso negado");
}

// =====================
// DADOS DO FORM
// =====================
$nome      = $_POST['nome_produto'];
$marca     = $_POST['marca'];
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];
$descricao = $_POST['descricao'];
$venda     = $_POST['preco_venda'];
$estoque   = $_POST['estoque'];
$unidade   = $_POST['unidade_medida'];
$tipoVenda    = $_POST['tipo_venda'];


// =====================
// UPLOAD DA IMAGEM
// =====================
$caminhoImagem = null;

if (!empty($_FILES['imagem']['name'])) {
    $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    $nomeArquivo = uniqid() . "." . $ext;

    // caminho relativo que será salvo no banco
    $caminhoImagem = "img/produtos/" . $nomeArquivo;

    // caminho real no servidor
    $destinoFisico = __DIR__ . "img/produtos/" . $nomeArquivo;

    move_uploaded_file($_FILES['imagem']['tmp_name'], $destinoFisico);
}

// =====================
// INSERIR NO BANCO
// =====================
$sql = $pdo->prepare("
    INSERT INTO produtos 
    (nome_produto, marca, categoria, subcategoria, descricao, preco_venda, estoque, unidade_medida, tipo_venda, imagem)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$sql->execute([
    $nome,
    $marca,
    $categoria,
    $subcategoria,
    $descricao,
    $venda,
    $estoque,
    $unidade,
    $tipoVenda,
    $caminhoImagem
]);

header("Location: cadastrar_produto.php?sucesso=1");
exit;
?>