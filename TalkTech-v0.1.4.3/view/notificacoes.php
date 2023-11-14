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
    <title>Home</title>
</head>
<body>
    <!---========= HEADER =========-->
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
    
    <!---========= CONTAINER FEED =========-->
    <section class="container-feed ">
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
    
    
        <!---========= TIMELINE =========-->
        <div class="container-timeline" id="scrollableDiv">
        
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
        <div class="feed-roll">

        <div class="overlayed" id="overlay" > </div>
        <?php include_once '../control/ControlPostagem.php'; mostrarPosts(); ?> 
                
            </div>
        </div>
        
        <!---========= FIM TIMELINE ===========-->
        
        
        <!---========= Criar Post ===========-->
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
        <!---========= FIM Criar Post ===========-->

         <!---========= FIM POST =========-->

         <!---========= RIGHT SIDE MENU  =========
        <nav class="right-side-menu  ">
            
            <div class="top-languages-right-side-menu  ">
                <div class="top-languages-head">

                    <h4 class=""> <> Melhores Linguagens</h4>
                </div>       

                <div class="top-languages-language-skill">
                    <div class="language-icon">
                        <img src="../assets/img/python.png" alt="">
                    </div>
                    <div class="language-details ">
                        <h4 class="p2">Python</h4>
                        <p class="p3">Linguagem</p>
                    </div>
                </div>   

                <div class="top-languages-language-skill">
                    <div class="language-icon">
                        <img src="../assets/img/angular-framework.png" alt="">
                    </div>
                    <div class="language-details ">
                        <h4 class="p2">Angular</h4>
                        <p class="p3">Framework</p>
                    </div>
                </div>  

                <div class="top-languages-language-skill">
                    <div class="language-icon">
                        <img src="../assets/img/angular-framework.png" alt="">
                    </div>
                    <div class="language-details ">
                        <h4 class="p2">Angular</h4>
                        <p class="p3">Framework</p>
                    </div>
                </div> 
                <div class="btn-centralizar">
                <button class="">
                    <h4 class="p2">Adicionar mais</h4>
                    <i class="fa-solid fa-plus fa-xl mt-1-4px ml-1" style="color: #e0e0e0;"></i>
                </button>
                </div>
                
            </div>

            
            

            </div>
        </nav>   

        -->
        <!---========= FIM RIGHT SIDE MENU  =========-->     
          
        
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/createPost.js"></script>
    <script src="../assets/js/button.js"></script>
    <script type="module" src="../assets/js/Feed/Timeline/featuresTimeline.js"></script>
</body>
</html>