<?php
    
    require_once '../model/Perfil.php';
    require_once '../dao/DaoPerfil.php';
    $body = json_decode(file_get_contents('php://input'), true);
    $nome = $body['nome'];
    $email = $body['email'];
    $senha = sha1($body['senha']);
    $confirmar_senha = sha1($body['csenha']);

    $Perfil = new Perfil();
    $Perfil->setNome($body['nome']);
    $Perfil->setEmail($body['email']);
    $Perfil->setSenha($senha);
    if(!DaoPerfil::consultarEmail($Perfil)){
        if(DaoPerfil::cadastra($Perfil)){
            $data = [
                'status' => true,
                'mensagem' => "Perfil cadastrado com sucesso!",
                'descricao' => "",
                'usuario' => ""
            ];
            echo json_encode($data);
            // $_SESSION['mensagem'] = "Perfil cadastrado com sucesso!";
            // header('Location: ../view/form.php');
        } else {
            $data = [
                'status' => false,
                'mensagem' => "erro ao cadastrar!",
                'descricao' => "",
                'usuario' => ""
            ];
            echo json_encode($data);
            // $_SESSION['mensagem'] = "Erro ao cadastrar perfil!";
            // header('Location: ../view/form.php');
        }
    }else{
        $data = [
            'status' => false,
            'id'=> "47",
            'mensagem' => "Usuario já cadastrado!",
            'descricao' => "",
            'usuario' => ""
        ];
        echo json_encode($data);
    }


    
?>
