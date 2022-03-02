const personagem = document.querySelector('.img_char');
const background = document.querySelector('.img_fundo');
const pontuacao = document.querySelector('.pontos');
const somPulo = document.getElementById("somPulo");
const somPulo_chegando = document.getElementById("somPulo_chegando");
const morcego = document.getElementById("morcego");
const hit = document.getElementById("hit");
const iconSom = document.querySelector('.som');
const iconTrilha = document.querySelector('.trilha');
const trilha = document.getElementById("trilha");
const fim = document.getElementById("gameOver");
const lixeira = document.getElementById("tipoLixeira");


let som = true;
let trilhaSonora = true;
let numVidas = 3;
let morto = false;
let seMovendo = false;
let posicao = 0;
let pontos = 0;
pontuacao.innerHTML = "<p class='num_pontos'>" + pontos + "</p>"
let tipoLixeira = "Inimigo metal";

trilha.currentTime = 0;
trilha.play();

function ativaTrilha() {
    trilhaSonora = trilhaSonora == true ? false : true;
    if (trilhaSonora) {
        trilha.currentTime = 0;
        trilha.play();
        iconTrilha.classList.remove("trilhaOff");
        iconTrilha.classList.add("trilhaOn");
    } else {
        trilha.currentTime = 0;
        trilha.pause();
        iconTrilha.classList.remove("trilhaOn");
        iconTrilha.classList.add("trilhaOff");
    }
}

function ativaSom() {
    som = som == true ? false : true;
    if (som) {
        iconSom.classList.remove("somOff");
        iconSom.classList.add("somOn");
    } else {
        iconSom.classList.remove("somOn");
        iconSom.classList.add("somOff");
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

    velocidadePulo = 5;
    seMovendo = true;
    let intervaloPulo = setInterval(function () {
        if (posicao >= 80) {
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
                    posicao -= velocidadePulo;
                }
                personagem.style.bottom = posicao + "px";
            }, 20);
        } else {
            posicao += velocidadePulo;
            personagem.style.bottom = posicao + "px";
        }
    }, 20);
}

function criarInimigo() {

    const Inimigo = document.createElement('div');

    let posicaoInimigo = 600;

    let tempoAleatorio = Math.random() * 7000;
    if (tempoAleatorio < 1000) {
        tempoAleatorio = 1000;
    }

    let velocidade = 5;

    Inimigo.classList.add("Inimigo");

    tipoInimigo(tempoAleatorio,Inimigo);

    Inimigo.style.left = posicaoInimigo + 'px';
    background.appendChild(Inimigo);

    let InimigoIntervalo = setInterval(function () {
        if (posicaoInimigo < -20 && morto != true) {
            clearInterval(InimigoIntervalo);
            background.removeChild(Inimigo);          
                pontos++;
            pontuacao.innerHTML = "<p class='num_pontos'>" + pontos + "</p>"
        } else if (posicaoInimigo > 0 && posicaoInimigo < 45 && posicao < 45) {
            if (Inimigo.className == tipoLixeira && morto != true) {
                pontos = pontos + 10;
                pontuacao.innerHTML = "<p class='num_pontos'>" + pontos + "</p>"
                clearInterval(InimigoIntervalo);
                background.removeChild(Inimigo);
                tipoLixeira = trocaLixeira(tipoLixeira,parseInt(tempoAleatorio));
            } else {
                //Tomou hit
                let vida = document.getElementsByClassName('vida' + numVidas);
                numVidas--;
                if (vida[0]) {
                    vida[0].style.display = "none";
                }
                clearInterval(InimigoIntervalo);
                background.removeChild(Inimigo);
                if (numVidas == 0) {
                    morto = true;
                    trilha.pause();
                    somPulo.pause();
                    somPulo_chegando.pause();
                    hit.pause();

                    background.style.animation = "none";
                    personagem.style.display = "none";
                    fim.currentTime = 0;
                    fim.play();
                    
                    let dados = {
                        pontos: pontos,
                        vidaPerdida: 1,
                        jogo: 'pug_jump_eco_edition'
                    };

                    $.ajax({
                        url: "view/jogos/action.php",
                        method: "POST",
                        data: dados,
                        success:function (retorno) {
                            
                        }
                    });

                    window.setInterval(() => background.innerHTML = "<div class='fimDeJogo'> <img src='view/jogos/pug_jump_eco_edition/img/game_over2.png' alt='game_over' class='game_over'><div  class='totalPontos'><h1>Total de pontos: </h1><p>" + pontos + "</p></div><img src='view/jogos/pug_jump_eco_edition/img/sad_pug.gif' class='sad_pug' alt='img_pug'><p class='jogarNovamente'>Pressione ESPAÇO para jogar</p></div><div class='rodape'><h2>Creditos</h2><hr><div>Desenvolvedor<br><a href='https://www.linkedin.com/in/danilo-saleth/'>Danilo Saleth</a><br></div><hr><div>Trilha sonora <br><a href='https://soundcloud.com/mota-o-marmota'>João Pedro Mota</a></div></div>", 4000);
                    
                }
                if (morto != true) {
                    if (som) {
                        hit.currentTime = 0;
                        hit.play();
                    }
                }
            }
        } else {
            posicaoInimigo -= velocidade;
            Inimigo.style.left = posicaoInimigo + "px";
        }
    }, 20);

    if (morto != true) {
        if (som) {
            if (Inimigo.className == "Inimigo morcego") {
                morcego.currentTime = 0;
                morcego.play();
            } else {
            }

        }
        tipoLixo = 0;
        setTimeout(criarInimigo, tempoAleatorio);
    }

}

function tipoInimigo(tempoAleatorio,Inimigo) {

    if (tempoAleatorio < 1001) {
        Inimigo.classList.add("vidro");
        tipoLixo = 1;
    } else if (tempoAleatorio < 2000) {
        Inimigo.classList.add("papel");
        tipoLixo = 2;
    } else if (tempoAleatorio < 3000) {
        Inimigo.classList.add("plastico");
        tipoLixo = 3;
    } else if (tempoAleatorio < 5000) {
        Inimigo.classList.add("morcego");
    } else {
        Inimigo.classList.add("metal");
        tipoLixo = 4;
    }

}

function trocaLixeira(tipoLixeira,valor){
    lixeira.classList.remove(lixeira.classList[1]);
    if (valor % 2 == 0) {
        if (tipoLixeira == "Inimigo vidro") {
            tipoLixeira = "Inimigo papel";
            lixeira.classList.add("l2");
        }else if(tipoLixeira == "Inimigo papel"){
            tipoLixeira = "Inimigo plastico";
            lixeira.classList.add("l3");
        }else if( tipoLixeira == "Inimigo plastico"){
            tipoLixeira = "Inimigo metal";
            lixeira.classList.add("l4");
        }else{
            tipoLixeira = "Inimigo vidro";
            lixeira.classList.add("l1");
        }
    }else{
        if (tipoLixeira == "Inimigo vidro") {
            tipoLixeira = "Inimigo metal";
            lixeira.classList.add("l4");
        }else if(tipoLixeira == "Inimigo papel"){
            tipoLixeira = "Inimigo vidro";
            lixeira.classList.add("l1");
        }else if( tipoLixeira == "Inimigo plastico"){
            tipoLixeira = "Inimigo papel";
            lixeira.classList.add("l2");
        }else{
            tipoLixeira = "Inimigo plastico";
            lixeira.classList.add("l3");
        }
    }
    return tipoLixeira;
}
criarInimigo();
document.addEventListener('keydown', trataBotaoApertado);
document.addEventListener('touchstart', trataBotaoApertado);