<?php

    class Reacao{
        Private $idReacao;
        Private $idPostagem;
        Private $idComentario;
        Private $idPerfil;

        public function getIdReacao(){
            return $this->idReacao;
        }

        public function setIdReacao($idReacao){
            $this->idReacao = $idReacao;
        }

        public function getIdPostagem(){
            return $this->idPostagem;
        }

        public function setIdPostagem($idPostagem){
            $this->idPostagem = $idPostagem;
        }

        public function getIdComentario(){
            return $this->idComentario;
        }

        public function setIdComentario($idComentario){
            $this->idComentario = $idComentario;
        }

        public function getIdPerfil(){
            return $this->idPerfil;
        }

        public function setIdPerfil($idPerfil){
            $this->idPerfil = $idPerfil;
        }

    }
?>