<?php

class CalculadoraFinanceira {
    # Inicio base
    public function calcularJurosSimples($capital, $taxa, $tempo) {
        return $capital * $taxa * $tempo;
    }

    public function calcularJurosCompostos($capital, $taxa, $tempo) {
        return $capital * pow((1 + $taxa), $tempo) - $capital;
    }

    public function calcularAmortizacao($capital, $taxa, $tempo, $tipo) {
        // Implementação do cálculo de amortização
    }
    # Fim base
}