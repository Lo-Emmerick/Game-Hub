<?php
require_once __DIR__.'/../../model/include/conexao.php';

class loginModel extends conexao\conexaoBanco{
    function validaLogin($email,$senha){
        $banco = new conexao\conexaoBanco();
        $sql = 'SELECT id FROM tbusuario WHERE email = "'.$email.'" AND senha ="'.$senha.'"';
        $consulta = mysqli_query($banco->getConection(),$sql);
        return mysqli_fetch_assoc($consulta);
    }
}