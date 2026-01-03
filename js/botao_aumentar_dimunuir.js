function aumentar() {
    const qtd = document.getElementById('qtd');
    qtd.value = parseInt(qtd.value) + 1;
}

function diminuir() {
    const qtd = document.getElementById('qtd');
    if (qtd.value > 1) {
        qtd.value = parseInt(qtd.value) - 1;
    }
}

function atualizarQuantidade(valor){
    document.getElementById('quantidadeFinal').value = valor;
}
