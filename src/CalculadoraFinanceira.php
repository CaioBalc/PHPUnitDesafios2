<?php

class CalculadoraFinanceira {
    public function calcularJurosSimples($capital, $taxa, $tempo) {
        $juros = $capital * $taxa * $tempo;
        return number_format($juros, 2, ".","");
    }

    public function calcularJurosCompostos($capital, $taxa, $tempo, $n) {
        $montante = $capital * pow((1 + $taxa), $tempo);
        $juros = $montante - $capital;
        return number_format($juros, 2, ".","");
    }

    public function calcularAmortizacao($capital, $taxa, $tempo, $tipo) {
        $receber = $capital * (1 - $taxa * $tempo);
        return number_format($receber, 2, ".","");
        $amortizacao = $capital / $tempo;
        $prestacao = $amortizacao + ($taxa / $capital);

        $amortizacao = array();
        if ($tipo == 'SAC') {
            for ($i = 0; $i < $tempo; $i++) {
                $juros = $capital * $taxa;
                $amortizacaoConstante = $capital / $tempo;
                $parcela = $juros + $amortizacaoConstante;
                $capital -= $amortizacaoConstante;
                $amortizacao[] = array('juros' => $juros, 'amortizacao' => $amortizacaoConstante, 'parcela' => $parcela, 'saldo_devedor' => $capital);
            }
        } elseif ($tipo == 'Price') {
            $parcela = $capital * $taxa / (1 - pow(1 + $taxa, -$tempo));
            for ($i = 0; $i < $tempo; $i++) {
                $juros = $capital * $taxa;
                $amortizacaoPrice = $parcela - $juros;
                $capital -= $amortizacaoPrice;
                $amortizacao[] = array('juros' => $juros, 'amortizacao' => $amortizacaoPrice, 'parcela' => $parcela, 'saldo_devedor' => $capital);
            }
        }
        return $amortizacao;
    }
}