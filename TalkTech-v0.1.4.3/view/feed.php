<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
                    
                    <a href="feed.php" class="nav-link mb-1">
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
    
    
        <!---========= TIMELINE =========-->
        <div class="container-timeline" id="scrollableDiv">
        
            <!---========= NAV TIMELINE =========-->
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

            <!---========= FIM NAV TIMELINE =========-->

            <div class="create-post-directly-container">
                <input type="text">
                <button id="create-post"> <div class="nav-left-side-menu-icon-container">
                        <img src="../assets/svg/icon-add-plus-circle.svg" width="60px" alt="">
                    </div></button>
            </div>
        
            <div class="overlayed" id="overlay"> </div>
                <div class="post-container   mb-2" >
            
                    <div class="profile-top-post  ">
                        <div class="profile-pic  ">
                            <img class="profile-pic-img" src="../assets/img/bonoro-anao.jpg" alt="">
                        </div>
                        <div class="profile-username flex-column ml-1">
                            <h4>bolsonaro</h4>
                            <p>@suicidio</p>
                        </div>
                        
                    </div>  
                    <div class="content-post  ">
                        <img src="../assets/img/codimg.jpg" alt="" height="350px">
                    </div>
                    <!---interações---->
                    <div class="post-interactions  ">
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

         <!---========= RIGHT SIDE MENU  =========-->
        <nav class="right-side-menu  ">
            
            <div class="top-languages-right-side-menu  ">
                <div class="top-languages-head">

                    <h4 class=""> <> Melhores Linguagens</h4>
                </div>       
                <!---========= DETALHES DA LINGUAGEM  =========-->
                <div class="top-languages-language-skill">
                    <div class="language-icon">
                        <img src="../assets/img/react-biblioteca.png" alt="">
                    </div>
                    <div class="language-details border">
                        <h4 class="p2">React</h4>
                        <p class="p3">Framework</p>
                    </div>
                </div>   
                <!---========= DETALHES DA LINGUAGEM  =========-->
                <div class="top-languages-language-skill">
                    <div class="language-icon">
                        <img src="../assets/img/angular-framework.png" alt="">
                    </div>
                    <div class="language-details border">
                        <h4 class="p2">Angular</h4>
                        <p class="p3">Framework</p>
                    </div>
                </div>  
                <!---========= DETALHES DA LINGUAGEM  =========-->
                <div class="top-languages-language-skill">
                    <div class="language-icon">
                        <img src="../assets/img/angular-framework.png" alt="">
                    </div>
                    <div class="language-details border">
                        <h4 class="p2">Angular</h4>
                        <p class="p3">Framework</p>
                    </div>
                </div> 

                <button class=""></button>
            </div>

            
            

            </div>
        </nav>   
        <!---========= FIM RIGHT SIDE MENU  =========-->     
          
        
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/createPost.js"></script>
    <script type="module" src="../assets/js/Feed/Timeline/featuresTimeline.js"></script>
</body>
</html>