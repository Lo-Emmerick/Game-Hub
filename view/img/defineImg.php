<?php

class defineImg{
    function selecionaImagem($id_img){

        switch ($id_img) {
            case '1':
                $vlr = 'view/img/borboleta.webp';
                break;
            case '2':
                $vlr = 'view/img/bug.webp';
                break;
            case '3':
                $vlr = 'view/img/cabra.webp';
                break;
            case '4':
                $vlr = 'view/img/cachorro.webp';
                break;
            case '5':
                $vlr = 'view/img/chapeu_mago.webp';
                break;
            case '6':
                $vlr = 'view/img/coelho.webp';
                break;
            case '7':
                $vlr = 'view/img/coracao.png';
                break;
            case '8':
                $vlr = 'view/img/escudo.png';
                break;
            case '9':
                $vlr = 'view/img/estrela.webp';
                break;
            case '10':
                $vlr = 'view/img/galinha.webp';
                break;
            case '11':
                $vlr = 'view/img/guaxinim.webp';
                break;
            case '12':
                $vlr = 'view/img/ogro.webp';
                break;
            case '13':
                $vlr = 'view/img/pergaminho.webp';
                break;
            case '14':
                $vlr = 'view/img/porco.webp';
                break;
            case '15':
                $vlr = 'view/img/vaca.webp';
                break;
            case '16':
                $vlr = 'view/img/veado.webp';
                break;
            default:
                $vlr = 'view/img/bug.webp';
                break;
        }
        return $vlr;
    }
}
