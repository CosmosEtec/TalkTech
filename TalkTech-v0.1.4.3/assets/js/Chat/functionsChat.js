document.addEventListener("DOMContentLoaded", function() {
    const elementoComScroll = document.querySelector('.container-messages-roll');
  
    // Função para rolar a div para o final
    function scrollToBottom() {
        elementoComScroll.scrollTop = elementoComScroll.scrollHeight - elementoComScroll.clientHeight;
    }
  
    // Chame a função para rolar a div para o final assim que a página estiver carregada
    scrollToBottom();
  });
  
  document.addEventListener("DOMContentLoaded", function() {
    const dropdownButton = document.getElementById("dropdown-button");
    const dropdownList = document.getElementById("dropdown-list");
    const arrow = document.querySelector(".fa-solid.fa-caret-right");
    
    // Adicione a classe "active" ao elemento pai de dropdownButton
    dropdownButton.parentNode.classList.add("active");
    arrow.style.transform = 'rotate(90deg)'
    // Defina a altura máxima para exibir o dropdown
    dropdownList.style.maxHeight = "100%";
   
    dropdownButton.addEventListener("click", function() {
      dropdownList.style.maxHeight = dropdownList.style.maxHeight === "100%" ? "0" : "100%"; // Ajuste conforme necessário
      dropdownButton.parentNode.classList.toggle("active");
    });
  });


/// arrow down
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