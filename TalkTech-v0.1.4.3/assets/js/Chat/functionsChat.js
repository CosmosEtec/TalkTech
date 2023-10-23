document.addEventListener("DOMContentLoaded", function() {
    const elementoComScroll = document.querySelector('.container-messages-roll');
  
    // Função para rolar a div para o final
    function scrollToBottom() {
        elementoComScroll.scrollTop = elementoComScroll.scrollHeight - elementoComScroll.clientHeight;
    }
  
    // Chame a função para rolar a div para o final assim que a página estiver carregada
    scrollToBottom();
  });
  
  const dropdownButton = document.getElementById("dropdown-button");
    const dropdownList = document.getElementById("dropdown-list");
  
    dropdownButton.addEventListener("click", function() {
      dropdownList.style.maxHeight = dropdownList.style.maxHeight === "200px" ? "0" : "200px"; // Ajuste conforme necessário
      dropdownButton.parentNode.classList.toggle("active");
});

    const rotateArrow = document.getElementById("dropdown-button");
    const arrow = document.querySelector(".fa-solid.fa-caret-right");

    rotateArrow.addEventListener("click", function() {
        if(arrow.style.transform != 'rotate(90deg)'){
            arrow.style.transform = 'rotate(90deg)'
        }
        else{
            arrow.style.transform = 'rotate(0deg)'
        }


    });