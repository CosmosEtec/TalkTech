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
        <script src="../assets/js/app.js"></script>
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
                            <form action="control/valida-acesso-usuario.php" method="POST" class="form-login-fields">
                                <h6 class="title-login">Login</h6>
                                <div class="input-field my-2">
                                    <input type="email" name="Email" required="required">
                                    <span>Email</span>
                                </div>
                                <div class="input-field my-2">
                                    <input type="password" name="Senha" required="required">
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
                            <form action="control/cadastra-Perfil.php" method="POST" class="form-cadastro-fields">
                                <h6 class="title-cadastro">Cadastro</h6>
                                <div class="input-field my-2">
                                    <input type="text" name="Nome" required="required">
                                    <span>Nome de Usuário</span>
                                </div>
                                <div class="input-field my-2">
                                    <input type="text" name="Email" required="required">
                                    <span>Email</span>
                                </div>
                                <div class="input-field my-2">
                                    <input type="password" name="Senha" required="required">
                                    <span>Senha</span>
                                </div>
                                <div class="input-field my-2">
                                    <input type="password" name="ConfirmaSenha" required="required">
                                    <span>Confirma Senha</span>
                                </div>

                                <input type="submit" class="btn mt-2 mb-1">
                                
                                <p class="form-text-Login mt-2">Você ja tem uma conta? <a class="form-link-login" href="#">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Mobile -->

        <div class="form-mobile-father">
            <div class="form-logo-mobile">
                <img src="../assets/svg/TalkTechLogo.png" alt="">
            </div>

            <!-- Form Mobile Login -->

            <form action="control/valida-acesso-usuario.php" method="POST" class="form-login-fields-mobile">
                <h6 class="title-login-mobile mt-2">Login</h6>
                <div class="input-field my-2">
                    <input type="text" name="Email" required="required">
                    <span>Email</span>
                </div>
                <div class="input-field my-2">
                    <input type="password" name="Senha" required="required">
                    <span>Senha</span>
                </div>

                <input type="submit" class="btn mt-2 mb-1">
                
                <p class="form-text-cadastrar mt-2">Você não tem uma conta ainda? <a class="form-link-cadastrar-mobile" href="#">Cadastrar-se</a></p>
            </form>

            <!-- Form Mobiile Cadastrar -->

            <form action="control/cadastra-Perfil.php" method="POST" class="form-cadastro-fields-mobile">
                <h6 class="title-login-mobile mt-2">Cadastro</h6>
                <div class="input-field my-2">
                    <input type="text" name="Nome" required="required">
                    <span>Nome de Usuário</span>
                </div>
                <div class="input-field my-2">
                    <input type="text" name="Email" required="required">
                    <span>Email</span>
                </div>
                <div class="input-field my-2">
                    <input type="password" name="Senha" required="required">
                    <span>Senha</span>
                </div>
                <div class="input-field my-2">
                    <input type="password" name="ConfirmaSenha" required="required">
                    <span>Confirma Senha</span>
                </div>

                <input type="submit" class="btn mt-2 mb-1">
                
                <p class="form-text-Login mt-2">Você ja tem uma conta? <a class="form-link-login-mobile" href="#">Login</a></p>
            </form>

        </div>
    </body>
</html>