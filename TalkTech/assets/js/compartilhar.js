function compLink(id) {

    var url = "http://localhost/TalkTech/TalkTech/view/postagem.php?idPost=" + id;

    // Cria um elemento de entrada temporário
    var tempInput = document.createElement('input');
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    tempInput.value = url;

    // Adiciona o elemento de entrada ao corpo do documento
    document.body.appendChild(tempInput);

    // Seleciona o texto
    tempInput.select();

    // Copia o texto
    document.execCommand('copy');

    // Remove o elemento de entrada do corpo do documento
    document.body.removeChild(tempInput);

    Swal.fire({
        icon: 'success',
        title: 'Link copiado para a área de transferência!',
      })
}
