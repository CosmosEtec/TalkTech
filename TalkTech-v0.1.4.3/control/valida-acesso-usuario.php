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

    $_SESSION['login-idCliente'] = $cliente->getId();
    $_SESSION['login-nomeCliente'] = $cliente->getNome();
    $_SESSION['login-emailCliente'] = $cliente->getEmail();
    $_SESSION['login-senhaCliente'] = $cliente->getSenha();

} else {
    $_SESSION['mensagem'] = "Voce não pode acessar sem estar logado no sistema!";
    header('Location: ../index.php');
}

?>