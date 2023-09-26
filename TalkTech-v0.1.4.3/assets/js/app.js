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