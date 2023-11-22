function openPost() {
  document.addEventListener('DOMContentLoaded', function () {
    const containerPosts = document.querySelectorAll('.post-container');
    const contentPosts = document.querySelectorAll('.content-post');
    const commentButtons = document.querySelectorAll('.comment');
    //const commentSection = document.querySelectorAll('.post-comment-section');
    const feedRoll = document.querySelector('.feed-roll');
    const overlayed = document.querySelector('.overlayed');

    function handlePostClick(clickedContainer) {
      overlayed.style.display = 'flex';
      
     

       
      if (clickedContainer) {
        const clickedContainerId = clickedContainer.id;
        console.log('ID do container clicado:', clickedContainerId);

        const clonedContainer = clickedContainer.cloneNode(true);
        overlayed.innerHTML = '';  
        overlayed.appendChild(clonedContainer);
      }
    }

    contentPosts.forEach(function (contentPost) {
      contentPost.addEventListener('click', function (event) {
        const clickedContainer = event.target.closest('.post-container');
        handlePostClick(clickedContainer);
      });
    });

    commentButtons.forEach(function (commentButton) {
      commentButton.addEventListener('click', function (event) {
        const clickedContainer = event.target.closest('.post-container');
        handlePostClick(clickedContainer);
      });
    });

    overlayed.addEventListener('click', function (event) {
      overlayed.style.display = 'none';

       
      overlayed.innerHTML = '';

      containerPosts.forEach(function (containerPost) {
        feedRoll.appendChild(containerPost);
      });
    });
  });
}

export { openPost };
