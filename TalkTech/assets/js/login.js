document.getElementById('loginForm').addEventListener('submit', function(event){
    event.preventDefault();
    
    var email = document.getElementById('emailLogin').value;
    var senha = document.getElementById('senhaLogin').value;
    
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
                    title: 'OPA!',
                    text: 'Senha ou Email incorretos!',
                  })
            } else {
                throw new Error('Sem rede ou não conseguiu localizar o recurso');
            } 
        }
        return response.json();
    })
    .then(data => {
        if (data.status) {
            window.location.href = 'Home.php';
        }
    })
    .catch(error => alert('Erro na requisição: ' + error));
});