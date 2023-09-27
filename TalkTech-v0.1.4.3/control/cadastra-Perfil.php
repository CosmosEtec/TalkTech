<?php
    
    require_once '../model/Perfil.php';
    require_once '../dao/DaoPerfil.php';

    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $senha = sha1($_POST['Senha']);
    $confirmar_senha = sha1($_POST['ConfirmaSenha']);

    $Perfil = new Perfil();
    $Perfil->setNome($_POST['Nome']);
    $Perfil->setEmail($_POST['Email']);
    
    if($_POST['Senha'] == $_POST['ConfirmaSenha']){
        $Perfil->setSenha($senha);
    } else {
        $_SESSION['mensagem'] = "As senhas não coincidem!";
    }

    if(DaoPerfil::cadastra($Perfil)){
        $_SESSION['mensagem'] = "Perfil cadastrado com sucesso!";
        header('Location: ../view/form.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar perfil!";
        header('Location: ../view/form.php');
    }
?>
