const showCardButton = document.getElementById('create-post');
const closeCardButton = document.getElementById('close-create-post');
const cardOverlay = document.getElementById('card-overlay');

showCardButton.addEventListener('click', () => {
  cardOverlay.style.display = 'block';
});

closeCardButton.addEventListener('click', () => {
  cardOverlay.style.display = 'none';
});

// =============== Preview da Imagem sei lá


function previewImage() {
    const preview = document.getElementById('image-preview');
    const fileInput = document.getElementById('image-upload');
    const removeImageButton = document.querySelector('.custom-file-input.remove');
    const file = fileInput.files[0];
  
    if (file) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
        preview.src = e.target.result;
      }
  
      preview.style.display = 'block';
      removeImageButton.style.display = 'flex';
      reader.readAsDataURL(file);
      

    } else {
      preview.src = '#'; // Limpa a visualização se nenhum arquivo estiver selecionado
      preview.style.display = 'none';
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    const removeImageButton = document.querySelector('.custom-file-input.remove');
    const imagePreview = document.getElementById('image-preview');
    const fileInput = document.getElementById('image-upload');
  
    removeImageButton.addEventListener('click', function () {
      // Limpa a visualização da imagem
      imagePreview.src = '#';
  
      // Esconde a imagem e o botão "Remover"
      imagePreview.style.display = 'none';
      removeImageButton.style.display = 'none';
  
      // Limpa o valor do campo de entrada de arquivo
      fileInput.value = '';
    });
  });

var btnPost = document.getElementById('submitPost');

function postar(){
  const description = document.getElementById('description').value;
  const fileInput = document.getElementById('image-upload');
  const conteudo = fileInput.files[0];

  if(description == '' && conteudo == undefined){
    alert('O Post deve conter pelo menos Uma imagem ou Um texto');
}else{
    const formData = new FormData();
    formData.append('legenda', description);
    formData.append('conteudo', conteudo);

    fetch('../control/cadastra-post.php', {
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
        Swal.fire({
          title: "Post Criado!",
          text: "Seu post foi criado com sucesso!",
          icon: "sucess",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "OK!"
        }).then((result) => {
          if (result.isConfirmed) {
              location.reload();
          }
        });
      }else{
        alert('Erro ao criar post' + data.status + ' ' + data.mensagem + ' ' + data.descricao);

      }
    })
  }
}

btnPost.addEventListener('click', postar);