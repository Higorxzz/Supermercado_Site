<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="shortcut icon" href="../img/icons/Logo-japao-sem-fundo.ico" type="image/x-icon">
    <title>Cadastro – Etapa 2</title>

    <script>
        function validarSenha() {
            let senha = document.getElementById("senha").value;
            let confirmar = document.getElementById("confirmar").value;

            let maiuscula = /[A-Z]/.test(senha);
            let minuscula = /[a-z]/.test(senha);
            let numero = /[0-9]/.test(senha);
            let simbolo = /[\W_]/.test(senha);

            if (!maiuscula || !minuscula || !numero || !simbolo || senha.length < 8) {
                alert("A senha deve conter:\n- 1 letra maiúscula\n- 1 letra minúscula\n- 1 número\n- 1 símbolo\n- mínimo 8 caracteres");
                return false;
            }

            if (senha !== confirmar) {
                alert("As senhas não coincidem!");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>

<div class="container">
    <div class="logo">
        <img src="../img/logo/Logo-japao-completa-com-fundo.png">
    </div>

    <h2>Contato e Segurança</h2>

    <form action="processa_etapa2.php" method="POST" onsubmit="return validarSenha()">

        <input type="email" name="email" placeholder="E-mail" required>

        <input type="text" name="telefone" maxlength="11" placeholder="Telefone" required>

        <input type="password" id="senha" name="senha" placeholder="Senha" required>

        <input type="password" id="confirmar" placeholder="Confirmar senha" required>

        <button type="submit">Continuar</button>
    </form>
</div>

</body>
</html>
