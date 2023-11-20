<?php
    require_once '../model/Conteudo.php';
    require_once '../dao/DaoConteudo.php';    
    require_once '../model/Postagem.php';
    require_once '../dao/DaoPostagem.php';

    session_start();

$idPerfil = $_SESSION['login-id'];
$perfil = $_SESSION['login-nome'];

$postagem = new Postagem();
$legenda = isset($_POST['legenda']) ? $_POST['legenda'] : null;
$arquivo = isset($_FILES['conteudo']) ? $_FILES['conteudo'] : null;
    if(isset($arquivo)){
        $postagem->setConteudo(true);
        $conteudo = new Conteudo();
        $conteudo->setArquivo($arquivo);
    } else {
        $postagem->setConteudo(false);
    }
$postagem->setIdPerfil($idPerfil);
$postagem->setLegenda($legenda);
$postagem->setDataPost(date("y-m-d H:i:s"));


if(DaoPostagem::postar($postagem)){
    if($postagem->getConteudo()){
        $conteudo->setIdPostagem(DaoPostagem::buscarUltimaPostagem($idPerfil));
        $conteudo->setIdPerfil($idPerfil);
        $arquivo = $conteudo->getArquivo();
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $novoNome = $conteudo->getIdPostagem().".".$extensao;
        $conteudo->setSrc("../user/".$perfil."/posts/".$novoNome);
        $conteudo->setArquivo($extensao);
        if(!file_exists("../user/".$perfil."/posts")){
            mkdir("../user/".$perfil."/posts", 0777, true);
        }
        move_uploaded_file($arquivo['tmp_name'], "../user/".$perfil."/posts/".$novoNome);
        DaoConteudo::cadastrar($conteudo);
        }
    $data = [
        'status' => true,
        'mensagem' => "Postagem cadastrada com sucesso!",
        'descricao' => "Postagem cadastrada com sucesso!"
    ];
    echo json_encode($data);
} else {
    $data = [
        'status' => false,
        'mensagem' => "Erro ao cadastrar postagem!",
        'descricao' => "Erro na criacao da postagem!"
    ];
    echo json_encode($data);
}
?>