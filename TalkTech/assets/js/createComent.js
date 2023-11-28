var btnComent = document.getElementById("submitComentario");

function comentar() {
    var description = document.getElementById('input-comentario').value;
    var url = window.location.href;
    var post = url.split('?')[1].split('=')[1];
    var formData = new FormData();
    formData.append("Comentario", description);
    formData.append("Post", post);
    formData.append("data", new Date());
    fetch('../control/cadastra-comentario.php', {
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
    .then(function (data) {
        if(data.status == true){
            alert('Post criado com sucesso');
            window.location.reload();
          }else{
            alert('Erro ao criar post' + data.status + ' ' + data.mensagem + ' ' + data.descricao);
          }
    });
    }

    function habilitarBotao(){
        if(document.getElementById('input-comentario').value == ''){
            btnComent.setAttribute('disabled', true);
        }else{
            btnComent.removeAttribute('disabled');
        }
    }


    habilitarBotao();
    document.getElementById('input-comentario').addEventListener('input', habilitarBotao);
    btnComent.addEventListener('click', function () {
        comentar();
    });