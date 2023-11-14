<?php

require_once('../model/Reacao.php');
require_once('../model/conexao.php');

Class DaoReacao{
    public static function reagirPost(Reacao $reacao){
        $sql = "INSERT INTO tbreacao (idPerfil, idPostagem) VALUES (?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $reacao->getIdPerfil());
        $stmt->bindValue(2, $reacao->getIdPostagem());
        return $stmt->execute();
    }

    public static function desreagirPost(Reacao $reacao){
        $sql = "DELETE FROM tbreacao WHERE idPerfil = ? AND idPostagem = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $reacao->getIdPerfil());
        $stmt->bindValue(2, $reacao->getIdPostagem());
        return $stmt->execute();
    }

    public static function buscarReacoesPost(Reacao $reacao){
        $sql = "SELECT COUNT(*) AS qtdReacoes FROM tbreacao WHERE idPostagem = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $reacao->getIdPostagem());
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['qtdReacoes'];
    }
}
?>