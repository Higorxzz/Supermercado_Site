<?php session_start(); ?>
<?php
require "php/conexao.php";

$q = trim($_GET['q'] ?? '');
$categoriasSel = $_GET['categoria'] ?? [];
$subcategoriasSel = $_GET['subcategoria'] ?? [];
$marcasSel = $_GET['marca'] ?? [];

$where = [];
$params = [];

if ($q !== '') {
    $where[] = "(nome_produto LIKE ? OR marca LIKE ? OR categoria LIKE ? OR subcategoria LIKE ?)";
    for ($i=0; $i<4; $i++) {
        $params[] = "%$q%";
    }
}

if (!empty($categoriasSel)) {
    $in = implode(',', array_fill(0, count($categoriasSel), '?'));
    $where[] = "categoria IN ($in)";
    $params = array_merge($params, $categoriasSel);
}

if (!empty($subcategoriasSel)) {
    $in = implode(',', array_fill(0, count($subcategoriasSel), '?'));
    $where[] = "subcategoria IN ($in)";
    $params = array_merge($params, $subcategoriasSel);
}

if (!empty($marcasSel)) {
    $in = implode(',', array_fill(0, count($marcasSel), '?'));
    $where[] = "marca IN ($in)";
    $params = array_merge($params, $marcasSel);
}


$sqlWhere = $where ? "WHERE " . implode(" AND ", $where) : "";

$sql = $pdo->prepare("SELECT * FROM produtos $sqlWhere");
$sql->execute($params);
$produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Carrinho</title>

<link rel="stylesheet" href="css/busca.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/botao.css">
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
  <?php
  $categorias = array_unique(array_column($produtos, 'categoria'));
  $subcategorias = array_unique(array_column($produtos, 'subcategoria'));
  $marcas = array_filter(
    array_unique(array_column($produtos, 'marca')),
    function ($m) {
        return !empty(trim($m));
    }
  );

  ?>
  <div class="busca-layout">

  <!-- FILTROS -->
  <aside class="filtros">

<form method="get" id="filtrosForm" action="">

  <input type="hidden" name="q" value="<?= htmlspecialchars($q) ?>">

  <!-- CATEGORIAS -->
  <h3>Categorias</h3>
  <?php foreach ($categorias as $cat): ?>
    <label class="filtro-check">
      <input type="checkbox"
             name="categoria[]"
             value="<?= htmlspecialchars($cat) ?>"
             <?= in_array($cat, $categoriasSel) ? 'checked' : '' ?>>
      <span><?= htmlspecialchars($cat) ?></span>
    </label>
  <?php endforeach; ?>

  <!-- SUBCATEGORIAS -->
  <h3>Subcategorias</h3>
  <?php foreach ($subcategorias as $sub): ?>
    <label class="filtro-check">
      <input type="checkbox"
             name="subcategoria[]"
             value="<?= htmlspecialchars($sub) ?>"
             <?= in_array($sub, $subcategoriasSel) ? 'checked' : '' ?>>
      <span><?= htmlspecialchars($sub) ?></span>
    </label>
  <?php endforeach; ?>

  <!-- MARCAS -->
  <h3>Marcas</h3>
  <?php foreach ($marcas as $m): ?>
    <label class="filtro-check">
      <input type="checkbox"
             name="marca[]"
             value="<?= htmlspecialchars($m) ?>"
             <?= in_array($m, $marcasSel) ? 'checked' : '' ?>>
      <span><?= htmlspecialchars($m) ?></span>
    </label>
  <?php endforeach; ?>

</form>

</aside>

  <!-- RESULTADOS -->
  <!-- RESULTADOS -->
<section class="resultados">

<?php if (count($produtos) === 0): ?>
  <p>Nenhum produto encontrado.</p>
<?php endif; ?>

<?php foreach ($produtos as $p): ?>
  <div class="card-produto" data-id="<?= $p['id_produto'] ?>">

    <a href="produto.php?id=<?= $p['id_produto'] ?>" class="link-produto">
      <img src="<?= $p['imagem'] ?>" alt="<?= htmlspecialchars($p['nome_produto']) ?>">

      <h4 class="produto-nome" title="<?= htmlspecialchars($p['nome_produto']) ?>">
        <?= htmlspecialchars($p['nome_produto']) ?>
      </h4>
    </a>

    <?php if (!empty($p['marca'])): ?>
      <p class="produto-marca" title="<?= htmlspecialchars($p['marca']) ?>">
        <?= htmlspecialchars($p['marca']) ?>
      </p>
    <?php endif; ?>

    <strong class="produto-preco">
      R$ <?= number_format($p['preco_venda'],2,',','.') ?>
    </strong>

    <!-- AÇÃO DO CARRINHO -->
    <div class="acao-carrinho">
      <button class="btn-comprar">Comprar</button>
    </div>

  </div>
<?php endforeach; ?>

</section>



</div>

  <!--FIM CONTEÚDO-->
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
<script src="js/botao_buscar.js"></script>
<script>
// Dropdown de departamentos
const deptBtn = document.getElementById('deptBtn');
const deptMenu = document.getElementById('deptMenu');

function closeDept(){
    deptMenu.classList.remove('show');
    deptBtn.setAttribute('aria-expanded','false');
}

deptBtn.addEventListener('click', (e) =>{
    e.stopPropagation();
    const show = deptMenu.classList.toggle('show');
    deptBtn.setAttribute('aria-expanded', show ? 'true' : 'false');
});

// Fecha ao clicar fora
document.addEventListener('click', (e)=>{
    if(!deptMenu.contains(e.target) && !deptBtn.contains(e.target)) closeDept();
});

// Suporte tecla Esc
document.addEventListener('keydown', (e)=>{ if(e.key === 'Escape') closeDept(); });

document.querySelectorAll('#filtrosForm input[type="checkbox"]')
  .forEach(el => {
    el.addEventListener('change', () => {
      document.getElementById('filtrosForm').submit();
    });
  });

</script>
</body>
</html>

