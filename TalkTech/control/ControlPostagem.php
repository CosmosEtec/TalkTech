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
            $oReacao = new Reacao();
            $oReacao->setIdPostagem($postagem['idPostagem']);
            $oReacao->setIdPerfil($_SESSION['login-id']);

            $comentarios = new Comentario();
            $comentarios->setIdPostagem($postagem['idPostagem']);
            $comentarios = DaoComentario::QtdComentariosPost($comentarios);


        if($postagem['Conteudo'] == 1){
            $conteudo = new Conteudo();
            $conteudo->setIdPostagem($postagem['idPostagem']);
            $conteudo = DaoConteudo::buscarDados($conteudo);
        }
            echo '
            <div class="post-container   mb-2" id="'.$postagem["idPostagem"].'">
                <div class="profile-top-post  ">
                    <div class="profile-credentials  flex-start">
                        <div class="profile-pic  ">
                            <a href="profile.php?id='.$perfil['idPerfil'].'">
                                <img class="profile-pic-img" src="../'.$perfil['fotoPerfil'].'" alt="">
                            </a>
                        </div>
                            <div class="profile-username ml-1">
                            <a href="profile.php?id='.$perfil['idPerfil'].'">';
                            if($perfil["apelido"]){
                                echo '<h4>'. $perfil["apelido"] .'</h4>
                                <p class="p3">@'.$perfil["nome"].'</p>';	
                            }else{
                                echo '<h4>@'. $perfil["nome"] .'</h4>';	
                            }
                            echo '   </a>
                            </div>
                    </div>
                    <div class="post-config" >
                    <i class="fa-solid fa-ellipsis fa-2xl" style="color: #ffffff;"></i>
                        <div class="post-config-content">';
                        if($perfil["idPerfil"] == $_SESSION["login-id"]){
                            echo '<a value="'.$postagem['idPostagem'].'" onclick="excluirPost('.$postagem['idPostagem'].')" id="btnExcluir" class="post-config-item" style="color: #ffffff;">Excluir <i class="fa-solid fa-trash-can mr-1" style="color: #ffffff;"></i></a>';
                        } else {
                            echo '<a value="'.$postagem['idPostagem'].'" id="btnDenunciar" class="post-config-item alert" style="color: #ca0202;">Denunciar <i class="fa-solid fa-triangle-exclamation mr-1" style="color: #ca0202;"></i></a>';
                        }
                     echo '</div>
                    </div>
                </div>
                <div class="post-description mt-1">
                    <p class="p3 legenda-post">'. $postagem["legenda"] .'</p>
                </div>';
                if(isset($conteudo)){
                    echo '
                    <div class="content-post mt-1">
                            <img class="imagem-post" src="'.$conteudo['src'].'">
                    </div>';
                };
                echo '<div class="post-interactions  ">
                        <div class="like-heart-comment-container mt-1">
                            <button id="like-heart">';
                            if(DaoReacao::buscarReacoesPostUsuario($oReacao)){
                                echo '<i value='.$postagem['idPostagem'].' class="fa-solid fa-heart fa-2xl my-2" style="color: #bd02c0;" id="heart-liked"></i>';
                            }else{
                                echo '<i value='.$postagem['idPostagem'].' class="fa-regular fa-heart fa-2xl my-2" style="color: #d1d1d1;" id="heart-liked"></i>';
                            }
                             echo '<p class="ContReacao" id="'.$postagem["idPostagem"].'cr" >'.$reacoes.'</p>
                            </button>
                            <button class="mt-1-4px comment" id="comment">
                                <a class="mt-1-4px comment" id="comment" href="postagem.php?idPost='.$postagem["idPostagem"] .'" >
                                    <i class="fa-solid fa-message fa-flip-horizontal fa-xl ml-2 my-2" style="color: #d1d1d1;"></i>
                                    <p class="ContComentario" >'.$comentarios.'</p>
                                </a>
                            </button>
                            <button class="mt-1-4px share" id="share">
                                <i class="fa-regular fa-share-from-square fa-2xl ml-2 my-2" onclick="compLink('.$postagem['idPostagem'].')" style="color: #d1d1d1;"></i>
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
        $oReacao = new Reacao();
        $oReacao->setIdPostagem($Postagem['idPostagem']);
        $oReacao->setIdPerfil($_SESSION['login-id']);

        $comentarios = new Comentario();
        $comentarios->setIdPostagem($Postagem['idPostagem']);
        $comentarios = DaoComentario::QtdComentariosPost($comentarios);

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
                <div class="profile-credentials  flex-start">
                
                    <div class="profile-pic  ">
                    <a href="profile.php?id='.$perfil['idPerfil'].'">
                    <img class="profile-pic-img" src="../'.$perfil['fotoPerfil'].'" alt="">
                    </a>
                    </div>
                    
                    <div class="profile-username ml-1">
                            <a href="profile.php?id='.$perfil['idPerfil'].'">';
                            if($perfil["apelido"]){
                                echo '<h4>'. $perfil["apelido"] .'</h4>
                                <p class="p3">@'.$perfil["nome"].'</p>';	
                            }else{
                                echo '<h4>@'. $perfil["nome"] .'</h4>';	
                            }
                    echo '</a>
                    </div>
                </div>
                <div class="post-config" >
                    <i class="fa-solid fa-ellipsis fa-2xl" style="color: #ffffff;"></i>
                        <div class="post-config-content">';
                        if($perfil["idPerfil"] == $_SESSION["login-id"]){
                            echo '<a value="'.$Postagem['idPostagem'].'" onclick="excluirPost('.$Postagem['idPostagem'].')" id="btnExcluir" class="post-config-item" style="color: #ffffff;">Excluir <i class="fa-solid fa-trash-can mr-1" style="color: #ffffff;"></i></a>';
                        } else {
                            echo '<a value="'.$Postagem['idPostagem'].'" id="btnDenunciar" class="post-config-item alert" style="color: #ca0202;">Denunciar <i class="fa-solid fa-triangle-exclamation mr-1" style="color: #ca0202;"></i></a>';
                        }
                     echo '</div>
                </div>
            </div>
            <div class="post-description mt-1">
                <p class="p3 legenda-post">'. $Postagem['legenda'] .'</p>
            </div>';
            if($conteudo){
                echo '
                <div class="content-post mt-1">
                    <img class="imagem-post" src="'.$conteudo['src'].'">
                </div>';
            };
            echo '<div class="post-interactions mt-2">
                    <div class="like-heart-comment-container">
                        <button id="like-heart">';
                        if(DaoReacao::buscarReacoesPostUsuario($oReacao)){
                            echo '<i value='.$Postagem['idPostagem'].' class="fa-solid fa-heart fa-2xl my-2" style="color: #bd02c0;" id="heart-liked"></i>';
                        }else{
                            echo '<i value='.$Postagem['idPostagem'].' class="fa-regular fa-heart fa-2xl my-2" style="color: #d1d1d1;" id="heart-liked"></i>';
                        }
                         echo '<p class="ContReacao" id="'.$Postagem["idPostagem"].'cr" >'.$reacoes.'</p>
                        </button>

                        <button class="mt-1-4px comment" id="comment">
                        <a class="mt-1-4px comment" id="comment" href="postagem.php?idPost='.$Postagem["idPostagem"] .'" >
                        <i class="fa-solid fa-message fa-flip-horizontal fa-xl ml-2 my-2" style="color: #d1d1d1;"></i>
                        <p class="ContComentario" >'.$comentarios.'</p>
                        </a>
                        </button>

                        <button class="mt-1-4px share" id="share">
                            <i class="fa-regular fa-share-from-square fa-2xl ml-2 my-2" onclick="compLink('.$Postagem['idPostagem'].')" style="color: #d1d1d1;"></i>
                        </button>
                    </div>
                  </div>
                </div>';
        $conteudo = 0;
    }
}
?>