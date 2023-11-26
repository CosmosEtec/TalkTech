<?php 
    require_once "../model/Perfil.php";
    require_once "../model/conexao.php";

    class DaoPerfil {
        public static function cadastra(Perfil $perfil){
            $perfil->setFotoPerfil("user/". $perfil->getNome() ."/fotoperfil.png");


            $sql = "INSERT INTO tbPerfil (nome, email, senha, fotoPerfil, perfilPrivado) VALUES (?, ?, ?, ?, ?)";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getNome());
            $stmt->bindValue(2, $perfil->getEmail());
            $stmt->bindValue(3, $perfil->getSenha());
            $stmt->bindValue(4, $perfil->getFotoPerfil());
            $stmt->bindValue(5, "0");	
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

        public static function login(Perfil $Perfil){
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

        public static function consultarId(Perfil $perfil){
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
        public static function consultarEmail(Perfil $perfil){
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

        public static function consultarNome(Perfil $perfil){
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

        public static function buscarDados(Perfil $perfil){
            $sql = "SELECT * FROM tbPerfil WHERE idPerfil = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getId());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public static function editarApelido(Perfil $perfil){
            $sql = "UPDATE tbPerfil SET apelido = ? WHERE idPerfil = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getApelido());
            $stmt->bindValue(2, $perfil->getId());
            return $stmt->execute();
        }

        public static function editarBiografia(Perfil $perfil){
            $sql = "UPDATE tbPerfil SET biografia = ? WHERE idPerfil = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getBiografia());
            $stmt->bindValue(2, $perfil->getId());
            return $stmt->execute();
        }

        public static function editarPrivacidade(Perfil $perfil){
            $sql = "UPDATE tbPerfil SET perfilPrivado = ? WHERE idPerfil = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getPerfilPrivado());
            $stmt->bindValue(2, $perfil->getId());
            return $stmt->execute();
        }

        public static function editarFotoPerfil(Perfil $perfil){
            $sql = "UPDATE tbPerfil SET fotoPerfil = ? WHERE idPerfil = ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $perfil->getFotoPerfil());
            $stmt->bindValue(2, $perfil->getId());
            return $stmt->execute();
        }

        public static function procurarPerfil(Perfil $perfil){
            $sql = "SELECT * FROM tbPerfil WHERE nome LIKE ? OR apelido LIKE ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, "%".$perfil->getNome()."%");
            $stmt->bindValue(2, "%".$perfil->getNome()."%");
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }
    }
?>