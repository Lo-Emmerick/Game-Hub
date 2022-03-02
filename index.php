<?php 
if(!isset($_SESSION)){session_start();}

if(empty($_SESSION)){

    include 'view/login/login.php';
}else{
    if (!isset($_SESSION["tela"])) {

        include 'view/menu/menu.php';
        include 'view/home/home.php';

    }else {
        if($_SESSION["tela"] != "Sair"){
            include 'view/menu/menu.php';
        }
        
        switch ($_SESSION["tela"]) {
    
            case 'Home':
                include 'view/home/home.php';
                break;
    
            case 'Jogos':
                include 'view/jogos/jogos.php';
                break;

            case 'Loja':
                include 'view/loja/loja.php';
                break;    
            
            case 'Meus_Dados':
                include 'view/meus_dados/meus_dados.php';
                break;      

            case 'Pug_Jump':
                include 'view/jogos/pug_jump_eco_edition/index.php';
                break;    
                        
            case 'Sair':
                session_destroy();
                include 'view/login/login.php';
                break;
            
            default:
                include 'view/notFound/notFound.php';
                break;
        }
    }
}
?>