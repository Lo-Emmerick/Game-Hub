<?php
require __DIR__."../../../model/menu/menuModel.php";

if(!isset($_SESSION)){session_start();}

$valor = array_keys($_POST);

$menuModel = new menuModel();

if(isset($valor[0])){

    switch ($valor[0]) {

        case 'alimentarCampos':
            $retorno = $menuModel->alimentarCampos($_SESSION['id']);
            echo json_encode($retorno);
            break;
        
        default:
            $_SESSION["tela"] = $valor[0];
            echo $valor[0];
            break;
    }
}else{

}