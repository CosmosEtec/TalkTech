<?php
    require_once '../model/Comentario.php';
    require_once '../dao/DaoComentario.php';
    require_once '../model/Perfil.php';
    require_once '../dao/DaoPerfil.php';
    require_once '../model/Postagem.php';
    require_once '../dao/DaoPostagem.php';

    $idPerfil = $_SESSION['login-id'];
    $perfil = $_SESSION['login-nome'];

    $comentario = new Comentario();
    $comentario->setIdPerfil($idPerfil);

    function MostrarComentariosPost($post){
        $comentario = new Comentario();
        $comentario->setIdPostagem($post);
        $comentarios = DaoComentario::buscarComentariosPost($comentario);

       
        
        foreach($comentarios as $comentario){
            $perfil = new Perfil();
            $perfil->setId($comentario['idPerfil']);
            $perfil = DaoPerfil::buscarDados($perfil);

            echo 
            '<div class="post-comment-cell mb-2 mt-1">
                <div class="align-config-comment">
                    <div class="post-config" >
                        <i class="fa-solid fa-ellipsis fa-lg" style="color: #ffffff;"></i>
                            <div class="post-config-content" style="max-height: 42px;">   
                                <a href="ai" class="post-config-item" style="color: #ffffff;">Excluir <i class="fa-solid fa-trash-can fa-sm mr-1" style="color: #ffffff;"></i></a>;                            
                            </div>
                    </div>
                </div>
                <div class="profile-pic  ">
                    <a href="profile.php?id='.$perfil['idPerfil'].'">
                        <img class="profile-pic-img" src="../'.$perfil['fotoPerfil'].'" alt="">
                    </a>
                </div>
            <div class="flex-column ml-1-4px">
            <a href="../view/profile.php?id='.$perfil["idPerfil"].'">';
            if($perfil["apelido"]){
            echo '
                <h6>'. $perfil["apelido"] .' @'.$perfil["nome"].'</h6>
                ';	
            }else{
                echo '<h6>@'. $perfil["nome"] .'</h6>';	
            }
            echo '</a>
            <p class="p3 comentario-p3 mb-1">'.$comentario['comentario'].'</p>
            </div>
            </div>
            ';
        }
    }
?>