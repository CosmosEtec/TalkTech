

   var btnSeguir = document.getElementById('follow');

function seguir(){
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    var form = new FormData();
    form.append('id', id);

    fetch('../control/controlFollow.php', {
        method: 'POST',
        body: form
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
            window.location.reload();
        }else{
            alert('Erro ao editar perfil: Status:' + data.status + ' | Mensagem:' + data.mensagem + ' | Desc:' + data.descricao);
        }
    })
}

function dejarSeguir(){
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    var form = new FormData();
    form.append('id', id);

    fetch('../control/controlUnfollow.php', {
        method: 'POST',
        body: form
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
            window.location.reload();
        }else{
            alert('Erro ao editar perfil: Status:' + data.status + ' | Mensagem:' + data.mensagem + ' | Desc:' + data.descricao);
        }
    })
}
btnSeguir.addEventListener('click', follow);
