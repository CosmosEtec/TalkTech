document.addEventListener('DOMContentLoaded', function () {
    // Referências aos elementos do DOM
    var modals = document.querySelectorAll('.modal');
    var openModalBtns = document.querySelectorAll('.openModalBtn');
    var closeBtns = document.querySelectorAll('.close');

    // Função para abrir o modal
    openModalBtns.forEach(function (btn, index) {
        btn.addEventListener('click', function () {
            modals[index].style.display = 'block';
        });
    });

    // Função para fechar o modal
    closeBtns.forEach(function (closeBtn, index) {
        closeBtn.addEventListener('click', function () {
            modals[index].style.display = 'none';
        });
    });

    // Fechar o modal se o usuário clicar fora dele
    window.addEventListener('click', function (event) {
        modals.forEach(function (modal, index) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
});
