<?php

// Includes da Model
require_once (__DIR__.'/model/include/conexao.php');
require_once __DIR__.'/model/home/homeModel.php';
require_once __DIR__.'/model/jogos/jogosModel.php';
require_once __DIR__.'/model/login/loginModel.php';
require_once __DIR__.'/model/loja/lojaModel.php';
require_once __DIR__.'/model/menu/menuModel.php';
require_once __DIR__.'/model/meus_dados/meus_dadosModel.php';

// Includes da Controller
require_once __DIR__.'/controller/home/homeController.php';
require_once __DIR__.'/controller/jogos/jogosController.php';
require_once __DIR__.'/controller/login/loginController.php';
require_once __DIR__.'/controller/loja/lojaController.php';
require_once __DIR__.'/controller/menu/menuController.php';
require_once __DIR__.'/controller/meus_dados/meus_dadosController.php';

// Includes da View
require_once __DIR__.'/view/img/defineImg.php';
require_once __DIR__.'/view/jogos/action.php';

?>