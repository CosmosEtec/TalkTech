<?php 
    require_once "../model/Perfil.php";
    require_once "../model/conexao.php";

    class DaoPerfil {
        public function create($perfil){
            $sql = "INSERT INTO perfil (nome, apelido, email, senha, idade, fotoPerfil, fotoBanner, biografia, perfilPrivado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getNome());
            $stmt->bindValue(2, $perfil->getApelido());
            $stmt->bindValue(3, $perfil->getEmail());
            $stmt->bindValue(4, $perfil->getSenha());
            $stmt->bindValue(5, $perfil->getIdade());
            $stmt->bindValue(6, $perfil->getFotoPerfil());
            $stmt->bindValue(7, $perfil->getFotoBanner());
            $stmt->bindValue(8, $perfil->getBiografia());
            $stmt->bindValue(9, $perfil->getPerfilPrivado());
            $stmt->execute();
        }

        public function read(){
            $sql = "SELECT * FROM perfil";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public function update($perfil){
            $sql = "UPDATE perfil SET nome = ?, apelido = ?, email = ?, senha = ?, idade = ?, fotoPerfil = ?, fotoBanner = ?, biografia = ?, perfilPrivado = ? WHERE id = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getNome());
            $stmt->bindValue(2, $perfil->getApelido());
            $stmt->bindValue(3, $perfil->getEmail());
            $stmt->bindValue(4, $perfil->getSenha());
            $stmt->bindValue(5, $perfil->getIdade());
            $stmt->bindValue(6, $perfil->getFotoPerfil());
            $stmt->bindValue(7, $perfil->getFotoBanner());
            $stmt->bindValue(8, $perfil->getBiografia());
            $stmt->bindValue(9, $perfil->getPerfilPrivado());
            $stmt->bindValue(10, $perfil->getID());
            $stmt->execute();
        }
    }
?>