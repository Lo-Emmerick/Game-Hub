<?php
class homeModel
{
    function rankLista()
    {
        $sql = 'SELECT img_usuario, pontos FROM tbusuario ORDER BY pontos DESC LIMIT 4';
        $banco = new conexao\conexaoBanco;
        $consulta = mysqli_query($banco->getConection(), $sql);
        return mysqli_fetch_all($consulta);
    }
}
