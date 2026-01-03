<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Carrinho</title>
<link rel="stylesheet" href="css/carrinho.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/footer.css">
</head>
<body>
      <header class="site-header" role="banner">
    <div class="topbar" role="navigation" aria-label="Menu principal">

      <!-- Logo -->
      <a href="index.php" class="logo" aria-label="Supermercado Japão - Página inicial">
        <img src="img/logo/Logo-japao-completa-com-fundo.png" alt="Logo Supermercado Japão" />
      </a>

      <!-- Search -->
      <div class="search-wrap" role="search">
        <form id="searchForm" action="#" method="get" aria-label="Buscar produtos">
          <input class="search-input" type="search" name="q" id="searchInput" placeholder="Pesquisar produtos, ofertas e lojas..." />
          <button class="search-btn" type="submit" aria-label="Pesquisar">
            <!-- simples ícone de lupa -->
            <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 19a8 8 0 1 1 5.292-14.292A8 8 0 0 1 11 19z" stroke="#333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M21 21l-4.35-4.35" stroke="#333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
      </div>

      <!-- Actions: Compre por departamento, Login, Carrinho -->
      <nav class="actions" aria-label="Ações do usuário">

        <!-- Compre por departamento (dropdown) -->
        <div class="dept">
          <button id="deptBtn" class="btn" aria-haspopup="true" aria-expanded="false" aria-controls="deptMenu">
            <!-- ícone de categorias -->
            <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 7h8V3H3v4zM13 21h8v-4h-8v4zM3 21h8v-8H3v8zM13 11h8V3h-8v8z" fill="#333"/>
            </svg>
            <span>Compre por departamento</span>
          </button>

          <div id="deptMenu" class="dept-menu" role="menu" aria-labelledby="deptBtn">
            <a href="#" role="menuitem">Açougue</a>
            <a href="#" role="menuitem">Hortifruti</a>
            <a href="#" role="menuitem">Padaria</a>
            <a href="#" role="menuitem">Mercearia</a>
            <a href="#" role="menuitem">Limpeza</a>
            <a href="#" role="menuitem">Bebidas</a>
            <a href="#" role="menuitem">Promoções</a>
          </div>
        </div>

        <?php if (isset($_SESSION['usuario_id'])): ?>

  <!-- Usuário logado -->
  <div class="user-menu">
    <span class="user-name">
      Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>
    </span>

    <a href="logout.php" class="btn danger" aria-label="Sair da conta">
      Sair
    </a>
  </div>

<?php else: ?>

  <!-- Usuário NÃO logado -->
  <a href="cadastro/login.php" class="btn" aria-label="Entrar na sua conta">
    <svg class="icon" viewBox="0 0 24 24" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <path d="M16 13v6H4V5h7" stroke="#333" stroke-width="1.5"
        stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M21 12l-4-4v3H9v2h8v3l4-4z"
        stroke="#333" stroke-width="1.5"
        stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <span>Entrar</span>
  </a>

<?php endif; ?>


        <!-- Carrinho -->
        <a href="carrinho.php" class="btn primary" aria-label="Ver carrinho">
          <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 6h15l-1.5 9h-12L6 6z" stroke="#fff" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="10" cy="20" r="1" fill="#fff"/>
            <circle cx="18" cy="20" r="1" fill="#fff"/>
          </svg>
          <span>Carrinho</span>
          <span class="cart-badge" aria-hidden="true">0</span>
        </a>

      </nav>
    </div>
  </header>
<!--CONTEÚDO-->

<h1 class="titulo-carrinho">Meu carrinho</h1>

<div class="carrinho-container">

<?php if (empty($_SESSION['carrinho'])): ?>
    <p>Carrinho vazio</p>
<?php else: ?>

<?php $total = 0; ?>

<?php foreach ($_SESSION['carrinho'] as $item): 
    $subtotal = $item['preco'] * $item['quantidade'];
    $total += $subtotal;
?>

<div class="item-carrinho">

    <img src="<?= $item['imagem'] ?>">

    <div class="info">
        <h3><?= $item['nome'] ?></h3>

        <p>
            <?= number_format($item['quantidade'], 2, ',', '.') ?>
            <?= $item['tipo_venda'] == 'kg' ? 'kg' : 'unidade(s)' ?>
        </p>

        <strong>R$ <?= number_format($subtotal, 2, ',', '.') ?></strong>
    </div>

</div>

<?php endforeach; ?>

<div class="total">
    Total: <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
</div>

<button class="btn-finalizar">Finalizar compra</button>

<?php endif; ?>


</div>

  <footer class="site-footer">

    <div class="footer-container">

      <!-- COLUNA 1 -->
      <div class="footer-column">
        <h3>Supermercado Japão</h3>
        <p>
          Qualidade, economia e tradição levando o melhor até você.
          Trabalhamos diariamente para oferecer produtos frescos,
          ofertas especiais e um atendimento de confiança.
        </p>
      </div>

      <!-- COLUNA 2 -->
      <div class="footer-column">
        <h3>Institucional</h3>
        <ul>
          <li><a href="#">Quem somos</a></li>
          <li><a href="#">Trabalhe conosco</a></li>
          <li><a href="#">Política de privacidade</a></li>
          <li><a href="#">Termos de uso</a></li>
        </ul>
      </div>

      <!-- COLUNA 3 -->
      <div class="footer-column">
        <h3>Atendimento</h3>
        <ul>
          <li><a href="#">Central de ajuda</a></li>
          <li><a href="#">Trocas e devoluções</a></li>
          <li><a href="#">Formas de pagamento</a></li>
          <li><a href="#">Entrega e prazos</a></li>
        </ul>
      </div>

      <!-- COLUNA 4 -->
      <div class="footer-column">
        <h3>Contato</h3>
        <p>📞 (11) 4000-0000</p>
        <p>✉️ contato@supermercadojapao.com.br</p>

        <div class="footer-social">
          <a href="#" aria-label="Instagram">📸</a>
          <a href="#" aria-label="Facebook">📘</a>
          <a href="#" aria-label="WhatsApp">💬</a>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <p>
        © <?= date('Y') ?> Supermercado Japão — Todos os direitos reservados
      </p>
    </div>

  </footer>
  <script src="js/carrinho.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
