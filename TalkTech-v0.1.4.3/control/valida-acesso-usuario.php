<?php
session_start();

require_once '../model/Perfil.php';
require_once '../dao/DaoPerfil.php';

$Perfil = new Perfil();
$email = $_POST['Email'];
$senha = $_POST['Senha'];

$Perfil->setEmail($email);
$Perfil->setSenha(sha1($senha));

$resposta = DaoPerfil::login($Perfil);

if($resposta == true){

    header('Location: ../view/feed.php');

    $Perfil->setId(DaoPerfil::consultarId($Perfil));
    $dados = DaoPerfil::buscarDados($Perfil);
    $Perfil->setNome($dados['nome']);

    $_SESSION['login-id'] = $Perfil->getId();
    $_SESSION['login-nome'] = $Perfil->getNome();
    $_SESSION['login-email'] = $Perfil->getEmail();
    $_SESSION['login-senha'] = $Perfil->getSenha();

} else {
    $_SESSION['mensagem'] = "Voce não pode acessar sem estar logado no sistema!";
    header('Location: ../form.php');
}

?>