<?php
Class Seguidor{
    private $idSeguidor;
    private $idPerfilSeguidor;
    private $idPerfilSeguido;

    public function getIdSeguidor(){
        return $this->idSeguidor;
    }
    public function setIdSeguidor($idSeguidor){
        $this->idSeguidor = $idSeguidor;
    }

    public function getIdPerfilSeguidor(){
        return $this->idPerfilSeguidor;
    }
    public function setIdPerfilSeguidor($idPerfilSeguidor){
        $this->idPerfilSeguidor = $idPerfilSeguidor;
    }

    public function getIdPerfilSeguido(){
        return $this->idPerfilSeguido;
    }
    public function setIdPerfilSeguido($idPerfilSeguido){
        $this->idPerfilSeguido = $idPerfilSeguido;
    }
}
?>