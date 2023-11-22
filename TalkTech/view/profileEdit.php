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

$perfil = new Perfil();
$perfil->setId($_SESSION['login-id']);

$perfil = DaoPerfil::buscarDados($perfil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Editar Perfil | <?php echo '@'.$perfil['nome'] ?></title>
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

        <!---========= CONTAINER Perfil =========-->
        <div class="container-profile-father">
            <div class="container-profile-child">
                <div class="container-profile-user">
                    <div class="container-profile-user-info">
                    <div class="user-image">
                            <img class="imagem-fds" id="imgperfil" src="../<?php echo $perfil['fotoPerfil'] ?>" onclick="triggerClick()"></img>
                            <input type="file" id="profileImage" name="profileImage" style="display: none;" onchange="displayImage(this)">
                        </form>
                    </div>
                    
                        <div class="user-info-detalhes mx-2">
                            <div class="user-detalhes-name-btn mb-2">
                                <h3 class="detalhes-name" id="nomePerfil">
                                    <?php echo '@'.$perfil['nome']; ?>
                                </h3>
                                <div class="detalhes-btn">
                                    <a class="btn-detalhes" href="profile.php">voltar</a>
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
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Configuração do perfil -->

                <div class="formulario-atualizacao">

                    <div class="input-field-profile my-2">
                        <input type="text" id="apelido" name="apelido" value="<?php echo $perfil['apelido'] ?>" required="required">
                        <span>Apelido:</span>
                    </div>
                    <p class="contador-letras" id="contadorApelido">0/50</p>

                    <div class="input-field-profile my-2">
                        <textarea id="biografia" name="biografia" value="<?php echo $perfil['biografia'] ?>" required="required"><?php echo $perfil['biografia'] ?></textarea>
                        <span>Biografia:</span>
                    </div>
                    <p class="contador-letras mb-1" id="contadorBio">0/160</p>

                    <?php
                    if($perfil['perfilPrivado'] != 0)
                    {
                        echo '<label class="checked-privado" for="privado">Perfil privado:</label>';
                        echo '<input type="checkbox" id="privado" name="privado" value="privado" checked>';
                    }
                    else
                    {
                        echo '<label class="checked-privado" for="privado">Perfil privado:</label>';
                        echo '<input type="checkbox" id="privado" name="privado" value="privado">';
                    }
                    ?>

                    <div class="solitaria"></div>

                    <div class="btn-profile-edit">
                        <button class="btn" id="submitEdit" disabled>Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!---========= FIM CONTAINER TIMELINE =========-->
        <div class="overlay" id="card-overlay" >
            <div class="container-create-post" id="info-card" >
              <div class="flex-start">
                <button id="close-create-post"><i class="fa-solid fa-xmark fa-2xl" style="color: #e8ecf2;"></i></button>
              </div>  
              <div id="image-preview-container">
                
                <input type="file" id="image-upload" accept="image/*" onchange="previewImage()"/>
                <img id="image-preview" src="#" alt="" />
                <label for="image-upload" class="custom-file-input">
                    <img src="../assets/img/icon-img.png" alt="">
                </label>
              </div>   
              <textarea class="mt-3" class="description-post" id="description" placeholder="Escreva a sua descrição"></textarea>
              <div class="flex-end">
                <button class="publish-button mt-1 mb-1">Publicar</button>
              </div>  
            </div>
          </div>
    </section>
    <!---========= FIM CONTAINER PERFIL =========-->
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
                <p class="p1 mt-1">Qual a boa?</p> 
            </div> 

            <div class="description-align">
                <div class="profile-pic  ">
                    <img class="profile-pic-img" src="../assets/img/bonoro-anao.jpg" alt="">
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

    <script src="../assets/js/createPost.js"></script>
    <script src="../assets/js/button.js"></script>
    <script src="../assets/js/previewImage.js"></script>
    <script src="../assets/js/profileEdit.js"></script>
    <script src="../assets/js/edit.js"></script>
    
</body>
</html>