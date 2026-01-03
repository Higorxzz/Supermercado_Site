<?php
session_start();
require "../php/conexao.php";

// PEGAR DADOS DAS SESSIONS
$nome  = $_SESSION['nome_completo'];
$cpf   = $_SESSION['cpf'];
$nasc  = $_SESSION['data_nascimento'];

$email = $_SESSION['email'];
$tel   = $_SESSION['telefone'];
$senha = $_SESSION['senha'];

$endereco = $_POST['endereco'];

// ======================
// 1. INSERIR NO BANCO
// ======================
$sql = $pdo->prepare("INSERT INTO usuarios 
(nome_completo, email, senha, telefone, data_nascimento, cpf, tipo_usuario, endereco) 
VALUES (?, ?, ?, ?, ?, ?, 'cliente', ?)");

$sql->execute([$nome,$email,$senha,$tel,$nasc,$cpf,$endereco]);

// ======================
// 2. GERAR CÓDIGO
// ======================
$codigo = rand(100000,999999);
$_SESSION['codigo'] = $codigo;

// ======================
// 3. ENVIAR E-MAIL VIA PHPMailer
// ======================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php/PHPMailer/src/Exception.php';
require '../php/PHPMailer/src/PHPMailer.php';
require '../php/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';

try {
    // CONFIGURAÇÕES SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'higorgabriel15032006@gmail.com'; 
    $mail->Password   = 'neny rgzg hgan kurs'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
            'cafile'            => 'C:/xampp/apache/bin/cacert.pem'
        ]
        ];

    // REMETENTE
    $mail->setFrom('higorgabriel15032006@gmail.com', 'Supermercado Japão');

    // DESTINATÁRIO
    $mail->addAddress($email);

    // CONTEÚDO
    $mail->isHTML(true);
$mail->Subject = "Código de Verificação – Supermercado Japão";
$mail->Body = "
<table width='100%' cellpadding='0' cellspacing='0' style='background:#f4f4f4; padding:20px; font-family:Arial, sans-serif;'>
  <tr>
    <td align='center'>
      <table width='500' cellpadding='0' cellspacing='0' style='background:white; border-radius:10px; overflow:hidden; box-shadow:0 0 10px rgba(0,0,0,0.1);'>

        <!-- HEADER -->
        <tr>
          <td align='center' style='background:#f4f4f4; padding:20px;'>
            <img src='https://seeklogo.com/images/J/Jap__o_Supermercados-logo-59CC9DF306-seeklogo.com.png' alt='Logo' style='max-width:150px;'>
          </td>
        </tr>

        <!-- TÍTULO -->
        <tr>
          <td style='padding:25px; text-align:center;'>
            <h2 style='color:#333; margin:0;'>Código de Verificação</h2>
            <p style='color:#666; font-size:15px; margin-top:10px;'>
              Use o código abaixo para confirmar sua conta no <b>Supermercado Japão</b>.
            </p>
          </td>
        </tr>

        <!-- CÓDIGO -->
        <tr>
          <td align='center' style='padding:10px 0 30px 0;'>
            <div style='background:#f4f4f4; color:black; width:200px; padding:15px 0; border-radius:8px; 
                        font-size:28px; font-weight:bold; letter-spacing:4px;'>
              $codigo
            </div>
          </td>
        </tr>

        <!-- MENSAGEM -->
        <tr>
          <td style='padding:0 25px 25px 25px; color:#555; font-size:14px; line-height:22px;'>
            Se você não solicitou este código, apenas ignore este e-mail.  
            Caso tenha dúvidas, entre em contato com o suporte do aplicativo.
          </td>
        </tr>

        <!-- FOOTER -->
        <tr>
          <td align='center' style='background:#fafafa; padding:15px; color:#999; font-size:12px;'>
            Supermercado Japão © 2025<br>
            Este é um e-mail automático. Não responda.
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>
";

    $mail->AltBody = "Seu código de verificação é: $codigo";

    $mail->send();

} catch (Exception $e) {
    die("Erro ao enviar e-mail: {$mail->ErrorInfo}");
}

// REDIRECIONAR PARA A TELA DE VERIFICAÇÃO
header("Location: verificar.php");
exit;

?>
