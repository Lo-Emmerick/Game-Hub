<?php
require_once __DIR__.'../../../model/home/homeModel.php';
class homeController extends homeModel{
    function listaRank(){
        $homeModel = new homeModel;
        return $homeModel -> rankLista();
    }
}