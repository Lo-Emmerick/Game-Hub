<?php
require 'controller/loja/lojaController.php';
require_once 'view/img/defineImg.php';

$defineImg = new defineImg;
$lojaController = new lojaController;
$produto = $lojaController->pegarProdutos();
for ($i=0; $i < count($produto); $i++) { 
    $produto[$i][3] = $defineImg->selecionaImagem($produto[$i][3]);
}

?>
<link href="view/loja/style.css" rel="stylesheet">
<script src="view/loja/script.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="storeContent">
    <article class="conteudo3">
        <div class="visualisar">
            <img id="imgVizualizada" src="<?php echo $produto[0][3] ?>" alt="imgItem">
        </div>
        <div class="description">
            <p id="itemName"><?php echo $produto[0][1] ?></p>
            <hr>
            <div id="descricao">
                <?php echo $produto[0][5] ?>
            </div>
        </div>
        <p class="preco">Preço: <a id="preco"><?php echo $produto[0][2] ?></a></p>
        <button id="comprar">Comprar</button>
    </article>
    <div class="espada2">
        <div class="espada">
            <div class="lamina">
                <div class="ponta"></div>
                <div class="corpoLamina"></div>
            </div>
            <div class="cabo">
                <div class="pontaCabo">
                    <div class="bolinha"></div>
                    <div class="linha"></div>
                    <div class="bolinha2"></div>
                </div>
                <div class="meioCabo"></div>
                <div class="baseCabo"></div>
            </div>
        </div>
    </div>
    <article class="conteudo1">
        <?php
            for ($i=0; $i < count($produto); $i++) { 
            echo '<div><a href="#" onclick="selectItem(this)"><img src="'.$produto[$i][3].'" alt="'.$produto[$i][1].'"><div style="display:none">'.$produto[$i][5].'</div><div style="display:none">'.$produto[$i][2].'</div></a></div>';
            }
        ?>
    </article>
</section>

