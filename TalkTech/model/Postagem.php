<?php
class Postagem {
    private $idPostagem;
    private $idPerfil;
    private $Conteudo;
    private $Legenda;
    private $dataPost;

    public function getConteudo() {
        return $this->Conteudo;
    }

    public function setConteudo($Conteudo) {
        $this->Conteudo = $Conteudo;
    }

    public function getIdPostagem() {
        return $this->idPostagem;
    }

    public function setIdPostagem($idPostagem) {
        $this->idPostagem = $idPostagem;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    public function getLegenda() {
        return $this->Legenda;
    }

    public function setLegenda($Legenda) {
        $this->Legenda = $Legenda;
    }

    public function getDataPost() {
        return $this->dataPost;
    }

    public function setDataPost($dataPost) {
        $this->dataPost = $dataPost;
    }
}
?>