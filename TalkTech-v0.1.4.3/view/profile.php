<?php
session_start();
include_once '../control/valida-permanencia.php';
include_once '../dao/DaoPerfil.php';
include_once '../dao/DaoSeguidor.php';
include_once '../dao/DaoBloqueado.php';
include_once '../dao/DaoPostagem.php';
require_once('../model/Postagem.php');
require_once('../model/Perfil.php');
require_once('../model/Comentario.php');
require_once('../model/Seguidor.php');
require_once('../dao/DaoComentario.php');


if(!isset($_GET['id'])){
$perfil = new Perfil();
$perfil->setId($_SESSION['login-id']);

$perfil = DaoPerfil::buscarDados($perfil);
}else{
    $perfil = new Perfil();
    $perfil->setId($_GET['id']);
    
    $perfil = DaoPerfil::buscarDados($perfil);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <i class="fa-solid fa-house fa-lg" style="color: #ffffff;"></i>
                            <span class="ml-1-4px">Home</span>    
                        </div>
                        
                    </a>   
                    
                </div>
            

              
            <div class="div-nav-left-side-menu-link">
                <a href="chat.php" class="nav-link mb-1"> 
                    <div class="nav-left-side-menu-icon-container">
                        <i class="fa-solid fa-message fa-lg" style="color: #ffffff;"></i>
                        <span class="ml-1-4px">Chat</span>
                    </div>
                </a>
            </div>
           
            
            <div class="div-nav-left-side-menu-link">
                <a class="nav-link mb-1" id="create-post">
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

            <div class="div-nav-left-side-menu-link">
                <a href="notificacoes.php" class="nav-link mb-1">
                <div class="nav-left-side-menu-icon-container">
                    <i class="fa-solid fa-bell fa-lg" style="color: #ffffff;"></i>
                    <span class="ml-1-4px">Notificações</span>
                </div>
                </a>
            </div>

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

        <!---========= CONTAINER TIMELINE =========-->
        <div class="container-profile-father">
            <div class="container-profile-child">
                <div class="container-profile-user">
                    <div class="container-profile-user-info">
                        <div class="user-image">
                            <img class="imagem-fds" src="../<?php echo $perfil['fotoPerfil'] ?>" ></img>
                        </div>
                        <div class="user-info-detalhes mx-2">
                            <div class="user-detalhes-name-btn mb-2">
                                <h3 class="detalhes-name">
                                    <?php if(!$perfil['apelido']){
                                    echo $perfil['nome'];
                                    }else{
                                    echo $perfil['apelido'];}?>
                                </h3>
                                <div class="detalhes-btn">
                                    <a class="btn-detalhes" href="#">Editar Perfil</a>
                                    <a class="btn-detalhes" href="#">Configuração</a>
                                </div>
                            </div>
                            <div class="user-info-seguidores mb-2">
                                <div class="info-seguidores">
                                    <p class="p2 text-profile"><?php echo DaoPostagem::buscarQtddPostagem($perfil) ?></p>
                                    <p class="p2 text-profile">Publicações</p>
                                </div>
                                <div class="info-seguidores">
                                    <p class="p2 text-profile"><?php echo DaoSeguidor::buscarSeguidores($perfil) ?></p>
                                    <p class="p2 text-profile">Seguidores</p>
                                </div>
                                <div class="info-seguidores">
                                    <p class="p2 text-profile"><?php echo DaoSeguidor::buscarSeguidos($perfil) ?></p>
                                    <p class="p2 text-profile">Seguindo</p>
                                </div>
                            </div>
                            <div class="user-info-descricao">
                                <p class="p3 text-profile bold">
                                    <?php if($perfil['apelido']){
                                    echo $perfil['nome'];
                                    }?>
                                </p>
                                <p class="p3 text-profile"><?php $perfil['biografia']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-profile-child-public">
                    <div class="public-title mt-2 mb-2">
                        <h3 class="title-profile">Publicações</h3>
                    </div>
                <?php 
                $postagens = DaoPostagem::buscarPostagensPerfil($perfil);
                if(isset($postagens)){
                    foreach($postagens as $postagem){
                        $perfil = new Perfil();
                        $perfil->setId($postagem['idPerfil']);
                        $perfil = DaoPerfil::buscarDados($perfil);
                
                        $comentario = new Comentario();
                        $comentario->setIdPostagem($postagem['idPostagem']);
                        $comentario = DaoComentario::buscarDados($comentario);
                
                        echo '
                        <div class="post-container   mb-2" id="'.$postagem["idPostagem"].'">
                        <div class="profile-top-post  ">
                            <div class="profile-pic  ">
                                <img class="profile-pic-img" src="../'.$perfil['fotoPerfil'].'" alt="">
                            </div>
                            <div class="profile-username flex-column ml-1">
                            <h4>'. ($perfil["apelido"] ? $perfil["apelido"] : $perfil["nome"]) .'</h4>
                            <p class="p3">@'.($perfil["apelido"] ? $perfil["apelido"] : $perfil["nome"]).'</p>
                            </div>
                        </div>  
                        <div class="post-description">
                            <p class="p3">'. $postagem["legenda"] .'</p>
                        </div>';
                
                        if(!isset($postagem['Conteudo'])){
                            echo '<div class="post-img-container">
                            <img src="../'. $postagem["Conteudo"] .'" alt="" height="350px">
                            </div>';
                        }
                
                        echo '
                        <div class="post-interactions  ">
                            <div class="like-heart-comment-container">
                                    <button id="like-heart">
                                    <i class="fa-solid fa-heart fa-2xl heart-liked" style="color: #bd02c0;" id="heart-liked"></i>
                                    <i class="fa-regular fa-heart fa-2xl heart-unliked" style="color: #d1d1d1;" id="heart-unliked"></i>
                                    </button>
                
                                    <button class="mt-1-4px comment" id="comment">
                                    <i class="fa-solid fa-message fa-flip-horizontal fa-2xl ml-2" style="color: #d1d1d1;"></i>
                                    </button>
                                </div>
                        </div>';
                
                        echo '<div class="post-comment-section">
                            <p class="p2">Comentários</p>';
                
                            if(isset($comentario)){
                                foreach($comentario as $coment){
                                    $perfil = new Perfil();
                                    $perfil->setId($coment['idPerfil']);
                                    $perfil = DaoPerfil::buscarDados($perfil);
                
                
                                echo '<div class="post-comment-cell">
                                <div class="post-comment-profile-pic mt-1-4px">
                                    <img src="../'.$perfil['fotoPerfil'].'" alt="">
                                </div>
                                <div class="post-commnet-profile-name">
                                    <p class="p4">@'. ($perfil["apelido"] ? $perfil["apelido"] : $perfil["nome"]) .'</p>
                                    <p class="p5 ml-1-4px" id="comentario">'.$coment["comentario"].'</p>    
                                </div>
                                ';
                                
                            }
                        
                    }
                    echo '</div></div>';
                }
                }else{
                    echo '<div class="child-public-post mt-2">
                    <p>Não foram feitas publicações ainda!</p>
                    </div>';
                }
                
                
                ?>
                    
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
    <script src="../assets/js/button.js"></script>
</body>
</html>