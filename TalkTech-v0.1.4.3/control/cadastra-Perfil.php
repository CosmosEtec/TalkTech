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
                    $pasta_template = "../user/Template";
                    $pasta_nova = $pasta_usuario;
                    if (file_exists($pasta_template)) {
                        // Copia a pasta "Template" para a nova pasta do usuário
                        recursive_copy($pasta_template, $pasta_nova);
                    }
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


    function recursive_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (($file = readdir($dir)) !== false) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    recursive_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
    
?>
