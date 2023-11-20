<?php
require_once '../model/Conteudo.php';
require_once '../model/conexao.php';

Class DaoConteudo{
    public static function cadastrar(Conteudo $conteudo){
        $sql = "INSERT INTO tbconteudo (idPostagem, idPerfil, arquivo, src) VALUES (?, ?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $conteudo->getIdPostagem());
        $stmt->bindValue(2, $conteudo->getIdPerfil());
        $stmt->bindValue(3, $conteudo->getArquivo());
        $stmt->bindValue(4, $conteudo->getSrc());
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public static function buscarDados(Conteudo $conteudo){
        $sql = "SELECT * FROM tbconteudo WHERE idPostagem = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $conteudo->getIdPostagem());
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }
}
?>