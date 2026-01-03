<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="shortcut icon" href="../img/icons/Logo-japao-sem-fundo.ico" type="image/x-icon">
    <title>Cadastro – Etapa 1</title>
    
</head>
<body>

<div class="container">
    <div class="logo">
        <img src="../img/logo/Logo-japao-completa-com-fundo.png">
    </div>

    <h2>Cadastro</h2>

    <form action="processa_etapa1.php" method="POST">

        <input type="text" name="nome_completo" placeholder="Nome completo" required>

        <input type="text" name="cpf" placeholder="CPF (somente números)" maxlength="11" required>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento" required>

        <button type="submit">Continuar</button>
        
    </form>
</div>

</body>
</html>
