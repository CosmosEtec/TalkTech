<?php
session_start();
include_once '../control/valida-permanencia.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Chat</title>
</head>
<body>
    <!---========= HEADER =========-->
    
    
    <!---========= CONTAINER FEED =========-->
    <section class="container-chat ">
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
                <a href="profile.php" class="nav-link mb-1">
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
        <nav class="nav-list-chats">
            <div class="w-100 flex-start">
                <button class="dropdown-item" id="dropdown-button">
                    <div class="agroup-itens-button">
                        <i class="fa-solid fa-caret-right" style="color: #ffffff;"></i>
                            <div class="img-users">
                                <img src="../assets/svg/icon-users.svg" alt="">
                            </div>
                        <p class="p4 mt-1">Conversas</p>
                    </div>
                </button>
            </div>
            <div class="dropdown-content mt-1" id="dropdown-list">
                <a class="dropdown-item mb-1" href="#">
                    <div class="chat-cell-user">
                        <div class="chat-cell-user-profile-pic mt-1-4px">
                            <img src="../assets/img/bonoro-anao.jpg" alt="">
                        </div>
                        <div class="chat-user-name-and-message-prev ml-1-4px">
                            <h6 >Pessoa Gay</h6>
                            <p class="p3">Parabéns por ser viado fi..+</p>
                        </div>                  
                    </div>
                </a>
                
                
                <!-- Adicione mais pessoas conforme necessário -->
            </div>

            
        </nav>


        <div class="container-chat-messages">

            <div class="container-direct-messages">
                <div class="header-profile-user-chat">
                    <div class="profile-pic  ">
                        <img class="profile-pic-img" src="../assets/img/bonoro-anao.jpg" alt="">
                    </div>
                    <div class="profile-username flex-column ml-1">
                        <h4>UserApelido</h4>
                        <p>@User</p>
                    </div>
                </div>
                <div class="container-messages-roll">
                    
                    <!--=====================MENSAGEM RECEBIDA========================-->
                    <div class="message-recivied mb-1">
                        <div class="message-balloon-recivied">
                            <h4 class="p2">oi eu estou bem como você está? a sei la eu to bem bom mano obrigado muito obrigado</h4>
                        </div>
                    </div>

                    <div class="message-recivied mb-1">
                        <div class="message-balloon-recivied">
                            <h4 class="p2">oi eu estou bem como você está? a sei la eu to bem bom mano obrigado muito obrigado</h4>
                        </div>
                    </div>

                    <!--=====================MENSAGEM ENVIADA========================-->
                    <div class="message-sent mb-1">
                        <div class="message-balloon-sent">
                            <h4 class="p2">oi eu estou bem como você está? a sei la eu to bem bom mano obrigado muito obrigado</h4>
                        </div>
                    </div>

                    
                    
                    
                   

                </div>
            </div>
            <div class="sending-container">
                <input type="text" class="message-field" placeholder="Envie uma mensagem">
                <button id="button-send-menssage">
                    <i class="fa-solid fa-paper-plane fa-2xl ml-1" style="color: #701f88;"></i>
                </button>
                
            </div>
        </div>
    
    
          
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../assets/js/createPost.js"></script>
        <script src="../assets/js/button.js"></script>
        <script type="module" src="../assets/js/Chat/functionsChat.js"></script>
</body>
</html>