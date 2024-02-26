<?php
class jogosModel extends conexao\conexaoBanco{
    function pontosUpdate($totalPontos, $id){
       $sql = 'UPDATE tbusuario SET pontos = '.$totalPontos.' WHERE id = '.$id;
       $banco = new conexao\conexaoBanco();
       $consulta = mysqli_query($banco -> getConection(), $sql);
    }

    function vidasUpdate($totalVidas, $id){
        $sql = 'UPDATE tbusuario SET vida = '.$totalVidas.' WHERE id = '.$id;
        $banco = new conexao\conexaoBanco();
        $consulta = mysqli_query($banco -> getConection(), $sql);
     }

    function pegaPontos($id){
        $sql = 'SELECT pontos FROM tbusuario WHERE id = '.$id;
        $banco = new conexao\conexaoBanco();
        $consulta = mysqli_query($banco -> getConection(), $sql);
        return mysqli_fetch_all($consulta);
    }

    function pegaVida($id){
        $sql = 'SELECT vida FROM tbusuario WHERE id = '.$id;
        $banco = new conexao\conexaoBanco();
        $consulta = mysqli_query($banco -> getConection(), $sql);
        return mysqli_fetch_all($consulta);
    }
}

