<?php
session_start();
include_once '../control/valida-permanencia.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Perfil</title>
</head>
<body>

    <header id="header">
        <!---========= NAV-BAR DESKTOP =========-->
        <nav class="navbar-desktop" data-aos="fade-up">
            <a href="#Inicio" class="navbar-desktop-logo"><img src="../assets/svg/t-logo.svg" alt="" width="60px" height="70px"></a>
            <div class="search-field flex-start ">
                <div class="px-1">
                    <img src="../assets/svg/icon-search-nav.svg" alt="" width="26px" height="26px">
                </div>
                    <input class="search-field" type="text" placeholder="Quem você busca?">
            </div>
            <div class=""> 
            </div>
        </nav>
    </header>
           
    <!---========= SIDE MENU =========-->
   
    <!---========= FIM SIDE MENU =========-->

    <!---========= CONTAINER PERFIL =========-->
    <section class="container-profile"> 
        
        <!---========= LEFT SIDE MENU =========--> 
        <nav class="nav-left-side-menu   " id="side-menu">
            
                <div class="div-nav-left-side-menu-link  ">
                    
                    <a href="Home.php" class="nav-link mb-1">
                        <div class="nav-left-side-menu-icon-container">
                        <img src="../assets/svg/icon-home.svg" width="50px" height="30px" alt="">
                        </div>
                        <span class="mt-1">Home</span>
                    </a>   
                    
                </div>
            

              
            <div class="div-nav-left-side-menu-link">
                <a href="chat.php" class="nav-link mb-1"> 
                    <div class="nav-left-side-menu-icon-container">
                        <img src="../assets/svg/icon-chat.svg" width="60px" alt="">
                    </div>
                    <span class="mt-1">Chat</span>
                </a>
            </div>
           
            
            <div class="div-nav-left-side-menu-link">
                <a class="nav-link mb-1">
                    <div class="nav-left-side-menu-icon-container">
                        <img src="../assets/svg/icon-add-plus-circle.svg" width="60px" alt="">
                    </div>
                    <span class="mb-1">Criar</span>
                </a>
            </div>
            <div class="div-nav-left-side-menu-link">
                <a href="profile.php" class="nav-link mb-1">
                <div class="nav-left-side-menu-icon-container">
                    <img src="../assets/svg/icon-profile-side-menu.svg" width="60px" alt="">
                </div>
                <span class="mt-1">Perfil</span>
                </a>
            </div>

            <div class="div-nav-left-side-menu-link">
                <a href="profile.php" class="nav-link mb-1">
                <div class="nav-left-side-menu-icon-container">
                    <img src="../assets/svg/icon-notification.svg" width="60px" alt="">
                </div>
                <span class="mt-1">Notificações</span>
                </a>
            </div>
        </nav>
        <!---========= FIM LEFT SIDE MENU =========-->

        <!---========= CONTAINER TIMELINE =========-->
        <div class="container-profile-father">
            <div class="container-profile-child">
                <div class="container-profile-user">
                    <div class="container-profile-user-info">
                        <div class="user-image">
                            <div class="imagem-fds"></div>
                        </div>
                        <div class="user-info-detalhes mx-2">
                            <div class="user-detalhes-name-btn mb-2">
                                <h3 class="detalhes-name">KaizerDragon</h4>
                                <div class="detalhes-btn">
                                    <a class="btn-detalhes" href="#">Editar Perfil</a>
                                    <a class="btn-detalhes" href="#">Configuração</a>
                                </div>
                            </div>
                            <div class="user-info-seguidores mb-2">
                                <div class="info-seguidores">
                                    <p class="p2 text-profile">10</p>
                                    <p class="p2 text-profile">Publicações</p>
                                </div>
                                <div class="info-seguidores">
                                    <p class="p2 text-profile">300</p>
                                    <p class="p2 text-profile">Seguidores</p>
                                </div>
                                <div class="info-seguidores">
                                    <p class="p2 text-profile">150</p>
                                    <p class="p2 text-profile">Seguindo</p>
                                </div>
                            </div>
                            <div class="user-info-descricao">
                                <p class="p3 text-profile bold">Eduardo Alves Azevedo</p>
                                <p class="p3 text-profile">Sou programador Front-End?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-profile-child-public">
                    <div class="public-title mt-2 mb-2">
                        <h3 class="title-profile">Publicações</h3>
                    </div>

                    <div class="child-public-post mt-2">
                        <p>Não foram feitas publicações ainda!</p>
                    </div>

                    <!-- Publicação do Bolso
                    <div class="post-container back-bow mb-2">
                        <div class="profile-top-post">
                            <div class="profile-pic">
                                <img class="profile-pic-img" src="../assets/img/bonoro-anao.jpg" alt="">
                            </div>
                            <div class="profile-username flex-column ml-1">
                                <h4>bolsonaro</h4>
                                <p>@suicidio</p>
                            </div>
                            
                        </div>  
                        <div class="content-post">
                            <img src="../assets/img/bonoro-anao.jpg" alt="" height="350px">
                        </div>
                        <div class="post-interactions">
                            <div class="post-like-comment">
                                <div>
                                <button class="post-like-comment mt-1">
                                    <img class="" src="../assets/svg/icon-comment.svg" alt="">
                                </button>
                                </div>
                            <div>    
                            <button class="post-like-heart mt-1 ml-1">
                                    <img class="" src="../assets/svg/icon-heart-like.svg" alt="">
                                </button>
                            </div>
                            </div>
                            <div>
                                <img src="../assets/svg/icon-3-points-horizontal.svg" alt="">
                            </div>
                        </div>
                        <div class="post-description">
                            <h4 class="mt-1">Congresso anula os traveseiros de waifu do bolsonaro!</h4>
                            <p>Infelizmente nesta manhã de terça-feira (15), bolsonaro teve seus bens confiscados
                                e a Polícia Federal apreendeu todos seus dakimakura (travesseiros de waifu).
                            </p>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
        <!---========= FIM CONTAINER TIMELINE =========-->
        <div class="overlay" id="card-overlay" >
            <div class="container-create-post" id="info-card" >
              <div class="flex-start">
                <button id="close-create-post"><img src="../assets/svg/icon-arrow-left.svg" alt=""></button>
              </div>  
              <div id="image-preview-container">
                <img id="image-preview" src="#" alt="" />
                <label for="image-upload" class="custom-file-input">
                    <img src="../assets/img/icon-img.png" alt="">
                </label>
                <input type="file" id="image-upload" accept="image/*" onchange="previewImage()"/>
              </div>
              <textarea class="mt-3" class="description-post" id="description" placeholder="Escreva a sua descrição"></textarea>
              <div class="flex-end">
                <button class="publish-button mt-1 mb-1">Publicar</button>
              </div>  
            </div>
          </div>

        </div> 
    </section>
    <!---========= FIM CONTAINER PERFIL =========-->
       

    <script src="../assets/js/createPost.js"></script>
</body>
</html>