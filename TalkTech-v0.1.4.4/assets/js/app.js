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

    const screenWidth = window.innerWidth;
    const screenWidthThreshold = 540;

    if (screenWidth <= screenWidthThreshold) {
      loginForm.style.transform = "translateX(19vw)";
      cadastroForm.style.transform = "translateX(100vw)";
    } else {
      loginForm.style.transform = "translateX(19vw)";
      cadastroForm.style.transform = "translateX(50vw)";
    }
  });

  const cadastroLink = document.querySelector(".form-link-cadastrar");

  cadastroLink.addEventListener("click", function (e) {
    e.preventDefault();

    const screenWidth = window.innerWidth;
    const screenWidthThreshold = 540;

    if (screenWidth <= screenWidthThreshold) {
      loginForm.style.transform = "translateX(130vw)";
      cadastroForm.style.transform = "translateX(-45vw)";
    } else {
      loginForm.style.transform = "translateX(80vw)";
      cadastroForm.style.transform = "translateX(-21vw)";
    }
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
