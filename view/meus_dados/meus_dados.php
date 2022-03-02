<?php
require "controller/meus_dados/meus_dadosControler.php";
require_once 'view/img/defineImg.php';

$defineImg = new defineImg;
$meus_dadosController = new meus_dadosController;
$data = $meus_dadosController->alimentaMeusDados();
$img_usuario = $defineImg->selecionaImagem($data['img_usuario']);
?>
<link rel="stylesheet" href="view/meus_dados/style.css">
<link rel="stylesheet" href="view/include/fonts.css">
<section class="dados_main_content">
    <article class="dados_header">
        <img src="<?php echo $img_usuario ?>" class="img_usuario" alt="img_usuario">
        <p><?php echo $data['nome'] ?></p>
        <article class="dados_colocacao">
            <img src="view/img/img_trofeu.webp" class="img_colocacao" alt="img_colocacao">
            <p><?php echo $meus_dadosController->posicaoRank() ?>º th</p>
        </article>
    </article>
    <article class="dados_content">
        <article class="dados_content_article">
            <img src="view/img/img_nick.webp" alt="img_nick">
            <p>Nick</p>
            <?php echo '<input type="text" value="'.$data['nome'].' ">' ?>
        </article>
        <article class="dados_content_article">
            <img src="view/img/medalha.webp" alt="img_voucher">
            <p>Voucher</p>
            <input type="text" placeholder="Insira o cupom aqui">
        </article>
        <article class="dados_content_article">
            <img src="view/img/img_email.webp" class="" alt="img_email">
            <p>Email</p>
            <?php echo '<input type="text" value="'.$data['email'].' ">' ?>
        </article>
        <article class="dados_content_article">
            <img src="view/img/img_instagram.webp" alt="img_instagram">
            <p>Instagram</p>
            <?php echo '<input type="text" value="'.$data['instagram'].' ">' ?>
        </article>
    </article>
    <article class="dados_footer">
        <article class="dados_footer_article">
            <img src="view/img/img_x.webp" alt="img_delete">
            <p>Excluir Conta</p>
        </article>
        <article class="dados_footer_article">
            <img src="view/img/img_senha.webp" alt="img_senha">
            <p>Alterar Senha</p>
        </article>
        <article class="dados_footer_article">
            <img src="view/img/img_v.webp" alt="img_salvar">
            <p>Salvar Alterações</p>
        </article>
    </article>
</section>