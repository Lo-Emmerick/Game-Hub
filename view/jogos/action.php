<?php
if(!isset($_SESSION)){session_start();}
$jogosController = new jogosController;

if (!empty($_POST)) {

    switch ($_POST['jogo']) {

        case 'pug_jump_eco_edition':
            $jogosController->atualizaPontos($_SESSION['id'],$_POST['pontos']);
            $jogosController->removeVida($_SESSION['id'], $_POST['vidaPerdida']);
            break;
        
    }
}