<?php

/***
 * 
 * @return /PDO
 */
class conexao{
    
    function getConection(){
        $host= 'localhost';
        $user = 'root';
        $pass = '';
        $dbname='game_hub';

        try{
            $pdo = new mysqli($host,$user,$pass, $dbname);
        }catch(Exception $e){
            echo 'Erro: '+ $e ->getMessage();
        }

        return $pdo;
    }
}