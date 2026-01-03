document.addEventListener('click', function (e) {

  /* COMPRAR */
  if (e.target.classList.contains('btn-comprar')) {
    e.preventDefault();

    const area = e.target.closest('.acao-carrinho');

    incrementCartBadge(); // 🔴 adiciona produto diferente

    area.innerHTML = `
      <div class="controle-qtd" data-qtd="1">
        <button class="btn-remover" title="Remover">🗑</button>
        <div class="qtd">1 un</div>
        <button class="mais" title="Adicionar">+</button>
      </div>
    `;
  }

  /* ADICIONAR */
  if (e.target.classList.contains('mais')) {
    e.preventDefault();

    const controle = e.target.closest('.controle-qtd');
    let qtd = parseInt(controle.dataset.qtd);
    qtd++;

    controle.dataset.qtd = qtd;
    controle.querySelector('.qtd').innerText = qtd + ' un';

    if (qtd === 2) {
      controle.querySelector('.btn-remover').innerText = '−';
      controle.querySelector('.btn-remover').title = 'Diminuir';
    }
  }

  /* REMOVER / DIMINUIR */
  if (e.target.classList.contains('btn-remover')) {
    e.preventDefault();

    const controle = e.target.closest('.controle-qtd');
    let qtd = parseInt(controle.dataset.qtd);
    const area = controle.closest('.acao-carrinho');

    // remover produto inteiro
    if (qtd === 1) {
      decrementCartBadge(); // 🔴 remove produto diferente
      area.innerHTML = `<button class="btn-comprar">Comprar</button>`;
      return;
    }

    qtd--;
    controle.dataset.qtd = qtd;
    controle.querySelector('.qtd').innerText = qtd + ' un';

    if (qtd === 1) {
      controle.querySelector('.btn-remover').innerText = '🗑';
      controle.querySelector('.btn-remover').title = 'Remover';
    }
  }

});