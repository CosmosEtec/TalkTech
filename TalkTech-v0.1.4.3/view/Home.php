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
    <title>Feed</title>
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
                <a class="nav-link mb-1" id="create-post">
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

            <div class="div-nav-left-side-menu-link">
                <a href="../control/Logout-usuario.php" class="nav-link mb-1">
                <div class="nav-left-side-menu-icon-container">
                    <i class="fa-solid fa-right-from-bracket fa-2xl" style="color: #ffffff;"></i>
                </div>
                <span class="mt-1">Logout</span>
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
                <div class="post-container   mb-2" >
                
                    <div class="profile-top-post  ">
                        <div class="profile-pic  ">
                            <img class="profile-pic-img" src="../assets/img/bonoro-anao.jpg" alt="">
                        </div>
                        <div class="profile-username flex-column ml-1">
                            <h4>UserApelido</h4>
                            <p class="p3">@user</p>
                        </div>
                    </div>  
                    <div class="post-description">
                        <p class="p3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis voluptatum ipsam aperiam eveniet voluptatibus possimus nemo maiores ullam obcaecati quisquam laborum doloribus sed, saepe unde harum non itaque odit id!</p>
                    </div>
                    <div class="content-post">
                        <img src="../assets/img/codimg.jpg" alt="" height="350px">
                    </div>
                    <!---interações---->
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
                    </div>
                    <div class="post-comment-section">
                        <p class="p2">Comentários</p>
                        <div class="post-comment-cell">
                            <div class="post-comment-profile-pic mt-1-4px">
                                <img src="../assets/img/bruno-kawaii.jpg" alt="">
                            </div>
                            <div class="post-commnet-profile-name">
                                <p class="p4">@user</p>
                                <p class="p5 ml-1-4px" id="comentario"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet corporis repellat temporibus est dignissimos tenetur aperiam impedit, eligendi at quae. Labore nostrum magni eos! Facilis nisi qui libero aut sunt.</p>    
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            </div>
        
        <!---========= FIM TIMELINE ===========-->
        
        
        <!---========= Criar Post ===========-->
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
    <script type="module" src="../assets/js/Feed/Timeline/featuresTimeline.js"></script>
</body>
</html>