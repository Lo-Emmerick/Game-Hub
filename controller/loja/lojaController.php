<?php
require 'model/loja/lojaModel.php';

class lojaController extends lojaModel{

    function pegarProdutos(){
        return $this->pegarProdutosAtivos();
    }
}