<?php

use PHPUnit\Framework\TestCase;

require_once 'src/CalculadoraFinanceira.php';

class CalculadoraFinanceiraTest extends TestCase{
    public function testCalcularJurosSimples() {
        $calculadora = new CalculadoraFinanceira();

        $this->assertEquals(200.00, $calculadora->calcularJurosSimples(1000.00, 0.02, 10));

        $this->assertEquals(0, $calculadora->calcularJurosSimples(0, 0.02, 10));

        $this->assertEquals(-200.00, $calculadora->calcularJurosSimples(-1000.00, 0.02, 10));
    }

    public function testCalcularJurosCompostos() {
        $calculadora = new CalculadoraFinanceira();
        $n = 12;

        $this->assertEquals(1218.99, $calculadora->calcularJurosCompostos(1000, 0.02, 10, $n));

        $this->assertEquals(0.00, $calculadora->calcularJurosCompostos(0, 0.02, 10, $n));

        $this->assertEquals(-1218.99, $calculadora->calcularJurosCompostos(-1000, 0.02, 10, $n));
    }

    public function testCalcularAmortizacao() {
        $calculadora = new CalculadoraFinanceira();
        
    }
}