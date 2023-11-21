// ===================== Mudança Estado do botão

const links = document.querySelectorAll('.nav-link-side-menu');

links.forEach(link => {
  link.addEventListener('click', () => {
    links.forEach(btn => btn.classList.remove('active'));
    link.classList.add('active');
  });
});


// ===================== Animation Form Login Cadastro ====================

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