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