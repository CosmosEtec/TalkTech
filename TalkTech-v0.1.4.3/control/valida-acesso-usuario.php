<?php
session_start();

require_once '../model/Perfil.php';
require_once '../dao/DaoPerfil.php';

if(!$_POST){


$body = json_decode(file_get_contents('php://input'), true);
var_dump($body);exit;
$Perfil = new Perfil();
$email = $body['Email'];
$senha = $body['Senha'];

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
 
    echo "Voce não pode acessar sem estar logado no sistema!";
    exit;
    //header('Location: ../index.php');
}


}
?>