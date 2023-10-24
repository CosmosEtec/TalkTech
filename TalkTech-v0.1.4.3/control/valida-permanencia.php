<?php
session_start();

require_once '../model/Perfil.php';
require_once '../dao/DaoPerfil.php';

$perfil = new Perfil();
$perfil->setEmail($_SESSION['login-email']);
$perfil->setSenha($_SESSION['login-senha']);

$resposta = DaoPerfil::login($perfil);

if($resposta == false){
    header('Location: ./form.php');
}
?>