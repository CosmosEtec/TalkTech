<?php

require_once "../model/Seguidor.php";
require_once "../model/conexao.php";
require_once "../model/Perfil.php";

class DaoSeguidor{
    public static function follow(Seguidor $seguidor){
        $sql = "INSERT INTO tbSeguidor (idPerfilSeguidor, idPerfilSeguido) VALUES (?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $seguidor->getIdPerfilSeguidor());
        $stmt->bindValue(2, $seguidor->getIdPerfilSeguido());
        return $stmt->execute();
    }

    public static function unfollow(Seguidor $seguidor){
        $sql = "DELETE FROM tbSeguidor WHERE idPerfilSeguidor = ? AND idPerfilSeguido = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $seguidor->getIdPerfilSeguidor());
        $stmt->bindValue(2, $seguidor->getIdPerfilSeguido());
        return $stmt->execute();
    }

    public static function buscarSeguidores($perfil){
        $sql = "SELECT COUNT(*) AS qtdSeguidores FROM tbSeguidor WHERE idPerfilSeguido = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $perfil['idPerfil']);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['qtdSeguidores'];
    }

    public static function buscarSeguidos($perfil){
        $sql = "SELECT COUNT(idSeguidor) AS qtdSeguidos FROM tbSeguidor WHERE idPerfilSeguidor = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $perfil['idPerfil']);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return isset($resultado['qtdSeguidos']) ? $resultado['qtdSeguidos'] : 0;
    }

    public static function verificarSeguidor($id, $idsession){
        $sql = "SELECT * FROM tbSeguidor WHERE idPerfilSeguidor = ? AND idPerfilSeguido = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $idsession);
        $stmt->bindValue(2, $id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>
