document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const suggestionList = document.getElementById('suggestionList');
    let timeoutId;

    searchInput.addEventListener('input', function () {
        // Simulando sugestões de busca (substitua isso com sua lógica real)
        var form = new FormData();
        form.append('escrito', searchInput.value);

        fetch('../control/controlBuscar.php', {
        method: 'POST',
        body: form
        })
        .then(response => {
            if (!response.ok) {
                if (response.status === 401) {
                    throw new Error('Não autorizado');
                } else {
                    throw new Error('Sem rede ou não conseguiu localizar o recurso');
                }
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            const suggestions = data;
            // Limpar a lista de sugestões
            suggestionList.innerHTML = '';

            // Adicionar sugestões à lista
            suggestions.forEach(suggestion => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = `../view/profile.php?id=${suggestion.idPerfil}`;

                const profilePic = document.createElement('div');
                profilePic.classList.add('profile-pic');

                const profilePicImg = document.createElement('img');
                profilePicImg.classList.add('profile-pic-img');
                profilePicImg.src = "../"+suggestion.fotoPerfil;
                profilePicImg.alt = suggestion.nome;

                const profileInfo = document.createElement('div');
                profileInfo.classList.add('profile-username', 'flex-column', 'ml-1-4px');

                const h6 = document.createElement('h6');
                const p3 = document.createElement('p');

                if(suggestion.apelido != null){
                h6.textContent = suggestion.apelido;
                p3.classList.add('p3');
                p3.textContent = "@"+suggestion.nome;

                }else{
                h6.textContent = "@"+suggestion.nome;
                }
                // Construir a estrutura
                a.appendChild(profilePic);
                profilePic.appendChild(profilePicImg);
                a.appendChild(profileInfo);
                profileInfo.appendChild(h6);
                profileInfo.appendChild(p3);
                li.appendChild(a);
                suggestionList.appendChild(li);
            });

            // Exibir a lista de sugestões
            suggestionList.style.display = 'block';
        })
    });
    // Adicionando manipulador de eventos de clique no documento para lidar com cliques nos links
    document.addEventListener('click', function (event) {
        const target = event.target;
        if (target.tagName === 'A' && target.parentElement.parentElement.id === 'suggestionList') {
            event.preventDefault(); // Impede o comportamento padrão do link
            window.location.href = target.href; // Redireciona para o link
        }
    });

    searchInput.addEventListener('blur', function () {
        // Atraso na ocultação da lista de sugestões para permitir clique nos links
        timeoutId = setTimeout(function () {
            suggestionList.style.display = 'none';
        }, 200);
    });

    searchInput.addEventListener('focus', function () {
        // Limpar o timeout se o campo de pesquisa receber foco novamente antes do atraso
        clearTimeout(timeoutId);
        suggestionList.style.display = 'block';
    });
});
