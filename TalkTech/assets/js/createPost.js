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

function previewImageShowUp(){
  const image = document.getElementById('image-preview');

  image.style.display = 'block';
}

function previewImage() {
    const preview = document.getElementById('image-preview');
    const fileInput = document.getElementById('image-upload');
    const file = fileInput.files[0];
  
    if (file) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
        preview.src = e.target.result;
      }
  
      previewImageShowUp();
      reader.readAsDataURL(file);
      

    } else {
      preview.src = '#'; // Limpa a visualização se nenhum arquivo estiver selecionado
    }
  }

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
        alert('Post criado com sucesso');
        window.location.reload();
      }else{
        alert('Erro ao criar post' + data.status + ' ' + data.mensagem + ' ' + data.descricao);

      }
    })
  }
}

btnPost.addEventListener('click', postar);