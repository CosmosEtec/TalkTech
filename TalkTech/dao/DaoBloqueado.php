<?php
Class DaoBloqueado{
    public static function inserir(Bloqueado $bloqueado){
        $sql = "INSERT INTO tbBloqueado (idPerfilBloqueador, idPerfilBloqueado) VALUES (?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $bloqueado->getIdPerfilBloqueador());
        $stmt->bindValue(2, $bloqueado->getIdPerfilBloqueado());
        return $stmt->execute();
    }

    public static function excluir(Bloqueado $bloqueado){
        $sql = "DELETE FROM tbBloqueado WHERE idPerfilBloqueador = ? AND idPerfilBloqueado = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $bloqueado->getIdPerfilBloqueador());
        $stmt->bindValue(2, $bloqueado->getIdPerfilBloqueado());
        return $stmt->execute();
    }

    public static function buscarBloqueados(Perfil $perfil){
        $sql = "SELECT * FROM tbBloqueado WHERE idPerfilBloqueador = ?";
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