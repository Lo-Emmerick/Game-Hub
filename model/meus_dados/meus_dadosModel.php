<?php
class meus_dadosModel extends conexao\conexaoBanco
{
    function pegarDadosUsuario()
    {
        $sql = "SELECT name,pontos,instagram,email,img_usuario FROM tbusuario WHERE id =" . $_SESSION['id'];
        $banco = new conexao\conexaoBanco;
        $consulta = mysqli_query($banco->getConection(), $sql);
        return mysqli_fetch_assoc($consulta);
    }

    function dadosRank(){
        $sql = "SELECT id FROM tbusuario ORDER BY pontos DESC";
        $banco = new conexao\conexaoBanco;
        $consulta = mysqli_query($banco->getConection(), $sql);
        return mysqli_fetch_all($consulta);
    }
}
