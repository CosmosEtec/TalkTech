<?php

    Class Conteudo {
        Private $idConteudo;
        Private $idPostagem;
        Private $idPerfil;
        Private $arquivo;
        Private $src;

        public function getIdConteudo(){
            return $this->idConteudo;
        }

        public function setIdConteudo($idConteudo){
            $this->idConteudo = $idConteudo;
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
        
        public function getArquivo(){
            return $this->arquivo;
        }

        public function setArquivo($arquivo){
            $this->arquivo = $arquivo;
        }

        public function getSrc(){
            return $this->src;
        }

        public function setSrc($src){
            $this->src = $src;
        }
    }
?>