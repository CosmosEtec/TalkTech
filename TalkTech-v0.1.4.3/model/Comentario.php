<?php
Class Comentario{
    Private $idComentario;
    Private $idPostagem;
    Private $idPerfil;
    Private $Comentario;
    Private $dataComentario;

    public function getIdComentario(){
        return $this->idComentario;
    }

    public function setIdComentario($idComentario){
        $this->idComentario = $idComentario;
    }

    public function getIdPostagem(){
        return $this->idPostagem;
    }

    public function setIdPostagem($idPostagem){
        $this->idPostagem = $idPostagem;
    }

    public function getIdPerfil(){
        return $this->idPerfil;
    }

    public function setIdPerfil($idPerfil){
        $this->idPerfil = $idPerfil;
    }

    public function getComentario(){
        return $this->Comentario;
    }

    public function setComentario($Comentario){
        $this->Comentario = $Comentario;
    }

    public function getDataComentario(){
        return $this->dataComentario;
    }

    public function setDataComentario($dataComentario){
        $this->dataComentario = $dataComentario;
    }
}
?>