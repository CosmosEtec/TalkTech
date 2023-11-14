function openPost() {
  document.addEventListener('DOMContentLoaded', function () {
    const containerPosts = document.querySelectorAll('.post-container');
    const contentPosts = document.querySelectorAll('.content-post');
    const feedRoll = document.querySelector('.feed-roll');
    const overlayed = document.querySelector('.overlayed');

    contentPosts.forEach(function (contentPost, index) {
      contentPost.addEventListener('click', function (event) {
        overlayed.style.display = 'flex';
        overlayed.appendChild(containerPosts[index]); // Use o índice para encontrar o container de postagem correspondente
      });
    });

    overlayed.addEventListener('click', function (event) {
      overlayed.style.display = 'none';
      containerPosts.forEach(function (containerPost) {
        feedRoll.appendChild(containerPost);
      });
    });
  });
}

export { openPost };
