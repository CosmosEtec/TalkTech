<?php

require_once '../model/Perfil.php';
require_once '../dao/DaoPerfil.php';

session_start();

$escrito = $_POST['escrito'];

$perfil = new Perfil();
$perfil->setNome($escrito);
if(DaoPerfil::procurarPerfil($perfil)){
    $perfil = DaoPerfil::procurarPerfil($perfil);
    //crie um array para receber os dados do perfil
    $data = array();
    //adicione os dados do perfil no array
    foreach($perfil as $key => $value){
        $data[$key] = $value;
    }
    echo json_encode($data);
}
?>