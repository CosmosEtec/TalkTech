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
      Swal.fire({
        title: "Post Excluido!",
        text: "Seu post foi excluido com sucesso!",
        icon: "sucess",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK!"
      }).then((result) => {
        if (result.isConfirmed) {
            if(window.location.href.includes('postagem.php')){
              window.location.href = 'Home.php';
            }else{
              window.location.reload();
            }
        }
      });
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