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
    if(!DaoPerfil::consultarNome($Perfil)){
        if(!DaoPerfil::consultarEmail($Perfil)){
            if(DaoPerfil::cadastra($Perfil)){
                $pasta_usuario = "../user/" . $Perfil->getNome();
                if (!file_exists($pasta_usuario)) {
                    mkdir($pasta_usuario, 0777, true);
                    mkdir($pasta_usuario . "/posts", 0777, true);
                }
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
        } else {
            $data = [
                'status' => false,
                'id'=> "47",
                'mensagem' => "Email já cadastrado!",
                'descricao' => "",
                'usuario' => ""
            ];
            echo json_encode($data);
            // $_SESSION['mensagem'] = "Nome já cadastrado!";
            // header('Location: ../view/form.php');
        }
    }else{
        $data = [
            'status' => false,
            'id'=> "46",
            'mensagem' => "Nome já cadastrado!",
            'descricao' => "",
            'usuario' => ""
        ];
        echo json_encode($data);
    }


    
?>
