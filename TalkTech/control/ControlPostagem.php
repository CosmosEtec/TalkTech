<?php 
    require_once('../model/Postagem.php');
    require_once('../model/Perfil.php');
    require_once('../model/Comentario.php');
    require_once('../model/Seguidor.php');
    require_once('../dao/DaoPostagem.php');
    require_once('../dao/DaoPerfil.php');
    require_once('../dao/DaoComentario.php');
    require_once('../dao/DaoSeguidor.php');

function mostrarPostsFeed(){
    $postagens = new Postagem();
    $postagens = DaoPostagem::buscarDados($postagens);

    if(isset($postagens)){
        foreach($postagens as $postagem){
            $perfil = new Perfil();
            $perfil->setId($postagem['idPerfil']);
            $perfil = DaoPerfil::buscarDados($perfil);

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
                        <i class="fa-solid fa-heart fa-2xl heart-liked" style="color: #bd02c0;" id="heart"></i>
                        </button>

                        <button class="mt-1-4px comment" id="comment">
                        <i class="fa-solid fa-message fa-flip-horizontal fa-2xl ml-2" style="color: #d1d1d1;"></i>
                        </button>
                    </div>
            </div>';
        }
    }
}
?>