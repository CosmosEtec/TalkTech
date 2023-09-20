document.getElementById('loginForm').addEventListener('submit', function(event){
    event.preventDefault();
    
    var email = document.getElementById('emailmobile').value;
    var senha = document.getElementById('senhamobile').value;
    
    fetch('../control/valida-acesso-usuario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            Email: email,
            Senha: senha
        }),
    })
    
    .then(response => {
        if (!response.ok) {
            if (response.status === 401 || response.status === 403) {
                Swal.fire({
                    icon: 'error',
                    title: 'OPAN...',
                    text: 'SENHA OU EMAIL INCORRETOS',
                  })
               
            } else {
                throw new Error('Sem rede ou não conseguiu localizar o recurso');
            }
            
        }
        return response.json();
    })
    .then(data => {
        if (data.status) {
            window.location.href = 'feed.php';
        }
    })
    .catch(error => alert('Erro na requisição: ' + error));
});