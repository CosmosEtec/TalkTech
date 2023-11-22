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
require_once('../control/ControlPostagem.php');


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
    <title><?php if(!$perfil['apelido']){
                    echo '@'.$perfil['nome'].' | Perfil do Usuário';
                }else{
                    echo $perfil['apelido'].' (@'.$perfil['nome'].') | Perfil do Usuário';}
            ?>
    </title>
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
         <div class="container-side-menu">
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
                    <a class="nav-link mb-1" onclick="toggleNotificacoes()">
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

            <!---========= Notificações =========-->
            <nav class="menu-notificacoes">
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
                
        </div>
        <!---========= FIM LEFT SIDE MENU =========-->

        <!---========= CONTAINER Perfil =========-->
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
                                    echo '@'.$perfil['nome'];
                                    }else{
                                    echo $perfil['apelido'];}?>
                                </h3>
                                <p class="p3 text-profile bold">
                                    <?php if($perfil['apelido']){
                                    echo '@'.$perfil['nome'];
                                    }?>
                                </p>
                                <div class="detalhes-btn">
                                <?php 
                                if($perfil['idPerfil'] == $_SESSION['login-id']){
                                echo   '<a class="btn-detalhes" href="./profileEdit.php">Editar Perfil</a>';
                                } else {
                                    /*
                                    if(DaoBloqueado::verificarBloqueio($perfil['idPerfil'], $_SESSION['login-id'])){
                                        echo '<a class="btn-detalhes" id="desbloquear">Desbloquear</a>';
                                    }else{
                                        echo '<a class="btn-detalhes" id="bloquear" >Bloquear</a>';
                                    }
                                    */
                                    if(DaoSeguidor::verificarSeguidor($perfil['idPerfil'], $_SESSION['login-id'])){
                                        echo '<a class="btn-detalhes" id="unfollow" >Deixar de Seguir</a>';
                                    }else{
                                        echo '<a class="btn-detalhes" id="follow" >Seguir</a>';
                                    }
                                }
                                ?>
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
                                <p class="p3 text-profile"><?php echo $perfil['biografia']?></p>
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
                    mostrarPostsUsuario($perfil);
                }else{
                    echo '<div class="child-public-post mt-2">
                    <p>Não foram feitas publicações ainda!</p>
                    </div>';
                }
                
                
                ?>
                    
                </div>
            </div>
        </div>
        <!---========= Criar Post ===========-->
        <div class="overlay" id="card-overlay" >
            
            <div class="container-create-post" id="info-card" >
                <button id="close-create-post"><i class="fa-solid fa-xmark fa-2xl" style="color: #e8ecf2;"></i></button>
                <div class="head-create-post">
                    <h4>Nova Publicação</h4>
                </div>  
                <div id="image-preview-container">
                    
                    <input type="file" id="image-upload" accept="image/*" onchange="previewImage()"/>
                    <img id="image-preview" src="#" alt="" />
                    <label for="image-upload" class="custom-file-input">
                        <img src="../assets/img/icon-add-image.png" alt="">
                    </label> 
                    
                </div> 
                <div class="flex-start">
                    <p class="p1 mt-1">Legenda</p> 
                </div> 
                <textarea class="" class="description-post" id="description" placeholder="Escreva a sua descrição"></textarea>
                <div class="flex-end">
                    <button class="publish-button mt-1 mb-1"><h4 class="mr-1">Próximo</h4><i class="fa-solid fa-circle-right fa-2xl" style="color: #82269e;"></i></button>
                </div>  
            </div>
        </div>
    <!---========= FIM Criar Post ===========-->
    </section>
    <!---========= FIM CONTAINER PERFIL =========-->

     
       

    <script src="../assets/js/createPost.js"></script>
    <script src="../assets/js/button.js"></script>
    <script src="../assets/js/navbar.js"></script>
</body>
</html>