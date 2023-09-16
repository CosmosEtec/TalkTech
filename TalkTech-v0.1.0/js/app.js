// ===================== Mudança Estado do botão

const links = document.querySelectorAll('.nav-link-side-menu');

links.forEach(link => {
  link.addEventListener('click', () => {
    links.forEach(btn => btn.classList.remove('active'));
    link.classList.add('active');
  });
});


// ===================== Animation Form Login Cadastro ====================

document.addEventListener("DOMContentLoaded", function () {
  const loginLink = document.querySelector(".form-link-login");
  const loginForm = document.querySelector(".form-login-relative");
  const cadastroForm = document.querySelector(".form-cadastro-relative");

  loginLink.addEventListener("click", function (e) {
      e.preventDefault();

      loginForm.style.transform = "translateX(19vw)"; // Move o formulário de login de volta para a tela
      cadastroForm.style.transform = "translateX(50vw)"; // Move o formulário de cadastro para a direita, saindo da tela
  });

  const cadastroLink = document.querySelector(".form-link-cadastrar");

  cadastroLink.addEventListener("click", function (e) {
      e.preventDefault();

      loginForm.style.transform = "translateX(70vw)"; // Move o formulário de login para a esquerda, saindo da tela
      cadastroForm.style.transform = "translateX(-21vw)"; // Move o formulário de cadastro de volta para a tela
  });
});

// ===================== Link Form Mobile ====================

document.addEventListener("DOMContentLoaded", function () {
  const loginLinkMobile = document.querySelector(".form-link-cadastrar-mobile");
  const loginFormMobile = document.querySelector(".form-login-fields-mobile");
  const cadastroFormMobile = document.querySelector(".form-cadastro-fields-mobile");

  loginLinkMobile.addEventListener("click", function (e) {
      e.preventDefault();

      loginFormMobile.style.display = "none"; // Desativa o formulario de Login
      cadastroFormMobile.style.display = "flex"; // Ativa o formulario de Cadastro
  });

  const cadastroLinkMobile = document.querySelector(".form-link-login-mobile");

  cadastroLinkMobile.addEventListener("click", function (e) {
      e.preventDefault();

      loginFormMobile.style.display = "flex"; // Desativa o formulario de Cadastro
      cadastroFormMobile.style.display = "none"; // Ativa o formulario de Login
  });
});


// ===================== Criar Post ====================

const showCardButton = document.getElementById('show-card-button');
const closeCardButton = document.getElementById('close-card-button');
const cardOverlay = document.getElementById('card-overlay');

showCardButton.addEventListener('click', () => {
  cardOverlay.style.display = 'block';
});

closeCardButton.addEventListener('click', () => {
  cardOverlay.style.display = 'none';
});

// Aqui você pode adicionar lógica para processar o formulário, como upload de imagem e descrição
