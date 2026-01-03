<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Login – Supermercado Japão</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
<?php
if (isset($_SESSION['erro_login'])) {
  echo "<p style='color:red'>" . $_SESSION['erro_login'] . "</p>";
  unset($_SESSION['erro_login']);
}
?>

<div class="container">
    <div class="logo">
        <img src="../img/logo/Logo-japao-completa-com-fundo.png">
    </div>

    <h2>Entrar</h2>

    <form action="processa_login.php" method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>

        <button type="submit">Entrar</button>
    </form>

    <p style="margin-top:10px;">
        Não tem conta? <a href="etapa1.php">Cadastre-se</a>
    </p>
</div>

</body>
</html>
