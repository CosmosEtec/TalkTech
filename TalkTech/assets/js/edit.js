const btnEditar = document.getElementById('submitEdit');

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

const privadoElement = document.getElementById('privado');
let privado;

const apelidoAtual = Apelido.value;
const bioAtual = biografia.value;
const privadoAtual = privadoElement.checked;

function habilitarBotao(){
    if(apelidoAtual == Apelido.value && bioAtual == biografia.value && privadoAtual == privadoElement.checked){
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
 
console.log(Apelido.value + " " + biografia.value + " " + privado);
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
privadoElement.addEventListener('change', habilitarBotao);

btnEditar.addEventListener('click', Editar);