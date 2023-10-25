function likePost() {
    document.addEventListener('DOMContentLoaded', function () {
      const heartLiked = document.getElementById('heart-liked');
      const heartUnliked = document.getElementById('heart-unliked');
      //const commentDisplay = document.querySelector('.')
  
      heartUnliked.addEventListener('click', function (event) {
        heartUnliked.style.display = 'none';
        heartLiked.style.display = 'block';
        setTimeout(() => {
            heartLiked.style.transform = 'scale(1.1)';
            heartLiked.style.transform = 'scale(1)';
          }, 0); 
      });

      
      heartLiked.addEventListener('click', function (event) {
        heartUnliked.style.display = 'block';
        heartLiked.style.transform = 'scale(0)';
        setTimeout(() => {
            heartLiked.style.display = 'none';
        }, 500);
      });

    });
  }
  

export { likePost };