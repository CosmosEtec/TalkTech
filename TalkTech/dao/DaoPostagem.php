<?php

require_once '../model/Postagem.php';
require_once '../model/Reacao.php';
require_once '../model/conexao.php';

Class DaoPostagem{
    public static function postar(Postagem $postagem){
        $sql = "INSERT INTO tbPostagem (idPerfil, legenda, conteudo, dataPost) VALUES (?, ?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $postagem->getIdPerfil());
        $stmt->bindValue(2, $postagem->getLegenda());
        $stmt->bindValue(3, $postagem->getConteudo());
        $stmt->bindValue(4, $postagem->getDataPost());
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public static function buscarUltimaPostagem($idPerfil){
        $sql = "SELECT idPostagem FROM tbPostagem WHERE idPerfil = ? ORDER BY idPostagem DESC LIMIT 1";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $idPerfil);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['idPostagem'];
    }

    public static function buscarDados(Postagem $postagem){
        $sql= "SELECT p.*, COUNT(r.idReação) AS qtdReação FROM tbPostagem p 
        LEFT JOIN tbreação r ON p.idPostagem = r.idPostagem 
        GROUP BY p.idPostagem 
        ORDER BY p.dataPost DESC";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

    public static function buscarDadosId(Postagem $postagem){
        $sql= "SELECT p.*, COUNT(r.idReação) AS qtdReação FROM tbPostagem p 
        LEFT JOIN tbreação r ON p.idPostagem = r.idPostagem 
        WHERE p.idPostagem = ?
        GROUP BY p.idPostagem 
        ORDER BY p.dataPost DESC";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $postagem->getIdPostagem());
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

    public static function buscarQtddPostagem($perfil){
        $sql = "SELECT COUNT(*) AS qtdPostagem FROM tbPostagem WHERE idPerfil = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $perfil['idPerfil']);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['qtdPostagem'];
    }

    public static function buscarPostagensPerfil($perfil){
        $sql = "SELECT p.*, COUNT(r.idReação) AS qtdReação FROM tbPostagem p 
        LEFT JOIN tbreação r ON p.idPostagem = r.idPostagem 
        WHERE p.idPerfil = ? 
        GROUP BY p.idPostagem 
        ORDER BY p.dataPost DESC";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $perfil['idPerfil']);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

}

?>