<?php

require "model/meus_dados/meus_dadosModel.php";

class meus_dadosController extends meus_dadosModel {

    function alimentaMeusDados(){
        return $this->pegarDadosUsuario();
    }

    function posicaoRank(){
        $dadosRank = $this->dadosRank();
        for ($i = 0; $i < $dadosRank ; $i++){
            if($dadosRank[$i][0] == $_SESSION["id"]){
                return $i + 1;
            }
        }
    }
}