<?php
session_start();
include_once '../control/valida-permanencia.php';
require_once '../dao/DaoPerfil.php';
require_once '../model/Perfil.php';
$perfil = new Perfil();
$perfil->setID($_SESSION['login-id']);
$perfil = DaoPerfil::buscarDados($perfil);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Home</title>
    
</head>
<body>
    <!---========= HEADER =========-->
    <header id="header">
        <!---========= NAV-BAR DESKTOP =========-->
        <nav class="navbar-desktop" data-aos="fade-up">
            <a href="#Inicio" class="navbar-desktop-logo"><img src="../assets/svg/t-logo.svg" alt="" width="60px" height="70px"></a>
            <div class="search-field flex-start ">
                <button class="search-field-button">
                    <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i>
                </button>
                    <input class="search-field-input" id="searchInput" type="search" placeholder="Quem você busca?">
                    <ul id="suggestionList" class="suggestion-list">            
                    </ul>
            </div>
            <div class=""> 
            </div>
        </nav>
    </header>
    
    <!---========= CONTAINER FEED =========-->
    <section class="container-feed ">
        
        
        <!---========= Notificações =========-->
        <nav class="menu-notificacoes">
                <a class="close-notificacoes-mobile" onclick="toggleNotificacoes()">
                    <i class="fa-solid fa-xmark fa-2xl" style="color: #e8ecf2;"></i>
                </a>
                <div class="menu-notificacoes-head">
                    <i class="fa-regular fa-bell fa-xl" style="color: #ffffff;"></i>
                    <h3 class="ml-1-4px bold">Notificações</h3>
                </div>
                <div class="menu-notifications-tag">
                    <p>Saiba de todas suas interações por aqui. Todos os comentário, seguidores e curtidas. </p>
                </div>
                <div class="notification-novas mt-2">
                    <h4>Últimas atualizações</h4>
                </div>
                <div class="menu-notifications-follower-cell mt-1">
                    <div class="img-user-notification">
                        <img src="../assets/img/bonoro-anao.jpg" alt="">
                    </div>

                    <div class="notification-info-cell ml-1-4px">
                        <h6>@userzédamanga</h6>
                        <p class="p3">curtiu seu comentário: @aroma_de_chuva ninguém liga pra isso não man fica na tua cabeça de alicate
                            imundo sujo podre feio fedido pobre lascado.
                        </p>
                    </div>
                    <div class="notification-interactions">
                        <button class="mt-1-4px"id="like-heart">
                            <i class="fa-solid fa-heart fa-lg heart-liked" style="color: #bd02c0;" id="heart-liked"></i>
                            <i class="fa-regular fa-heart fa-lg heart-unliked" style="color: #d1d1d1;" id="heart-unliked"></i>
                        </button>
                        <button class="mt-1-4px"><h6>Responder</h6></button>
                    </div>
                    <div class="notification-type">
                        <i class="fa-solid fa-message fa-sm" style="color: #ffffff;"></i>
                    </div>
                </div>
            </nav>

            <!---========= Fim Notificações =========-->

            <!---========= LEFT SIDE MENU =========--> 
            <nav class="nav-left-side-menu   " id="side-menu">
                
                    <div class="div-nav-left-side-menu-link  ">
                        
                        <a href="Home.php" class="nav-link mb-1">
                            <div class="nav-left-side-menu-icon-container">
                                <i class="fa-solid fa-house fa-lg" style="color: #ffffff;"></i>
                                <span class="ml-1-4px">Home</span>    
                            </div>
                            
                        </a>   
                        
                    </div>
                

                <!--
                <div class="div-nav-left-side-menu-link">
                    <a href="chat.php" class="nav-link mb-1"> 
                        <div class="nav-left-side-menu-icon-container">
                            <i class="fa-solid fa-message fa-lg" style="color: #ffffff;"></i>
                            <span class="ml-1-4px">Chat</span>
                        </div>
                    </a>
                </div>
                -->
            
                
                <div class="div-nav-left-side-menu-link">
                    <a class="nav-link mb-1 create-post" id="create-post">
                        <div class="nav-left-side-menu-icon-container">
                            <i class="fa-solid fa-circle-plus fa-lg" style="color: #ffffff;"></i>
                            <span class="ml-1-4px">Postar</span>
                        </div>
                    </a>
                </div>

                <div class="div-nav-left-side-menu-link">
                    <a href="profile.php" class="nav-link mb-1">
                    <div class="nav-left-side-menu-icon-container">
                        <i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i>
                        <span class="ml-1-4px">Perfil</span>
                    </div>
                    </a>
                </div>

                <!-- 
                <div class="div-nav-left-side-menu-link">
                    <a class="nav-link mb-1" onclick="toggleNotificacoes()">
                    <div class="nav-left-side-menu-icon-container">
                        <i class="fa-solid fa-bell fa-lg" style="color: #ffffff;"></i>
                        <span class="ml-1-4px">Notificações</span>
                    </div>
                    </a>
                </div>
                -->

                <div class="div-nav-left-side-menu-link">
                    <a href="../control/Logout-usuario.php" class="nav-link mb-1">
                    <div class="nav-left-side-menu-icon-container">
                        <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #ffffff;"></i>
                        <span class="ml-1-4px">Logout</span>
                    </div> 
                    </a>
                </div>

                
            </nav>

        <!---========= FIM LEFT SIDE MENU =========-->         
        
        <!---========= TIMELINE =========-->
        <div class="container-timeline">
            
            <!---========= NAV TIMELINE =========
            
            <nav class="nav-menu-timeline">
                <div class="nav-menu-list-buttons">
                    <div class="nav-menu-button-container">
                        <button class="nav-menu-button-timeline" onclick="buttonActive()">Timeline</button>
                    </div>
                    <div class="nav-menu-button-container ml-2">
                        <button class="nav-menu-button-timeline" onclick="buttonActive()">Issues</button>
                    </div>
                    <div class="nav-menu-button-container ml-2">
                        <button class="nav-menu-button-timeline" onclick="buttonActive()">Jontex</button>
                    </div>
                </div>

                <div class="nav-menu-button-container">
                    <button class="nav-menu-button-timeline"  onclick="buttonActive()">[][][]</button>
                </div>
            </nav>
            -->

            <!---========= FIM NAV TIMELINE =========-->
        
        
        <!---========= POST ===========
        <div class="post-container   mb-2" >
            <div class="profile-top-post  ">
                <div class="profile-pic  ">
                    <img class="profile-pic-img" src="../" alt="">
                </div>
                <div class="profile-username flex-column ml-1">
                    <h4>fdsfdsf</h4>
                    <p class="p3">fsdfsd</p>
                </div>
            </div>
            <div class="post-description">
                <p class="p3">fsdfdsf</p>
            </div>
                <div class="content-post">
                    <img src="../assets/img/bonoro-anao">
                </div>
                <div class="post-interactions  ">
                    <div class="like-heart-comment-container">
                        <button id="like-heart">
                            <i class="fa-solid fa-heart fa-2xl heart-liked" style="color: #bd02c0;" id="heart-liked"></i>
                            <i class="fa-regular fa-heart fa-2xl heart-unliked" style="color: #d1d1d1;" id="heart-unliked"></i>
                        </button>
                    </div>
                </div>
                <div class="post-comment-section">
                    <div class="input-comentario-align mb-1">
                        <div class="profile-pic  ">
                            <img class="profile-pic-img" src="../<?php echo $perfil['fotoPerfil']?>" alt="">
                        </div>

                        <textarea class="" class="input-comentario-align" id="input-comentario" placeholder="Escreva um comentário"></textarea>
                     </div>
                    <h4 class="comentarios-k mb-2">Comentários</h4>
                    
                    <div class="post-comment-cell mb-1">
                        <div class="post-comment-profile-pic">
                            <img src="../assets/img/bonoro-anao.jpg" alt="">
                        </div>
                        <div class="flex-column ml-1-4px">
                        <h6 class="">@userzédamanga</h6>
                        <p class="p3 mb-1">vish</p>
                        </div>
                    </div>

                    <div class="post-comment-cell mb-1">
                        <div class="post-comment-profile-pic">
                            <img src="../assets/img/bonoro-anao.jpg" alt="">
                        </div>
                        <div class="flex-column ml-1-4px">
                        <h6 class="">@userzédamanga</h6>
                        <p class="p3 mb-1">vish</p>
                        </div>
                    </div>
                </div>
            </div>    
            -->
            <?php include_once '../control/ControlPostagem.php'; mostrarPostsFeed(); ?>  

        
      
             <div class="overlayed" id="overlay" > 

             </div>    
            </div>
        

        <!---========= FIM TIMELINE ===========-->

        <!---========= CARD PERFIL CRIAR POST ===========-->
            <div class="container-card-profile-create-post mr-2 mt-2 flex-item-2    ">
             
                <div class="card-profile-create-post-title">
                <div class="radial-glow">
                    <h3 class="bold">Compartilhe código</h3>
                    <div class="circle-dev ml-1-4px">
                        <i class="fa-solid fa-code fa-xl ml-1-4px mr-1-4px" style="color: #ffffff;"></i>
                    </div>
                    </div>
                </div>
                
                    <div class="profile-pic mt-1">
                    
                        <img class="profile-pic-img" src="../<?php echo $perfil['fotoPerfil']?>" alt="">
                    </div>
                <h4><?php echo $perfil['apelido']?></h4>
               
                <a class="create-post-card-button mt-2 create-post">
                        <span class="ml-1-4px"><h4 class="bold">Criar Postagem</h4></span>
                        <i class="fa-solid fa-square-pen fa-xl ml-1-4px mt-1-4px" style="color: #ffffff;"></i>
                </a>

            </div>

        <!---========= FIM CARD PERFIL CRIAR POST ===========-->
        
        <!---========= Criar Post ===========-->
        <div class="overlay" id="card-overlay" >
        
            <div class="container-create-post" id="info-card" >
                <button id="close-create-post"><i class="fa-solid fa-xmark fa-2xl" style="color: #e8ecf2;"></i></button>
                <div class="head-create-post">
                    <h4>Nova Publicação</h4>
                </div>  
                <div class="flex-start">
                    <div id="image-preview-container">
                        <label class="custom-file-input remove">
                            <img src="../assets/img/icon-remove-image.png" alt="">
                            <h6 class="mt-1 ml-1-4px">Remover</h6>
                        </label> 
                        <div class="remove-image"></div>
                        <input type="file" id="image-upload" accept="image/*" onchange="previewImage()"/>
                        <img id="image-preview" src="#" alt="" />
                        
                        
                    </div> 
                </div>
                <div class="flex-start">
                    <p class="p1 mt-1">No que está pensando?</p> 
                    <i class="fa-regular fa-comment-dots fa-xl mt-1 ml-1" style="color: #b7b7b7;"></i>
                </div> 

                <div class="description-align">
                    <div class="profile-pic  ">
                        <img class="profile-pic-img" src="../<?php echo $perfil['fotoPerfil']?>" alt="">
                    </div>

                    <textarea class="" class="description-post" id="description" placeholder="Compartilhe o que está acontecendo"></textarea>
                </div>
                <div class="elements-create-post">
                    <div class="elements">
                        <label for="image-upload" class="custom-file-input">
                            <img src="../assets/img/icon-add-image.png" alt="">
                        </label> 
                    </div>
                    <button class="publish-button mt-1 mb-1" id="submitPost"><h6>Publicar</h6></button>
                </div>  
            </div>
          </div>
        <!---========= FIM Criar Post ===========-->      
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/createPost.js"></script>
    <script src="../assets/js/button.js"></script>
    <script src="../assets/js/navbar.js"></script>
    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/excluirPost.js" defer></script>
    <script src="../assets/js/compartilhar.js" defer></script>
    <script type="module" src="../assets/js/Feed/Timeline/featuresTimeline.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/sweetalert.js" defer></script>
    <script src="../assets/js/curtir.js" defer></script>
</body>
</html>