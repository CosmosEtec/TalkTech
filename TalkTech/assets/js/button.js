const currentPage = window.location.href;

const buttons = document.querySelectorAll('.nav-link');

buttons.forEach(button => {
    if (button.href === currentPage) {
        button.classList.add('active-link');
    }
    else if(button.href != currentPage){
        buttons.forEach(button => {
            button.addEventListener('click', function (event) {
                 // Impede a ação padrão do link
        
                // Remove a classe 'active' de todos os botões
                buttons.forEach(btn => btn.classList.remove('active'));
                // Adiciona a classe 'active' apenas ao botão clicado
                this.classList.add('active');
            });
        });
    }
    else{
        button.classList.remove('active-link');
    }

    
});