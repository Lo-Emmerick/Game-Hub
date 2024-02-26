<?php

/***
 * 
 * @return /PDO
 */
namespace conexao;
class conexaoBanco{
    
    function getConection(){
        $host= 'localhost';
        $user = 'root';
        $pass = '';
        $dbname='game_hub';

        try{
            $pdo = new \mysqli($host,$user,$pass, $dbname);
        }catch(Exception $e){
            echo 'Erro: '+ $e ->getMessage();
        }

        return $pdo;
    }
}