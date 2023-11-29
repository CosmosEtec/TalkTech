btnExcluir = document.querySelectorAll('.btnExcluir');

function excluirPost(id){
  fetch('../control/excluir-post.php?id='+id, {
    method: 'GET'
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
      alert('Post excluido com sucesso');
      window.location.reload();
    }else{
      alert('Erro ao excluir post' + data.status + ' ' + data.mensagem + ' ' + data.descricao);

    }
  })
}

btnExcluir.forEach(btn => {
  btn.addEventListener('click', function(){
    excluirPost(this.id);
  })
});