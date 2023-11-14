<?php
    require_once '../model/Conteudo.php';
    require_once '../dao/DaoConteudo.php';    
    require_once '../model/Postagem.php';
    require_once '../dao/DaoPostagem.php';
    $body = json_decode(file_get_contents('php://input'), true);
    $idPerfil = $_SESSION['idPerfil'];
    $perfil = $_SESSION['perfil'];
    $legenda = $body['legenda'];
    $conteudo = $body['conteudo'];
    //se tiver conteudo fazer o require do model conteudo e setar o conteudo, e enviar o arquivo para a pasta do usuario/posts
    //se não tiver conteudo, setar o conteudo como 0
    if(isset($body['conteudo']) && $body['conteudo'] != ""){
        $conteudo = new Conteudo();
        $conteudo->setArquivo($body['conteudo']);
        $conteudo->setSrc("../user/".$perfil['usuario']."/posts/".$body['conteudo']);

        if(DaoConteudo::cadastrar($conteudo)){
            $conteudo = 1;
        } else {
            $conteudo = 0;
            $data = [
                'status' => false,
                'mensagem' => "Erro ao cadastrar postagem!",
                'descricao' => "Algum erro ocorreu ao cadastrar o conteúdo!",
                'postagem' => ""
            ];
            echo json_encode($data);
        }
    } else {
        $conteudo = 0;
    }
    $postagem = new Postagem();
    $postagem->setIdPerfil($idPerfil);
    $postagem->setLegenda($legenda);
    $postagem->setConteudo($conteudo);
    if(DaoPostagem::postar($postagem)){
        $data = [
            'status' => true,
            'mensagem' => "Postagem cadastrada com sucesso!",
            'descricao' => "",
            'postagem' => ""
        ];
        echo json_encode($data);
    } else {
        $data = [
            'status' => false,
            'mensagem' => "Erro ao cadastrar postagem!",
            'descricao' => "",
            'postagem' => ""
        ];
        echo json_encode($data);
    }
    
?>