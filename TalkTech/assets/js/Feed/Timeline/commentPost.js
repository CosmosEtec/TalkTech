function commentPost() {
    document.addEventListener('DOMContentLoaded', function () {
      const comment = document.querySelectorAll('.comment');

      // Adicione o evento de "click" a cada elemento "heart-liked"
      comment.forEach(function (element, index) {
        element.addEventListener('click', function (event) {
            overlayed.style.display = 'flex';
            overlayed.appendChild(element[index]);
        });
      });
    });
  }
  
  export { commentPost };
  