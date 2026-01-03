<?php
session_start();

$_SESSION['email']    = $_POST['email'];
$_SESSION['telefone'] = $_POST['telefone'];
$_SESSION['senha']    = password_hash($_POST['senha'], PASSWORD_DEFAULT);

header("Location: etapa3.php");
exit;
?>
