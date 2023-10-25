<?php

require_once "../model/Seguidor.php";
require_once "../model/conexao.php";
require_once "../model/Perfil.php";

class DaoSeguidor{
    public static function inserir(Seguidor $seguidor){
        $sql = "INSERT INTO tbSeguidor (idPerfilSeguidor, idPerfilSeguido) VALUES (?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $seguidor->getIdPerfilSeguidor());
        $stmt->bindValue(2, $seguidor->getIdPerfilSeguido());
        return $stmt->execute();
    }

    public static function excluir(Seguidor $seguidor){
        $sql = "DELETE FROM tbSeguidor WHERE idPerfilSeguidor = ? AND idPerfilSeguido = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $seguidor->getIdPerfilSeguidor());
        $stmt->bindValue(2, $seguidor->getIdPerfilSeguido());
        return $stmt->execute();
    }

    public static function buscarSeguidores(Perfil $perfil){
        $sql = "SELECT * FROM tbSeguidor WHERE idPerfilSeguido = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $perfil->getId());
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public static function buscarSeguidos(Perfil $perfil){
        $sql = "SELECT * FROM tbSeguidor WHERE idPerfilSeguidor = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $perfil->getId());
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
?>
