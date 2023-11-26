<?php 
    require_once('../model/Postagem.php');
    require_once('../model/Perfil.php');
    require_once('../model/Comentario.php');
    require_once('../model/Seguidor.php');
    require_once('../model/Reacao.php');
    require_once('../model/Conteudo.php');
    require_once('../dao/DaoPostagem.php');
    require_once('../dao/DaoPerfil.php');
    require_once('../dao/DaoComentario.php');
    require_once('../dao/DaoSeguidor.php');
    require_once('../dao/DaoConteudo.php');
    require_once('../dao/DaoReacao.php');

function mostrarPostsFeed(){
    $postagens = new Postagem();
    $postagens = DaoPostagem::buscarDados($postagens);

    if(isset($postagens)){
        foreach($postagens as $postagem){
            $perfil = new Perfil();
            $perfil->setId($postagem['idPerfil']);
            $perfil = DaoPerfil::buscarDados($perfil);

            $reacoes = new Reacao();
            $reacoes->setIdPostagem($postagem['idPostagem']);
            $reacoes = DaoReacao::buscarReacoesPost($reacoes);

            $comentarios = new Comentario();
            $comentarios->setIdPostagem($postagem['idPostagem']);
            $comentarios = DaoComentario::buscarComentariosPost($comentarios);


        if($postagem['Conteudo'] == 1){
            $conteudo = new Conteudo();
            $conteudo->setIdPostagem($postagem['idPostagem']);
            $conteudo = DaoConteudo::buscarDados($conteudo);
        }
            echo '
            <div class="post-container   mb-2" id="'.$postagem["idPostagem"].'">
                <div class="profile-top-post  ">
                    <div class="profile-pic  ">
                    <a href="profile.php?id='.$perfil['idPerfil'].'">
                        <img class="profile-pic-img" src="../'.$perfil['fotoPerfil'].'" alt="">
                    </a>
                    </div>
                    <div class="profile-username flex-column ml-1">
                    <a href="profile.php?id='.$perfil['idPerfil'].'">
                        <h4>'. ($perfil["apelido"] ? $perfil["apelido"] : $perfil["nome"]) .'</h4>
                        <p class="p3">@'.$perfil["nome"].'</p>
                    </a>
                    </div>
                </div>
                <div class="post-description mt-1">
                    <p class="p3">'. $postagem["legenda"] .'</p>
                </div>';
                if(isset($conteudo)){
                    echo '
                    <div class="content-post mt-1">
                        <img src="'.$conteudo['src'].'">
                    </div>';
                };
                echo '<div class="post-interactions  ">
                        <div class="like-heart-comment-container mt-1">
                            <button id="like-heart">
                                <i class="fa-solid fa-heart fa-2xl heart-liked my-2" style="color: #bd02c0;" id="heart-liked"></i>
                                <i class="fa-regular fa-heart fa-2xl heart-unliked my-2" style="color: #d1d1d1;" id="heart-unliked"></i>
                                    <p class="ContReacao" id="'.$postagem["idPostagem"].'" >'.$reacoes.'</p>
                            </button>
                            <a class="mt-1-4px comment" id="comment" href="postagem.php" >
                                <i class="fa-solid fa-message fa-flip-horizontal fa-2xl ml-2 my-2" style="color: #d1d1d1;"></i>
                                <p class="ContComentario" >'.$comentarios.'</p>
                            </a>
                            <button class="mt-1-4px share" id="share">
                                <i class="fa-regular fa-share-from-square fa-2xl ml-2 my-2" style="color: #d1d1d1;"></i>
                                <p class="ContCompartilhar" >'.$comentarios.'</p>
                            </button>
                        </div>
                </div>
                
            </div>    
            ';
        $conteudo = null;
        }
    }
}

function mostrarPostsUsuario($perfil){
    $Posts = DaoPostagem::buscarPostagensPerfil($perfil);
    foreach($Posts as $Postagem){
        
        $reacoes = new Reacao();
        $reacoes->setIdPostagem($Postagem['idPostagem']);
        $reacoes = DaoReacao::buscarReacoesPost($reacoes);

        $comentarios = new Comentario();
        $comentarios->setIdPostagem($Postagem['idPostagem']);
        $comentarios = DaoComentario::buscarComentariosPost($comentarios);

        if($Postagem['Conteudo'] == 1){
            $conteudo = new Conteudo();
            $conteudo->setIdPostagem($Postagem['idPostagem']);
            $conteudo = DaoConteudo::buscarDados($conteudo);
        }else{
            $conteudo = null;
        }	
        echo '
        <div class="post-container   mb-2" id="'.$Postagem['idPostagem'].'">
            <div class="profile-top-post  ">
                <div class="profile-pic  ">
                    <img class="profile-pic-img" src="../'.$perfil['fotoPerfil'].'" alt="">
                </div>
                <div class="profile-username flex-column ml-1">
                    <h4>'. ($perfil["apelido"] ? $perfil["apelido"] : $perfil["nome"]) .'</h4>
                    <p class="p3">@'.$perfil["nome"].'</p>
                </div>
            </div>
            <div class="post-description">
                <p class="p3">'. $Postagem['legenda'] .'</p>
            </div>';
            if($conteudo){
                echo '
                <div class="content-post">
                    <img src="'.$conteudo['src'].'">
                </div>';
            };
            echo '<div class="post-interactions  ">
                    <div class="like-heart-comment-container">
                        <button id="like-heart">
                            <i class="fa-solid fa-heart fa-2xl heart-liked my-2" style="color: #bd02c0;" id="heart-liked"></i>
                            <i class="fa-regular fa-heart fa-2xl heart-unliked my-2" style="color: #d1d1d1;" id="heart-unliked"></i>
                            <p class="ContReacao" id="'.$Postagem["idPostagem"].'" >'.$reacoes.'</p>
                        </button>

                        <button class="mt-1-4px comment" id="comment">
                            <i class="fa-solid fa-message fa-flip-horizontal fa-2xl ml-2 my-2" style="color: #d1d1d1;"></i>
                            <p class="ContComentario" >'.$comentarios.'</p>
                        </button>

                        <button class="mt-1-4px share" id="share">
                            <i class="fa-regular fa-share-from-square fa-2xl ml-2 my-2" style="color: #d1d1d1;"></i>
                            <p class="ContCompartilhar" >'.$comentarios.'</p>
                        </button>
                    </div>
                  </div>
                </div>';
        $conteudo = 0;
    }
}
?>