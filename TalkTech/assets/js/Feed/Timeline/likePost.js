function likePost() {
  document.addEventListener('DOMContentLoaded', function () {
    const heartLiked = document.querySelectorAll('.fa-regular.fa-heart.fa-2xl');

    heartLiked.forEach(function (element, index) {
      element.addEventListener('click', function (event) {
        // Toggle entre fa-regular e fa-solid
        element.classList.toggle('fa-regular');
        element.classList.toggle('fa-solid');

        // Adiciona uma classe para ativar a animação
        element.classList.add('animate-like');

        setTimeout(() => {
          // Remove a classe para a animação ser aplicada novamente na próxima vez
          element.classList.remove('animate-like');

          // Restante do seu código
          heartLiked[index].style.transform = 'scale(1.1)';
          heartLiked[index].style.transform = 'scale(1)';
        }, 500); // Ajuste o tempo conforme necessário
      });
    });
  });
}

export { likePost };
