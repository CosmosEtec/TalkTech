document.getElementById('cadForm').addEventListener('submit', function(event){
    event.preventDefault();
    const NomeCadastro = document.getElementById('NomeCadastro').value;
    const EmailCadastro = document.getElementById('EmailCadastro').value;
    const SenhaCadastro = document.getElementById('SenhaCadastro').value;
    const ConfirmaSenhaCadastro = document.getElementById('ConfirmaSenhaCadastro').value;

    if (!NomeCadastro) {
        alert("Por favor, insira um nome!");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email já cadastrado!',
            
        })
        return;
    }
    if (SenhaCadastro !=ConfirmaSenhaCadastro) {
       
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Senhas não são iguais',
            footer: 'ErroId: 47'
        })
        return;
    }
    var lowerCaseLetters = /[a-z]/g;
    if(!SenhaCadastro.match(lowerCaseLetters)) {  
       
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Senha não possui letras minusculas',
            
        })
        return;
    }

    var upperCaseLetters = /[A-Z]/g;
    if(!SenhaCadastro.match(upperCaseLetters)) {  
        
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Senha não possui letras maiusculas',
        })
        return;
    }

    var numbers = /[0-9]/g;
    if(!SenhaCadastro.match(numbers)) {  
       
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Senha não possui números',
        })
        return;
    }

    if(SenhaCadastro.length < 8) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Senha não possui 8 caracteres',
            footer: 'ErroId: 47'
        })
        return;
    }
    const usuario = {
        nome: NomeCadastro,
        email: EmailCadastro,
        senha: SenhaCadastro,
        csenha: ConfirmaSenhaCadastro
    };

    fetch('../control/cadastra-Perfil.php', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(usuario)
    })
    .then(response => {
        if (!response.ok) {
            if (response.status === 401) {
                throw new Error('Não autorizado');
            } else {
                throw new Error('Sem rede ou não conseguiu localizar o recurso');
            }
        }
        return response.json();
    })
    .then(data => {
        if(!data.status){
            if(data.id = 47){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Email já cadastrado!',
                    footer: 'ErroId: 47'
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Erro ao cadastrar!',
                    footer: 'ErroId: Desconhecido, contatar empresa!'
                })
            }
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Seja Bem-Vindo',
                text: 'Faça o login para acessar a plataforma!',
            })
        } 
       
    })
    .catch(error => alert('Erro na requisição: ' + error));
});

function myFunction() {
    var x = document.getElementById("SenhaCadastro");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }