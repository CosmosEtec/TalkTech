document.addEventListener('DOMContentLoaded', function () {
    var heartLiked = document.querySelectorAll('.fa-heart');

    heartLiked.forEach(function (element, index) {
        element.addEventListener('click', function (event) {

            var isRegular = element.classList.contains('fa-regular');
            var isSolid = element.classList.contains('fa-solid');
            var value = element.getAttribute('value');
            var contReacao = document.getElementById(value + 'cr');

            if (isRegular) {
                var formdata = new FormData();
                formdata.append('idPostagem', value);
                formdata.append('curtir', 1);
                fetch('../control/controlCurtir.php', {
                    method: 'POST',
                    body: formdata
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
                    if(data.status == true){
                        element.classList.remove('fa-regular');
                        element.classList.add('fa-solid');
                        contReacao.innerHTML = data.qtdReacoes;
                        element.style.color = '#bd02c0';
                    }else{
                        alert(data.message);
                    }
                }
                )
            }
            
            else if (isSolid) {
                var formdata = new FormData();
                formdata.append('idPostagem', value);
                formdata.append('curtir', 0);
                fetch('../control/controlCurtir.php', {
                    method: 'POST',
                    body: formdata
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
                    if(data.status == true){
                        element.classList.remove('fa-solid');
                        element.classList.add('fa-regular');
                        contReacao.innerHTML = data.qtdReacoes;
                        element.style.color = '#d1d1d1';
                    }else{
                        alert(data.message);
                    }
                }
                )
                
            }
        });
    });
});