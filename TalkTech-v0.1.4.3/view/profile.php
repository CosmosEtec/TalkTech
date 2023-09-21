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
    <a href="#Inicio" class="navbar-desktop-logo"><img src="../assets/svg/t-logo.svg" alt="" width="60px" height="70px"></a>
           

    
    
    
    <!---========= SIDE MENU =========-->
    <nav class="nav-side-menu border " id="side-menu">
        <div class="nav-list-side-menu">
            
            <a href="feed.php" class="nav-link-side-menu mb-1"><img src="../assets/svg/icon-home.svg" width="60" alt=""></a>
            <a href="#Chats" class="nav-link-side-menu mb-1"><img src="../assets/svg/icon-chat.svg" width="60" alt=""></a>
            <a class="nav-link-side-menu mb-1" id="create-post"><img src="../assets/svg/icon-add-plus-circle.svg" width="60" alt=""></a>
            <a href="profile.php" class="nav-link-side-menu"><img src="../assets/svg/icon-profile-side-menu.svg" width="60" alt=""></a>
        </div>
    </nav>
    <!---========= FIM SIDE MENU =========-->

    <!---========= CONTAINER PERFIL =========-->
    <section class="container-profile border"> 
        
       
        <div class="background-bar-header border">
               
        </div>

        <!---========= CONTAINER TIMELINE =========-->
        <div class="container-profile-timeline border">

            <!---========= CONTAINER CABEÇALHO PERFIL =========-->
            <div class="container-profile-background border">
                <div class="profile-pic-timeline border">
                    <img src="../assets/img/bruno-kawaii.jpg" alt="">
                    </div>
                <img src="../assets/img/bolsonaro-maid-dragon.jpg" alt="">
                
            </div>
            <!---========= FIM CONTAINER CABEÇALHO PERFIL =========-->

            <!---========= CONTAINER DESCRIÇÃO PERFIL =========-->
            <div class="container-profile-description border">
                <div class="container-follow-followers border">
                    <div class="follow-followers-itens">
                        <div class="follow-followers-itens-img">
                        <img src="../assets/svg/icon-user-plus.svg" alt="">
                        </div>
                        <p>Seguir</p>
                    </div>
                    <div class="follow-followers-itens">
                        <p class="white">1</p>
                        <p>Seguindo</p>
                    </div>
                    <div class="follow-followers-itens">
                        <p class="white">1</p>
                        <p>Seguidores</p>
                    </div>
                </div>
                <h3>Bruno Kawaii</h3>
                <p>@kokain</p>
            </div>
            
        
        <!---========= POST =========-->
        <div class="post-container back-bow border mb-2">
            <div class="profile-top-post border">
                <div class="profile-pic border">
                    <img class="profile-pic-img" src="../assets/img/bonoro-anao.jpg" alt="">
                </div>
                <div class="profile-username flex-column ml-1">
                    <h4>bolsonaro</h4>
                    <p>@suicidio</p>
                </div>
                
            </div>  
            <div class="content-post border">
                <img src="../assets/img/bonoro-anao.jpg" alt="" height="350px">
            </div>
            <!---interações---->
            <div class="post-interactions border">
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
         <!---========= FIM POST =========-->
        
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

        </div> 
        <!---========= FIM CONTAINER TIMELINE =========-->
    </section>
    <!---========= FIM CONTAINER PERFIL =========-->
       

    <script src="../assets/js/createPost.js"></script>
</body>
</html>