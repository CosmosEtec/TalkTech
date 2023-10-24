<?php 
    require_once "../model/Perfil.php";
    require_once "../model/conexao.php";

    class DaoPerfil {
        public static function cadastra($perfil){
            $perfil->setFotoPerfil("user/". $perfil->getNome() ."/fotoperfil.png");
            $perfil->setFotoBanner("user/". $perfil->getNome() ."/fotobanner.png");


            $sql = "INSERT INTO tbPerfil (nome, email, senha, fotoPerfil, fotoBanner, perfilPrivado) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getNome());
            $stmt->bindValue(2, $perfil->getEmail());
            $stmt->bindValue(3, $perfil->getSenha());
            $stmt->bindValue(4, $perfil->getFotoPerfil());
            $stmt->bindValue(5, $perfil->getFotoBanner());
            $stmt->bindValue(6, "0");	
            return $stmt->execute();
        }

        public static function read(){
            $sql = "SELECT * FROM tbPerfil";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public static function login($Perfil){
            $sql = "SELECT * FROM tbPerfil WHERE email = ? AND senha = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $Perfil->getEmail());
            $stmt->bindValue(2, $Perfil->getSenha());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            } else {
                return false;
            }
        }

        public static function consultarId($perfil){
            $sql = "SELECT idPerfil FROM tbPerfil WHERE email = ? AND senha = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getEmail());
            $stmt->bindValue(2, $perfil->getSenha());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['idPerfil'];
            }
        }
        public static function consultarEmail($perfil){
            $sql = "SELECT idPerfil FROM tbPerfil WHERE email = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getEmail());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            }
            return false;
        }

        public static function consultarNome($perfil){
            $sql = "SELECT idPerfil FROM tbPerfil WHERE nome = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getNome());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            }
            return false;
        }

        public static function buscarDados($perfil){
            $sql = "SELECT * FROM tbPerfil WHERE idPerfil = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getId());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
        }
    }
?>