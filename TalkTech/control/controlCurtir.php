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
    $reacao->setIdPostagem($_POST['idPostagem']);
    $curtir = $_POST['curtir'];

    if($curtir == 1){
        if(DaoReacao::buscarReacoesPostUsuario($reacao)){
            $data = [
                'status' => false,
                'message' => 'Você já curtiu essa postagem'
            ];
            echo json_encode($data);
        }else{
            DaoReacao::reagirPost($reacao);
            $data = [
                'status' => true,
                'message' => 'Postagem curtida com sucesso',
                'qtdReacoes' => DaoReacao::buscarReacoesPost($reacao)
            ];
            echo json_encode($data);
        }
    }
    else{
        if(DaoReacao::buscarReacoesPostUsuario($reacao)){
            DaoReacao::desreagirPost($reacao);
            $data = [
                'status' => true,
                'message' => 'Postagem descurtida com sucesso',
                'qtdReacoes' => DaoReacao::buscarReacoesPost($reacao)
            ];
            echo json_encode($data);
        }else{
            $data = [
                'status' => false,
                'message' => 'Você não curtiu essa postagem'
            ];
            echo json_encode($data);
        }
    }

?>