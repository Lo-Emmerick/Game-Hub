<?php

$homeController = new homeController;
$rank = $homeController -> listaRank();

for ($i=0; $i < count($rank); $i++) { 
    $rank[$i][0] = $defineImg->selecionaImagem($rank[$i][0]);
}

?>
<link rel='stylesheet' href='view/home/style.css'>
<section class="main_section_home">
    <section class="home_ranking_section">
        <h2>Ranking</h2>
        <?php
            for ($i=0; $i < 4; $i++) { 
                echo '<article class="home_raking_layout"><div class="home_img_ranking_user"><img src="'.(!empty($rank[$i][0]) ? $rank[$i][0] : "").'" ></div><img src="view/img/estrela.webp" class="home_img_ranking_estrela estrela'.$i.'"><p>'.(!empty($rank[$i][1]) ? $rank[$i][1] : "").'</p></article>';
            }
        ?>
    </section>
    <section class="home_sobre_section">
        <h2>Sobre Nós</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </section>
</section>