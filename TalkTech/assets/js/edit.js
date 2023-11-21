const btnEditar = document.getElementById('submitEdit');

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

contApelido(); contBio();
Apelido.addEventListener('input', contApelido);
biografia.addEventListener('input', contBio);


const privadoElement = document.getElementById('privado');
let privado;

function Editar(){
    if(privadoElement.checked){
        privado = true;
    }else{
        privado = false;
    }
console.log(Apelido.value + " " + biografia.value + " " + privado);
}

btnEditar.addEventListener('click', Editar);