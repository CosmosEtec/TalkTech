<?php

require_once('../model/Reacao.php');
require_once('../model/Postagem.php');
require_once('../model/Comentario.php');
require_once('../dao/DaoReacao.php');
require_once('../dao/DaoPostagem.php');
require_once('../dao/DaoComentario.php');

    session_start();

    $reacao = new Reacao();
    $reacao->setIdPerfil($_SESSION['login-id']);
    $reacao->setIdPostagem($_POST['idPost']);
    if(!DaoReacao::buscarReacoesPostUsuario($reacao)){
        if(DaoReacao::reagirPost($reacao)){
            $postagem = new Postagem();
            $postagem->setIdPostagem($_POST['idPost']);
            $postagem = DaoPostagem::buscarDados($postagem);
            $data = [
                'status' => true,
                'mensagem' => "Postagem curtida com sucesso!",
                'descricao' => "Postagem curtida com sucesso!",
                'curtidas' => DaoReacao::buscarReacoesPost($reacao)
            ];
            echo json_encode($data);
        } else {
            $data = [
                'status' => false,
                'mensagem' => "Erro ao curtir postagem!",
                'descricao' => "Erro na curtida da postagem!"
            ];
            echo json_encode($data);
        }
    }else{
        $data = [
            'status' => true,
            'mensagem' => "Erro ao curtir postagem!",
            'descricao' => "Você já curtiu essa postagem!"
        ];
        echo json_encode($data);
    }


?>