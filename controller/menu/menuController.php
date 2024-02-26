<?php
if(!isset($_SESSION)){session_start();}

// require __DIR__."../../../model/menu/menuModel.php";

class menuController extends model\menuModel
{
    
    function alimentaMenu(){
        $menuModel = new model\menuModel;
        return $menuModel->alimentarCampos($_SESSION['id']);
    }
}

?>