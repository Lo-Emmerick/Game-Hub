<?php

/***
 * 
 * @return /PDO
 */
class conexao{
    
    function getConection(){
        $host= 'localhost';
        $user = 'id18252821_danilosantos';
        $pass = '13863130685aA@';
        $dbname='id18252821_game_hub';

        try{
            $pdo = new mysqli($host,$user,$pass, $dbname);
        }catch(Exception $e){
            echo 'Erro: '+ $e ->getMessage();
        }

        return $pdo;
    }
}