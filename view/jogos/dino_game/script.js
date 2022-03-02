const personagem = document.querySelector('.pug_jump_img_char');
const background = document.querySelector('.pug_jump_img_fundo');
const pontuacao = document.querySelector('.pug_jump_pontos');
const somPulo = document.getElementById("somPulo");
const somPulo_chegando = document.getElementById("somPulo_chegando");
const morcego = document.getElementById("morcego");
const hit = document.getElementById("hit");
const iconSom = document.querySelector('.pug_jump_som');
const iconTrilha = document.querySelector('.pug_jump_trilha');
const trilha = document.getElementById("trilha");
const fim = document.getElementById("gameOver");
const ovo = document.getElementById("ovo");

let som = true;
let trilhaSonora = true;
let numVidas = 3;
let morto = false;
let seMovendo = false;
let posicao = 0;
let pontos = 0;

trilha.currentTime = 0;
trilha.play();

function ativaTrilha() {
    trilhaSonora = trilhaSonora == true ? false : true;
    if (trilhaSonora) {
        trilha.currentTime = 0;
        trilha.play();
        iconTrilha.classList.remove("pug_jump_trilhaOff");
        iconTrilha.classList.add("pug_jump_trilhaOn");
    } else {
        trilha.currentTime = 0;
        trilha.pause();
        iconTrilha.classList.remove("pug_jump_trilhaOn");
        iconTrilha.classList.add("pug_jump_trilhaOff");
    }
}

function ativaSom() {
    som = som == true ? false : true;
    if (som) {
        iconSom.classList.remove("pug_jump_somOff");
        iconSom.classList.add("pug_jump_somOn");
    } else {
        iconSom.classList.remove("pug_jump_somOn");
        iconSom.classList.add("pug_jump_somOff");
    }
}

function trataBotaoApertado(event) {
    if (event.code === "Escape" && !morto) {

        alert("Jogo pausado.");
    } else if (event.code === "Space" || event.type == 'touchstart') {
        if (!seMovendo && morto == false) {
            pulo();
        } else if (morto == true) {
            document.location.reload();
        }
    } else if (event.code === "KeyS" && !morto) {
        ativaSom();
    } else if (event.code === "KeyD" && !morto) {
        ativaTrilha();
    }
}

function pulo() {

    if (trilha.paused && trilhaSonora) {
        trilha.currentTime = 0;
        trilha.play();
    }

    if (som) {
        somPulo.currentTime = 0;
        somPulo.play();
    }

    seMovendo = true;
    let intervaloPulo = setInterval(function () {
        if (posicao >= 150) {
            clearInterval(intervaloPulo);
            let descendo = setInterval(function () {
                if (posicao <= 0) {
                    clearInterval(descendo);
                    seMovendo = false;

                    if (som) {
                        somPulo_chegando.currentTime = 0;
                        somPulo_chegando.play();
                    }
                } else {
                    posicao -= 8;
                }
                personagem.style.bottom = posicao + "px";
            }, 20);
        } else {
            posicao += 8;
            personagem.style.bottom = posicao + "px";
        }
    }, 20);
}

function criarInimigo() {

    const Inimigo = document.createElement('div');

    let posicaoInimigo = 1000;
    let tempoAleatorio = Math.random() * 6000;
    let velocidade = 5;

    if (pontos > 5) {
        velocidade = pontos;
    }

    if (tempoAleatorio < 1000) {
        tempoAleatorio = 1000;
    }

    Inimigo.classList.add("pug_jump_Inimigo");

    if (pontos < 5) {
        Inimigo.classList.add("pug_jump_egg");
    } else {
        Inimigo.classList.add("pug_jump_morcego");
    }

    Inimigo.style.left = 1000 + 'px';
    background.appendChild(Inimigo);

    let InimigoIntervalo = setInterval(function () {
        if (posicaoInimigo < -20) {
            clearInterval(InimigoIntervalo);
            background.removeChild(Inimigo);
            pontos++;
            pontuacao.innerHTML = "<p class='pug_jump_num_pontos'>" + pontos + "</p>"
        } else if (posicaoInimigo > 0 && posicaoInimigo < 60 && posicao < 60) {
            //Tomou uma ratada
            let vida = document.getElementsByClassName('pug_jump_vida' + numVidas);
            numVidas--;
            if (vida[0]) {
                vida[0].style.display = "none";
            }
            clearInterval(InimigoIntervalo);
            background.removeChild(Inimigo);
            if (numVidas == 0) {
                trilha.pause();
                somPulo.pause();
                somPulo_chegando.pause();
                hit.pause();
                
                document.getElementsByClassName("pug_jump_img_fundo")[0].style.animation = "none";
                personagem.style.display ="none";
                fim.currentTime = 0;
                fim.play();

                // console.log("Mandar para o Banco os pontos");
                $.ajax({
                    method: "POST",
                    url: 'controller/jogos/jogosController.php',
                    data:{totalPontos: pontos,},
                    success: function(data){
                        
                    }
                })

                window.setInterval(()=>background.innerHTML = "<div class='pug_jump_fimDeJogo'><img src='view/jogos/dino_game/sad_pug.gif' alt='sad_pug' class='pug_jump_sad_pug'><div  class='pug_jump_totalPontos'><h1>Total de pontos: </h1><p>"+pontos+"</p></div><p class='pug_jump_jogarNovamente'>Pressione ESPAÇO para jogar novamente</p></div><div class='pug_jump_rodape'><h2>Creditos</h2><div>Desenvolvedor: <a href='https://www.linkedin.com/in/danilo-saleth/' target='_blank'>Danilo Saleth</a></div><div>Trilha sonora: <a href='https://soundcloud.com/mota-o-marmota' target='_blank'>João Pedro Mota</a></div></div>",4000);
                morto = true;
                
            }
            if (!morto) {
                if (som) {
                    hit.currentTime = 0;
                    hit.play();
                }
            }
        } else {
            posicaoInimigo -= velocidade;
            Inimigo.style.left = posicaoInimigo + "px";
        }
    }, 20);

    if (!morto) {
        if (som) {
            if (pontos < 5) {
                ovo.currentTime = 0;
                ovo.play();
            } else {
                morcego.currentTime = 0;
                morcego.play();
            }
        
        }

        if(!morto){
            setTimeout(criarInimigo, tempoAleatorio);
        }
    }

}
criarInimigo();
document.addEventListener('keydown', trataBotaoApertado);
document.addEventListener('touchstart', trataBotaoApertado);