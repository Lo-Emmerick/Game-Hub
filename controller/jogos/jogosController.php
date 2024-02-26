<?php
// require_once '../../model/jogos/jogosModel.php';

class jogosController extends jogosModel
{

    function atualizaPontos($id, $pontos)
    {
        $pontosAtuais = $this->pegaPontos($id);
        $totalPontos = $pontosAtuais[0][0] + $pontos;
        $this->pontosUpdate($totalPontos, $id);
    }
    function removeVida($id, $vidaPerdida)
    {
        $vidasAtuais = $this->pegaVida($id);
        $totalVidas= $vidasAtuais[0][0] - $vidaPerdida;
        if($totalVidas < 0){
            $totalVidas = 0;
        } 
        $this->vidasUpdate($totalVidas, $id);
    }
}
