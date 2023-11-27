function toggleNotificacoes() {
    var menuNotificacoes = document.querySelector('.menu-notificacoes');
    menuNotificacoes.classList.toggle('aberto');
}

document.querySelectorAll('.post-config').forEach(function(dropdown) {
    var configContent = dropdown.querySelector('.post-config-content');
    dropdown.addEventListener("click", function() {
         // Toggle class 'active' no dropdown
         // Toggle class 'active' no dropdown
        dropdown.classList.toggle('active');

        // Determine a altura máxima com base no estado do dropdown
        var maxHeight = dropdown.classList.contains('active') ? configContent.scrollHeight + 'px' : '0';

        // Aplique a altura máxima com uma transição suave
        configContent.style.maxHeight = maxHeight;
        // Selecione o ícone de configuração específico para este dropdown
        var configPostIcon = dropdown.querySelector(".fa-solid.fa-ellipsis.fa-2xl");

        // Verifique e ajuste a rotação do ícone
        if (configPostIcon.style.transform !== 'rotate(90deg)') {
            configPostIcon.style.transform = 'rotate(90deg)';
        } else {
            configPostIcon.style.transform = 'rotate(0deg)';
        }
    });
});