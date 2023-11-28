<?php 
    require_once('../model/Perfil.php');
    require_once('../model/Comentario.php');
    require_once('../dao/DaoPerfil.php');
    require_once('../dao/DaoComentario.php');

    session_start();

    $comentario = new Comentario();
    $comentario->setIdPerfil($_SESSION['login-id']);
    $comentario->setIdPostagem($_POST['Post']);
    $comentario->setComentario($_POST['Comentario']);
    $comentario->setDataComentario(date('Y-m-d H:i:s'));

    if($comentario->getComentario() == ""){
        $data = [
            'status' => false,
            'mensagem' => "Erro ao cadastrar comentario!",
            'descricao' => "Comentario vazio!"
        ];
        echo json_encode($data);
        exit;
    }
    if(DaoComentario::inserir($comentario)){
        $perfil = new Perfil();
        $perfil->setId($_SESSION['login-id']);
        $perfil = DaoPerfil::buscarDados($perfil);

        $data = [
            'status' => true,
            'mensagem' => "Comentario cadastrado com sucesso!",
            'descricao' => "Comentario cadastrado com sucesso!",
        ];
        echo json_encode($data);
    }
    else{
        $data = [
            'status' => false,
            'mensagem' => "Erro ao cadastrar comentario!",
            'descricao' => "Erro na criacao do comentario!"
        ];
        echo json_encode($data);
    }
?>