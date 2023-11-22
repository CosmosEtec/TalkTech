function likePost() {
  document.addEventListener('DOMContentLoaded', function () {
    const heartLiked = document.querySelectorAll('.heart-liked');
    const heartUnliked = document.querySelectorAll('.heart-unliked');

heartUnliked.forEach(function (element, index) {
    element.addEventListener('click', function (event) {
        element.style.display = 'none';
        heartLiked[index].style.display = 'block';
        setTimeout(() => {
          heartLiked[index].style.transform = 'scale(1.1)';
          heartLiked[index].style.transform = 'scale(1)';
      }, 0);
    });
});

heartLiked.forEach(function (element, index) {
  element.addEventListener('click', function (event) {
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