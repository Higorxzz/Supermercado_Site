
const menos = document.querySelector('.menos');
const mais = document.querySelector('.mais');
const input = document.getElementById('quantidade');

const tipo = input.dataset.tipo;

let passo = tipo === 'kg' ? 100 : 1;
let minimo = tipo === 'kg' ? 100 : 1;

menos.addEventListener('click', () => {
    let valor = parseInt(input.value);
    if (valor > minimo) {
        input.value = valor - passo;
    }
});

mais.addEventListener('click', () => {
    let valor = parseInt(input.value);
    input.value = valor + passo;
});

