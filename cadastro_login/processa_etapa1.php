<?php
session_start();

$_SESSION['nome_completo'] = $_POST['nome_completo'];
$_SESSION['cpf']  = $_POST['cpf'];
$_SESSION['data_nascimento'] = $_POST['data_nascimento'];

header("Location: etapa2.php");
exit;
?>
