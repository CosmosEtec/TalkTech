<?php

Class Bloqueado{
    private $idBloqueado;
    private $idPerfilBloqueador;
    private $idPerfilBloqueado;

    public function getIdBloqueado(){
        return $this->idBloqueado;
    }
    public function setIdBloqueado($idBloqueado){
        $this->idBloqueado = $idBloqueado;
    }

    public function getIdPerfilBloqueador(){
        return $this->idPerfilBloqueador;
    }
    public function setIdPerfilBloqueador($idPerfilBloqueador){
        $this->idPerfilBloqueador = $idPerfilBloqueador;
    }

    public function getIdPerfilBloqueado(){
        return $this->idPerfilBloqueado;
    }
    public function setIdPerfilBloqueado($idPerfilBloqueado){
        $this->idPerfilBloqueado = $idPerfilBloqueado;
    }
}

?>