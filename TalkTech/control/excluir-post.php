<?php
    require_once '../model/Postagem.php';
    require_once '../model/Reacao.php';
    require_once '../model/Comentario.php';
    require_once '../model/Conteudo.php';
    require_once '../dao/DaoConteudo.php';
    require_once '../dao/DaoComentario.php';
    require_once '../dao/DaoReacao.php';
    require_once '../dao/DaoPostagem.php';

    session_start();

    $idPostagem = $_GET['id'];

    $postagem = new Postagem();
    $postagem->setIdPostagem($idPostagem);
    $dadosPostagem = DaoPostagem::buscarDadosId($postagem);
    
    if($dadosPostagem['idPerfil'] == $_SESSION['login-id']){
        $erro = false;
        $postagem = new Postagem();
        $postagem->setIdPostagem($idPostagem);
        $postagem->setConteudo($dadosPostagem['Conteudo']);
        if($postagem->getConteudo() != null){
            $conteudo = new Conteudo();
            $conteudo->setIdPostagem($idPostagem);
            $dadosConteudo = DaoConteudo::buscarDados($conteudo);
            if(DaoConteudo::excluirConteudo($conteudo)){
                unlink($dadosConteudo['src']);
            } else {
                $erro = true;
            }   
        } 

        $reacao = new Reacao();
        $reacao->setIdPostagem($idPostagem);
        if(DaoReacao::buscarReacoesPost($reacao)){
            if(DaoReacao::excluirReacaoPost($reacao)){
            } else {
                $erro = true;
            }
        }

        $comentario = new Comentario();
        $comentario->setIdPostagem($idPostagem);
        if(DaoComentario::buscarComentariosPost($comentario)){
            if(DaoComentario::excluirComentariosPost($comentario)){
            } else {
                $erro = true;
            }
        }


        if(DaoPostagem::excluirPost($postagem)){
        } else {
        $erro = true;
        }

        if($erro == false){
            $data = [
                'status' => true,
                'mensagem' => "Postagem excluída com sucesso!",
                'descricao' => "A postagem foi excluída com sucesso!"
            ];
            echo json_encode($data);
        }else {
            $data = [
                'status' => false,
                'mensagem' => "Erro ao excluir Postagem!",
                'descricao' => "Não foi possível excluir a postagem!"
            ];
            echo json_encode($data);
        }
    }else {
            $data = [
                'status' => false,
            'mensagem' => "Erro ao excluir Postagem!",
            'descricao' => "Você não tem permissão para excluir esta postagem!"
            ];
        echo json_encode($data);
    }

?>