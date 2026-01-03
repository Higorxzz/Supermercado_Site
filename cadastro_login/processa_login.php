<?php
session_start();
require "../php/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

// BUSCAR USUÁRIO
$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$sql->execute([$email]);

$usuario = $sql->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("E-mail não encontrado.");
}

// VERIFICAR SENHA
if (!password_verify($senha, $usuario['senha'])) {
    die("Senha incorreta.");
}

// LOGIN OK → CRIAR SESSÃO
$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nome'] = $usuario['nome_completo'];
$_SESSION['usuario_tipo'] = $usuario['tipo_usuario'];

header("Location: ../index.php");
exit;
?>