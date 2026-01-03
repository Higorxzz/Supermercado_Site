function getCartBadge() {
  return document.querySelector('.cart-badge');
}

function incrementCartBadge() {
  const badge = getCartBadge();
  let valor = parseInt(badge.innerText) || 0;
  badge.innerText = valor + 1;
}

function decrementCartBadge() {
  const badge = getCartBadge();
  let valor = parseInt(badge.innerText) || 0;
  badge.innerText = Math.max(0, valor - 1);
}
