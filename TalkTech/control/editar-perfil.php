<?php
require_once '../model/Perfil.php';
require_once '../dao/DaoPerfil.php';

session_start();


if($_SESSION['login-nome'] != $_POST['nomePerfil']){
    $data = [
        'status' => false,
        'mensagem' => "Erro ao editar perfil!",
        'descricao' => "Você não tem permissão para editar o perfil!"
    ];
    echo json_encode($data);
    exit();
}else{
    $idPerfil = $_SESSION['login-id'];
    $perfil = new Perfil();
    $perfil->setID($idPerfil);

    $apelido = isset($_POST['apelido']) ? $_POST['apelido'] : null;
    $biografia = isset($_POST['biografia']) ? $_POST['biografia'] : null;
    $privado = isset($_POST['privado']) ? $_POST['privado'] : null;
    $imagem = isset($_FILES['imagem']) ? $_FILES['imagem'] : null;

    $perfil->setNome($_SESSION['login-nome']);
    $perfil->setApelido($apelido);
    $perfil->setBiografia($biografia);
    $perfil->setPerfilPrivado($privado);
    $perfil->setFotoPerfil($imagem);

    $sucesso = true;

    if($apelido != null){
        if(DaoPerfil::editarApelido($perfil)){
        }else{
            $sucesso = false;
            $data = [
                'status' => false,
                'mensagem' => "Erro ao editar perfil!",
                'descricao' => "Erro ao alterar apelido"
            ];
            echo json_encode($data);
        }
    }
    if($biografia != null){
        if(DaoPerfil::editarBiografia($perfil)){
        }else{
            $sucesso = false;
            $data = [
                'status' => false,
                'mensagem' => "Erro ao editar perfil!",
                'descricao' => "Erro ao alterar biografia"
            ];
            echo json_encode($data);
        }
    }
    if($privado != false){
        $perfil->setPerfilPrivado(1);
        if(DaoPerfil::editarPrivacidade($perfil)){
        }else{
            $sucesso = false;
            $data = [
                'status' => false,
                'mensagem' => "Erro ao editar perfil!",
                'descricao' => "Erro ao alterar privacidade"
            ];
            echo json_encode($data);
        }
    }
    if($imagem != null){
        $arquivo = $perfil->getFotoPerfil();
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $novoNome = "fotoperfil.".$extensao;
        $caminho = "user/".$perfil->getNome()."/".$novoNome;

        if (file_exists("../".$caminho)) {
            unlink("../".$caminho);
        }
        
        $perfil->setFotoPerfil($caminho);
        if(DaoPerfil::editarFotoPerfil($perfil)){
            move_uploaded_file($arquivo['tmp_name'], "../".$caminho);
        }else{
            $sucesso = false;
            $data = [
                'status' => false,
                'mensagem' => "Erro ao editar perfil!",
                'descricao' => "Erro ao alterar foto de perfil"
            ];
            echo json_encode($data);
        }
        
    }
    if($sucesso = true){
    $data = [
        'status' => true,
        'mensagem' => "Perfil editado com sucesso!",
        'descricao' => "Perfil editado com sucesso!"
    ];
    echo json_encode($data);
    }else{
        $data = [
            'status' => false,
            'mensagem' => "Erro ao editar perfil!",
            'descricao' => "Erro ao editar perfil"
        ];
        echo json_encode($data);
    }
}


?>