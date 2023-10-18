function buttonActive() {
    document.addEventListener("DOMContentLoaded", function() {
        // Obtém todos os botões com a classe "nav-menu-button-timeline"
        var botoes = document.querySelectorAll(".nav-menu-button-timeline");
    
        // Adiciona um ouvinte de evento de clique a cada botão
        botoes.forEach(function(botao) {
            botao.addEventListener("click", function() {
                // Remove a classe "ativo" de todos os botões
                botoes.forEach(function(b) {
                    b.classList.remove("-ativo");
                });
    
                // Adiciona a classe "ativo" apenas ao botão clicado
                this.classList.add("-ativo");
            });
        });
    });
}