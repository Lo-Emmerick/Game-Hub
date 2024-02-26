<?php
require_once __DIR__.'/../../model/login/loginModel.php';

$loginModel = new loginModel();

/*fazer validações*/
if (!empty($_POST['data']['tbusuario'])) {
    $email = $_POST['data']['tbusuario']['usuario'];
    $senha = $_POST['data']['tbusuario']['senha'];

    $retorno = $loginModel->validaLogin($email,$senha);

    if(!empty($retorno)){
        if(!isset($_SESSION)){session_start();}
        $_SESSION['id'] = $retorno['id'];
        $result = array(
            "logado" => true,
            "msg" => "Logado com Sucesso!!",
        );
    }else{
        $result = array(
            "logado" => false,
            "msg" => "Usuário ou Senha Inválido!!",
        );
    }

    echo json_encode($result);
}
