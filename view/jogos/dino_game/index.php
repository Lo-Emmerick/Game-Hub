<link rel="stylesheet" href="view/jogos/dino_game/style.css">
<script src="view/jogos/dino_game/script.js" charset="UTF-8" defer></script>

<section class="pug_jump_interface">
    <div class="pug_jump_img_fundo">
        <div class="pug_jump_img_char">
            
        </div>
        <div class="pug_jump_menu">
            <img src="view/jogos/dino_game/pug_vida.png" alt="vida" class="pug_jump_vida1">
            <img src="view/jogos/dino_game/pug_vida.png" alt="vida" class="pug_jump_vida2">
            <img src="view/jogos/dino_game/pug_vida.png" alt="vida" class="pug_jump_vida3">
        </div>
        <div class="pug_jump_som" onclick="ativaSom()">

        </div>
        <div class="pug_jump_trilha" onclick="ativaTrilha()">
            
        </div>
        <div class="pug_jump_placar">
            <img src="view/jogos/dino_game/bat.gif" alt="morcego">
            <div class="pug_jump_pontos">

            </div>
        </div>
    </div>
    <audio id="somPulo" src="view/jogos/dino_game/pulo_saindo.mp3" hidden></audio>
    <audio id="somPulo_chegando" src="view/jogos/dino_game/pulo_chegando.wav" hidden></audio>
    <audio id="morcego" src="view/jogos/dino_game/morcego_Spawn.mp3" hidden></audio>
    <audio id="hit" src="view/jogos/dino_game/hit.mp3" hidden></audio>
    <audio id="trilha" src="view/jogos/dino_game/trilha.mp3" hidden></audio>
    <audio id="gameOver" src="view/jogos/dino_game/game_over.mp3" hidden></audio>
    <audio id="ovo" src="view/jogos/dino_game/ovo_spawn.mp3" hidden></audio>
</section>
