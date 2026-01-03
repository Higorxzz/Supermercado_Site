<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="shortcut icon" href="../img/icons/Logo-japao-sem-fundo.ico" type="image/x-icon">
    <title>Verificar E-mail</title>
</head>

<body>

<div class="container">
    <h2>Verifique seu e-mail</h2>
    <p>Enviamos um código de 6 dígitos.</p>

    <form action="verificar_codigo.php" method="POST">
        <input type="text" name="codigo" maxlength="6" placeholder="Código" required>
        <button type="submit">Confirmar</button>
    </form>
</div>

</body>
</html>
