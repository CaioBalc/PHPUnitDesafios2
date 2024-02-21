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
        // $receber = $capital * (1 - $taxa * $tempo);
        // return number_format($receber, 2, ".","");
        // $amortizacao = $capital / $tempo;
        // $prestacao = $amortizacao + ($taxa / $capital);

        $amortizacao = array();
        if ($tipo == 'SAC') {
            for ($i = 0; $i < $tempo; $i++) {
                $juros = $capital * $taxa; #20
                $amortizacaoConstante = $capital / $tempo; #100
                $parcela = $juros + $amortizacaoConstante; #120
                $capital -= $amortizacaoConstante; #900
                $amortizacao[] = array(
                    'juros' => number_format($juros, 2, ".",""),
                    'amortizacao' => number_format($amortizacaoConstante, 2, ".",""),
                    'parcela' => number_format($parcela, 2, ".",""),
                    'saldoDevedor' => number_format($capital, 2, ".",""));
            }
        } elseif ($tipo == 'Price') {
            $parcela = $capital * $taxa / (1 - pow(1 + $taxa, -$tempo)); #111.32
            for ($i = 0; $i < $tempo; $i++) {
                $juros = $capital * $taxa; #20
                $amortizacaoPrice = $parcela - $juros; #91.32
                $capital -= $amortizacaoPrice; #908.68
                $amortizacao[] = array(
                    'juros' => number_format($juros, 2, ".",""),
                    'amortizacao' => number_format($amortizacaoPrice, 2, ".",""),
                    'parcela' => number_format($parcela, 2, ".",""),
                    'saldoDevedor' => number_format($capital, 2, ".",""));
            }
        }
        return $amortizacao;
    }
}