<?php 
require_once '../model/Comentario.php';
require_once '../model/conexao.php';

Class DaoComentario{
    public static function inserir(Comentario $comentario){
        $sql = "INSERT INTO tbComentario (idPostagem, idPerfil, Comentario, dataComentario) VALUES (?, ?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $comentario->getIdPostagem());
        $stmt->bindValue(2, $comentario->getIdPerfil());
        $stmt->bindValue(3, $comentario->getComentario());
        $stmt->bindValue(4, $comentario->getDataComentario());
        return $stmt->execute();
    }

    public static function QtdComentariosPost(Comentario $comentario){
        $sql = "SELECT COUNT(*) AS qtdComentario FROM tbComentario WHERE idPostagem = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $comentario->getIdPostagem());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado[0]['qtdComentario'];
    }

    public static function buscarComentariosPost(Comentario $comentario){
        $sql = "SELECT c.*, COUNT(r.idReação) as QtdReacao FROM tbComentario c 
        LEFT JOIN tbReação r ON c.idComentario = r.idComentario 
        WHERE c.idPostagem = ?
        GROUP BY c.idComentario";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $comentario->getIdPostagem());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
?>