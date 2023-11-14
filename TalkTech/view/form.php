<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@200;400&family=Source+Sans+3:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Talk Tech</title>
    </head>
    <body>
        <section class="wrapper" id="mobile-form">

            <!--Fundo de Estrelas-->

            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>

            <!-- Formulario -->

            <div class="form-father">
                <div class="form-left flex-item-1">
                    <div class="form-logo-relative">
                        <div class="form-logo">
                            <img src="../assets/svg/TalkTechLogo.png" alt="">
                        </div>
                    </div>
                </div>

                <!-- Form Login -->

                <div class="form-right flex-item-1">
                    <div class="form-login-relative form-panel">
                        <div class="form-login">
                            <form action="../control/valida-acesso-usuario.php" method="POST"  id="loginForm" class="form-login-fields">
                                <h6 class="title-login">Login</h6>
                                <div class="input-field my-2">
                                    <input type="email" name="Email" id="emailLogin" required="required">
                                    <span>Email</span>
                                </div>
                                <div class="input-field my-2">
                                    <input type="password" name="Senha" id="senhaLogin" required="required">
                                    <span>Senha</span>
                                </div>

                                <input type="submit" class="btn mt-2 mb-1">
                                
                                <p class="form-text-cadastrar mt-2">Você não tem uma conta ainda? <a class="form-link-cadastrar" href="#">Cadastrar-se</a></p>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Form Cadastro -->

                    <div class="form-cadastro-relative form-panel">
                        <div class="form-cadastro">
                           <!-- <form action="../control/cadastra-Perfil.php" method="POST" class="form-cadastro-fields">
-->
                            <form id="cadForm">
                           <h6 class="title-cadastro">Cadastro</h6>
                                <div class="input-field my-2">
                                    <input type="text" name="NomeCadastro" id="NomeCadastro" required="required">
                                    <span>Nome de Usuário</span>
                                </div>
                                <div class="input-field my-2">
                                    <input type="text" name="EmailCadastro" id="EmailCadastro" required="required">
                                    <span>Email</span>
                                </div>
                                <div class="input-field my-2">
                                    <input type="password" name="SenhaCadastro" id="SenhaCadastro" required="required">
                                    <span>Senha</span>
                                    <br>
                                    <div class="flex-start mt-1">
                                        <input type="checkbox" class="senhaCadastro" id="xecaboquis" onclick="myFunction()">
                                        <p class="form-text-Login ">Visualizar Senha</p>
                                    </div>
                                </div>
                                    

                                <div class="input-field my-2">
                                    <input type="password" name="ConfirmaSenhaCadastro" id="ConfirmaSenhaCadastro" required="required">
                                    <span>Confirma Senha</span>
                                </div>

                                <input type="submit" class="btn mt-2 mb-1" id="submitButton">
                                <div id="message" style="display:none">
  <p>A sua senha precisa de:</p>
  <p id="letter" class="invalid"><b>letra Minuscula</b> </p>
  <p id="capital" class="invalid"><b>letra Maiuscula</b></p>
  <p id="number" class="invalid"><b>Numeros</b></p>
  <p id="length" class="invalid">Minimo <b>8 caracteres</b></p>
</div>
                                <p class="form-text-Login mt-2">Você ja tem uma conta? <a class="form-link-login" href="#">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../assets/js/login.js"></script>
        <script src="../assets/js/criaruser.js"></script>
        <script src="../assets/js/script.js?v3"></script>
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/sweetalert.js"></script>
    </body>
</html>