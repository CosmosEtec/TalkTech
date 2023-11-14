function likePost() {
  document.addEventListener('DOMContentLoaded', function () {
    const heartLiked = document.querySelectorAll('.heart-liked');
    const heartUnliked = document.querySelectorAll('.heart-unliked');

    // Adicione o evento de "click" a cada elemento "heart-unliked"
    heartUnliked.forEach(function (element, index) {
      element.addEventListener('click', function (event) {
        // Aqui, você pode acessar o elemento específico que foi clicado usando "element"
        element.style.display = 'none';
        heartLiked[index].style.display = 'block';
        setTimeout(() => {
          heartLiked[index].style.transform = 'scale(1.1)';
          heartLiked[index].style.transform = 'scale(1)';
        }, 0);
      });
    });

    // Adicione o evento de "click" a cada elemento "heart-liked"
    heartLiked.forEach(function (element, index) {
      element.addEventListener('click', function (event) {
        // Aqui, você pode acessar o elemento específico que foi clicado usando "element"
        heartUnliked[index].style.display = 'block';
        element.style.transform = 'scale(0)';
        setTimeout(() => {
          element.style.display = 'none';
        }, 500);
      });
    });
  });
}

export { likePost };
