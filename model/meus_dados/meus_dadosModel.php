<?php

require_once "model/include/conexao.php";

class meus_dadosModel extends conexao
{
    function pegarDadosUsuario()
    {
        $sql = "SELECT nome,pontos,instagram,email,img_usuario FROM tbusuario WHERE id =" . $_SESSION['id'];
        $banco = new conexao;
        $consulta = mysqli_query($banco->getConection(), $sql);
        return mysqli_fetch_assoc($consulta);
    }

    function dadosRank(){
        $sql = "SELECT id FROM tbusuario ORDER BY pontos DESC";
        $banco = new conexao;
        $consulta = mysqli_query($banco->getConection(), $sql);
        return mysqli_fetch_all($consulta);
    }
}
