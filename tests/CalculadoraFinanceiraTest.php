<?php

use PHPUnit\Framework\TestCase;

class CalculadoraFinanceiraTest extends TestCase{
    # Inicio base
    public function testCalcularJurosSimples() {
        $calc = new CalculadoraFinanceira();
        $this->assertEquals(200, $calc->calcularJurosSimples(1000, 0.02, 10));
        $this->assertEquals(0, $calc->calcularJurosSimples(0, 0.02, 10));
        $this->assertEquals(-200, $calc->calcularJurosSimples(-1000, 0.02, 10));
    }

    public function testCalcularJurosCompostos() {
        $calc = new CalculadoraFinanceira();
        $this->assertEquals(121.8994419992, $calc->calcularJurosCompostos(1000, 0.02, 10), '', 0.0001);
        $this->assertEquals(0, $calc->calcularJurosCompostos(0, 0.02, 10), '', 0.0001);
        $this->assertEquals(-121.8994419992, $calc->calcularJurosCompostos(-1000, 0.02, 10), '', 0.0001);
    }

    public function testCalcularAmortizacao() {
        $calc = new CalculadoraFinanceira();
        // Testes para o método calcularAmortizacao
    }
    # Fim base
}