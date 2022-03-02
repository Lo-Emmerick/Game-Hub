<?php
require_once __DIR__.'../../include/conexao.php';

class lojaModel{

    function pegarProdutosAtivos(){
        $banco = new conexao;
        $sql = "SELECT * FROM tbloja WHERE situacao = 'A'";
        $consulta = mysqli_query($banco->getConection() ,$sql);
        return mysqli_fetch_all($consulta);
    }
}