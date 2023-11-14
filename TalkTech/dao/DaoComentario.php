<?php 

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

    public static function buscarDados(Comentario $comentario){
        $sql= "SELECT c.*, p.nome, COUNT(r.idReação) AS qtdReacoes FROM tbComentario c 
        INNER JOIN tbPerfil p ON c.idPerfil = p.idPerfil 
        LEFT JOIN tbreação r ON c.idComentario = r.idComentario 
        WHERE c.idPostagem = ? 
        GROUP BY c.idComentario 
        ORDER BY c.dataComentario DESC";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $comentario->getIdPostagem());
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }
}
?>