<?php
if(!isset($_SESSION)){session_start();}

require __DIR__."../../../model/menu/menuModel.php";

class menuController extends menuModel
{
    
    function alimentaMenu(){
        $menuModel = new menuModel;
        return $menuModel->alimentarCampos($_SESSION['id']);
    }
}

?>