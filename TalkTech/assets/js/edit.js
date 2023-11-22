const btnEditar = document.getElementById('submitEdit');
var nomePerfil = document.getElementById('nomePerfil');
//retire o @ do nome do perfil e deixe apenas o nome
nomePerfil = nomePerfil.innerHTML.replace(/@/g, '').trim();

//Apelido
const limiteApelido = 50;
const Apelido = document.getElementById('apelido');
const contadorApelido = document.getElementById('contadorApelido');
function contApelido(){
    const qtdCaracteres = Apelido.value.length;
    contadorApelido.innerHTML = qtdCaracteres + "/" + limiteApelido;
    if(qtdCaracteres > limiteApelido){
        contadorApelido.style.color = "red";  
    }
    else{
        contadorApelido.style.color = "black";
    }
}

//Biografia
const limiteBio = 160;
const biografia = document.getElementById('biografia');
const contadorBio = document.getElementById('contadorBio');
function contBio(){
    const qtdCaracteres = biografia.value.length;
    contadorBio.innerHTML = qtdCaracteres + "/" + limiteBio;
    if(qtdCaracteres > limiteBio){
        contadorBio.style.color = "red";
    }
    else{
        contadorBio.style.color = "black";
    }
}

//Privacidade
const privadoElement = document.getElementById('privado');
let privado = false;

//imagem
const inputImagem = document.getElementById('profileImage');

//Verificações para enviar ao Back
const apelidoAtual = Apelido.value;
const bioAtual = biografia.value;
const privadoAtual = privadoElement.checked;

function habilitarBotao(){

    if(apelidoAtual == Apelido.value && bioAtual == biografia.value && privadoAtual == privadoElement.checked && inputImagem.files[0] == undefined){
        btnEditar.setAttribute('disabled', true);
    }else{
        btnEditar.removeAttribute('disabled');
    }
}

function Editar(){
    if(privadoElement.checked){
        privado = true;
    }else{
        privado = false;
    }
    if(Apelido.value.length > limiteApelido){
        alert("O apelido deve ter no máximo 50 caracteres!");
        return;
    }
    if(biografia.value.length > limiteBio){
        alert("A biografia deve ter no máximo 160 caracteres!");
        return;
    }

    const formData = new FormData();
    formData.append('nomePerfil', nomePerfil);
    formData.append('apelido', Apelido.value);
    formData.append('biografia', biografia.value);
    formData.append('privado', privado);
    formData.append('imagem', inputImagem.files[0]);
 
    fetch('../control/editar-perfil.php', {
        method: 'POST',
        body: formData
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
        if(data.status == true){
            alert('Perfil editado com sucesso!');
            window.location.reload();
        }else{
            alert('Erro ao editar perfil' + data.status + ' ' + data.mensagem + ' ' + data.descricao);
        }
    })

console.log(nomePerfil +" " + Apelido.value + " " + biografia.value + " " + privado + " " + inputImagem.files[0]);
}

habilitarBotao(); contApelido(); contBio();
Apelido.addEventListener('input', function() {
    contApelido();
    habilitarBotao();
});
biografia.addEventListener('input', function() {
    contBio();
    habilitarBotao();
});
inputImagem.addEventListener('change', habilitarBotao);
privadoElement.addEventListener('change', habilitarBotao);

btnEditar.addEventListener('click', Editar);