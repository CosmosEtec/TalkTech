<?php
require_once '../model/Conteudo.php';
require_once '../model/conexao.php';

Class DaoConteudo{
    public static function cadastrar(Conteudo $conteudo){
        $sql = "INSERT INTO tbconteudo (idPostagem, arquivo, src) VALUES (?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $conteudo->getIdPostagem());
        $stmt->bindValue(2, $conteudo->getArquivo());
        $stmt->bindValue(3, $conteudo->getSrc());
        return $stmt->execute();
    }
}
?>