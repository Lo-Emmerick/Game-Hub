<?php
namespace model;
class menuModel{

    function alimentarCampos($id){
        $banco = new \conexao\conexaoBanco;
        $sql = 'SELECT pontos, vida, img_usuario FROM tbusuario WHERE id = '.$id;
        $consulta = mysqli_query($banco->getConection(),$sql);
        return mysqli_fetch_assoc($consulta);
    }
}