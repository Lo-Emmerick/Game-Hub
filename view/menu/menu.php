<?php
if (!isset($_SESSION)) {
    session_start();
}
require 'controller/menu/menuController.php';
require 'view/img/defineImg.php';

$defineImg = new defineImg;
$menuController = new menuController;
$dadosMenu = $menuController->alimentaMenu();
$img_usuario = $defineImg->selecionaImagem($dadosMenu['img_usuario']);

?>
<link rel="stylesheet" href="view/menu/style.css">
<link rel="stylesheet" href="view/include/fonts.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="menu">
    <div class="img_user"><img src="<?php echo $img_usuario ?>" alt="img_user"></div>
    <section class="menu_label">
        <section class="menu_content">
            <article class="menu_pontos">
                <img src="view/img/estrela.webp" alt="estrela" class="menu_estrela">
                <p><?php echo $dadosMenu['pontos'] ?></p>
            </article>
            <article class="vida_content">
                <img src="view/img/coracao.png" alt="img_Coracao" class="menu_vida">
                <?php
                for ($i = 0; $i < 10; $i++) {
                    if ($i < $dadosMenu['vida']) {
                        echo '<div class="vida"></div>';
                    } else {
                        echo '<div class="vida vida_perdida"></div>';
                    }
                }
                ?>
            </article>
            <article class="main_menu">
                <nav>
                    <ul class="menu_principal">
                        <a href="" class="btnHome" onclick="trataBotao(this)">Home</a>
                        <a href="" class="btnJogos" onclick="trataBotao(this)">Jogos</a>
                        <a href="" class="btnLoja" onclick="trataBotao(this)">Loja</a>
                        <a href="" class="btnMeusDados" onclick="trataBotao(this)">Meus Dados</a>
                        <a href="" class="btnSair" onclick="trataBotao(this)">Sair</a>
                    </ul>
                </nav>
            </article>
        </section>
    </section>
    <script src="controller/menu/script.js"></script>
</section>