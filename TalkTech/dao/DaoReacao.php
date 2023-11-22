<?php

require_once('../model/Reacao.php');
require_once('../model/conexao.php');

Class DaoReacao{
    public static function reagirPost(Reacao $reacao){
        $sql = "INSERT INTO tbreação (idPerfil, idPostagem) VALUES (?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $reacao->getIdPerfil());
        $stmt->bindValue(2, $reacao->getIdPostagem());
        return $stmt->execute();
    }

    public static function desreagirPost(Reacao $reacao){
        $sql = "DELETE FROM tbreação WHERE idPerfil = ? AND idPostagem = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $reacao->getIdPerfil());
        $stmt->bindValue(2, $reacao->getIdPostagem());
        return $stmt->execute();
    }

    public static function buscarReacoesPost(Reacao $reacao){
        $sql = "SELECT COUNT(*) AS qtdReacoes FROM tbreação WHERE idPostagem = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $reacao->getIdPostagem());
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['qtdReacoes'];
    }

    public static function buscarReacoesPostUsuario(Reacao $reacao){
        $sql = "SELECT * FROM tbReação WHERE idPostagem = ? AND idPerfil = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $reacao->getIdPostagem());
        $stmt->bindValue(2, $reacao->getIdPerfil());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (count($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>