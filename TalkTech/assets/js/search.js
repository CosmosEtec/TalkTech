document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const suggestionList = document.getElementById('suggestionList');
    let timeoutId;

    searchInput.addEventListener('input', function () {
        // Simulando sugestões de busca (substitua isso com sua lógica real)
        const suggestions = [
            { username: 'Macaco', handle: '@sougay', imgUrl: '../assets/img/bonoro-anao.jpg' },
            { username: 'Macaco', handle: '@sougay', imgUrl: '../assets/img/bonoro-anao.jpg' },
            { username: 'Macaco', handle: '@sougay', imgUrl: '../assets/img/bonoro-anao.jpg' },
            { username: 'Macaco', handle: '@sougay', imgUrl: '../assets/img/bonoro-anao.jpg' },
            // Adicione mais sugestões conforme necessário
        ];

        // Limpar a lista de sugestões
        suggestionList.innerHTML = '';

        // Adicionar sugestões à lista
        suggestions.forEach(suggestion => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = `https://www.google.com/search?q=${encodeURIComponent(suggestion.username)}`;

            const profilePic = document.createElement('div');
            profilePic.classList.add('profile-pic');

            const profilePicImg = document.createElement('img');
            profilePicImg.classList.add('profile-pic-img');
            profilePicImg.src = suggestion.imgUrl;
            profilePicImg.alt = suggestion.username;

            const profileInfo = document.createElement('div');
            profileInfo.classList.add('profile-username', 'flex-column', 'ml-1-4px');

            const h6 = document.createElement('h6');
            h6.textContent = suggestion.username;

            const p3 = document.createElement('p');
            p3.classList.add('p3');
            p3.textContent = suggestion.handle;

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
    });
});
