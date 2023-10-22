function openPost() {
    document.addEventListener('DOMContentLoaded', function () {
      const post = document.querySelector('.post-container');
      const overlayed = document.querySelector('.overlayed');
      const originalParent = post.parentNode;
  
      post.addEventListener('click', function (event) {
        overlayed.style.display = 'flex';
        event.stopPropagation();
        overlayed.appendChild(post);
      });

      overlayed.addEventListener('click', function (event) {
        overlayed.style.display = 'none';
        originalParent.appendChild(post);
        event.stopPropagation();
        
      });
    });
  }
  

export { openPost };