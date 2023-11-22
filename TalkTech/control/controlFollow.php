<?php 
    require_once "../dao/DaoSeguidor.php";
    require_once "../model/Seguidor.php";

    session_start();

    $id = $_POST['id'];
    $idsession = $_SESSION['login-id'];

    $seguidor = new Seguidor();
    $seguidor->setIdPerfilSeguidor($idsession);
    $seguidor->setIdPerfilSeguido($id);

    if(DaoSeguidor::verificarSeguidor($id, $idsession)){
        $data = [
            'status' => false,
            'mensagem' => "Erro ao seguir!",
            'descricao' => "você já segue esta conta!"
        ];
        echo json_encode($data);
    }else{
        if(DaoSeguidor::follow($seguidor)){
            $data = [
                'status' => true,
                'mensagem' => "Seguindo!",
                'descricao' => "Você está seguindo esta conta!"
            ];
            echo json_encode($data);
    }
}
?>