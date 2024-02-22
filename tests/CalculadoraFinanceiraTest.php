<?php

use PHPUnit\Framework\TestCase;

require_once 'src/CalculadoraFinanceira.php';

class CalculadoraFinanceiraTest extends TestCase{
    public function testCalcularJurosSimples() {
        $calculadora = new CalculadoraFinanceira();

        $this->assertEquals(200.00, $calculadora->calcularJurosSimples(1000.00, 0.02, 10));

        $this->assertEquals(0.00, $calculadora->calcularJurosSimples(0, 0.02, 10));

        $this->assertEquals(-200.00, $calculadora->calcularJurosSimples(-1000.00, 0.02, 10));
    }

    public function testCalcularJurosCompostos() {
        $calculadora = new CalculadoraFinanceira();

        $this->assertEquals(218.99, $calculadora->calcularJurosCompostos(1000, 0.02, 10, 12));

        $this->assertEquals(0.00, $calculadora->calcularJurosCompostos(0, 0.02, 10, 12));

        $this->assertEquals(-218.99, $calculadora->calcularJurosCompostos(-1000, 0.02, 10, 12));
    }

    public function testCalcularAmortizacao() {
        $calculadora = new CalculadoraFinanceira();

        $this->assertEquals(['juros' => 20.00, 'amortizacao' => 100.00, 'parcela' => 120.00, 'saldoDevedor' => 900.00], $calculadora->calcularAmortizacao(1000, 0.02, 10, 'SAC')[0]);

        $this->assertEquals(['juros' => 00.00, 'amortizacao' => 0.00, 'parcela' => 0.00, 'saldoDevedor' => 0.00], $calculadora->calcularAmortizacao(0, 0.02, 10, 'SAC')[0]);

        $this->assertEquals(['juros' => -20.00, 'amortizacao' => -100.00, 'parcela' => -120.00, 'saldoDevedor' => -900.00], $calculadora->calcularAmortizacao(-1000, 0.02, 10, 'SAC')[0]);

        
        $this->assertEquals(['juros' => 20.00, 'amortizacao' => 91.33, 'parcela' => 111.33, 'saldoDevedor' => 908.67], $calculadora->calcularAmortizacao(1000, 0.02, 10, 'Price')[0]);

        $this->assertEquals(['juros' => 0.00, 'amortizacao' => 0.00, 'parcela' => 0.00, 'saldoDevedor' => 0.00], $calculadora->calcularAmortizacao(0, 0.02, 10, 'Price')[0]);

        $this->assertEquals(['juros' => -20.00, 'amortizacao' => -91.33, 'parcela' => -111.33, 'saldoDevedor' => -908.67], $calculadora->calcularAmortizacao(-1000, 0.02, 10, 'Price')[0]);
    }
}