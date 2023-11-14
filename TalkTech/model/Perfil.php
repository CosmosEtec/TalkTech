<?php

    class Perfil {
        private $id;
        private $nome;
        private $apelido;
        private $email;
        private $senha;
        private $idade;
        private $fotoPerfil;
        private $fotoBanner;
        private $biografia;
        private $perfilPrivado;

        public function getID(){
            return $this->id;
        }

        public function setID($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getApelido(){
            return $this->apelido;
        }

        public function setApelido($apelido){
            $this->apelido = $apelido;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function setIdade($idade){
            $this->idade = $idade;
        }

        public function getFotoPerfil(){
            return $this->fotoPerfil;
        }

        public function setFotoPerfil($fotoPerfil){
            $this->fotoPerfil = $fotoPerfil;
        }

        public function getFotoBanner(){
            return $this->fotoBanner;
        }

        public function setFotoBanner($fotoBanner){
            $this->fotoBanner = $fotoBanner;
        }

        public function getBiografia(){
            return $this->biografia;
        }

        public function setBiografia($biografia){
            $this->biografia = $biografia;
        }

        public function getPerfilPrivado(){
            return $this->perfilPrivado;
        }

        public function setPerfilPrivado($perfilPrivado){
            $this->perfilPrivado = $perfilPrivado;
        }

    }
?>