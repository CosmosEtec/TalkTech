function likePost() {
  document.addEventListener('DOMContentLoaded', function () {
    const heartLiked = document.querySelectorAll('.heart-liked');
    const heartUnliked = document.querySelectorAll('.heart-unliked');

    heartUnliked.forEach(function (element, index) {
      element.addEventListener('click', function (event) {
        var idPost = element.parentNode.firstChild.nextElementSibling.id;
        var elementContador = document.getElementById(idPost);
        var form = new FormData();
        form.append('idPost', idPost);
        fetch('../control/controlCurtir.php', {
          method: 'POST',
          body: form,
        })
          .then((response) => {
            if (!response.ok) {
              if (response.status === 401) {
                throw new Error('Não autorizado');
              } else {
                throw new Error(
                  'Sem rede ou não conseguiu localizar o recurso'
                );
              }
            }
            return response.json();
          })
          .then((data) => {
            if (data.status == true) {
              elementContador.innerHTML = data.curtidas;
              element.style.display = 'none';
              heartLiked[index].style.display = 'block';
              setTimeout(() => {
                heartLiked[index].style.transform = 'scale(1.1)';
                heartLiked[index].style.transform = 'scale(1)';
              }, 0);
            } else {
              alert(
                'Erro ao curtir post: Status:' +
                  data.status +
                  ' | Mensagem:' +
                  data.mensagem +
                  ' | Desc:' +
                  data.descricao
              );
            }
          });
      });
    });

    // Adicione o evento de "click" a cada elemento "heart-liked"
      heartLiked.forEach(function (element, index) {
        element.addEventListener('click', function (event) {
          // Aqui, você pode acessar o elemento específico que foi clicado usando "element"
          
          
          element.style.transform = 'scale(0)';
          heartUnliked[index].style.transform = 'scale(0)';
          setTimeout(() => {
            
            heartUnliked[index].style.display = 'block'; 
            element.style.display = 'none'; 
            heartUnliked[index].style.transform = 'scale(1)';
          }, 500);
        });
      });
    });
}

export { likePost };
