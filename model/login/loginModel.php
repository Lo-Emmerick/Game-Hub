<?php
require __DIR__.'../../include/conexao.php';

class loginModel extends conexao{

    function validaLogin($email,$senha){
        $banco = new conexao;
        $sql = 'SELECT id FROM tbusuario WHERE email = "'.$email.'" AND senha ="'.$senha.'"';
        $consulta = mysqli_query($banco->getConection(),$sql);
        return mysqli_fetch_assoc($consulta);
    }
}