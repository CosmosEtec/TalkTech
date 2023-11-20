<?php
    require_once '../model/Conteudo.php';
    require_once '../dao/DaoConteudo.php';    
    require_once '../model/Postagem.php';
    require_once '../dao/DaoPostagem.php';

    session_start();

$idPerfil = $_SESSION['login-id'];
$perfil = $_SESSION['login-nome'];
$legenda = isset($_POST['legenda']) ? $_POST['legenda'] : null;
$arquivo = isset($_FILES['conteudo']) ? $_FILES['conteudo'] : null;
$postagem = new Postagem();
$postagem->setIdPerfil($idPerfil);
$postagem->setLegenda($legenda);
$postagem->setConteudo(0);
$postagem->setDataPost(date("y-m-d H:i:s"));
if($post = DaoPostagem::postar($postagem)){
    if(isset($arquivo)){
        $conteudo = new Conteudo();
        $conteudo->setArquivo($arquivo['Content-Type']);
        $conteudo->setSrc("../user/".$perfil."/posts/".$arquivo['filename']);
    
        if(DaoConteudo::cadastrar($conteudo)){
            $conteudo = 1;
            $destino = "../user/".$perfil."/posts/";
            if (!file_exists($destino)) {
                mkdir($destino, 0777, true);
            }
            $destino .= $arquivo['name'];
            // Aqui estamos escrevendo o conteúdo binário para o arquivo
            if(file_put_contents($destino, file_get_contents($arquivo['tmp_name']))){
                DaoPostagem::alterConteudo($post);
            } else {
                // Ocorreu um erro ao mover o arquivo
                $conteudo = 0;
                $data = [
                    'status' => false,
                    'mensagem' => "Erro ao cadastrar conteudo!",
                    'descricao' => "Algum erro ocorreu ao mover o arquivo!"
                ];
                echo json_encode($data);
            }
        } else {
            $conteudo = 0;
                $data = [
                    'status' => false,
                    'mensagem' => "Erro ao cadastrar conteudo!",
                    'descricao' => "Algum erro ocorreu ao cadastrar o conteúdo!"
                ];
                echo json_encode($data);
        }
    }
} else {
    $data = [
        'status' => false,
        'mensagem' => "Erro ao cadastrar postagem!",
        'descricao' => "Erro na criacao da postagem!"
    ];
    echo json_encode($data);
}
if($conteudo){
    $data = [
        'status' => true,
        'mensagem' => "Postagem cadastrada com sucesso!",
        'descricao' => "Postagem cadastrada com sucesso!"
    ];
    echo json_encode($data);
}
?>