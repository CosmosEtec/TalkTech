<?php

    class Conexao {
        public static function getConn(){
            $hostName = "localhost";
            $nomeBD = "talktech";
            $usuario = "root";
            $senha = "";

            try{
                $conn = new PDO("mysql:host=$hostName;dbname=$nomeBD", $usuario, $senha);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch(PDOException $e){
                echo "Erro na conexão: ".$e->getMessage();
            }
        }
    }
?>