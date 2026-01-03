document.querySelector('.titulo-instrucoes').addEventListener('click', function () {
    const box = this.closest('.instrucoes-separador');
    box.classList.toggle('ativo');
});