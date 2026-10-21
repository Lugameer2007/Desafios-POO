<?php

use PHPUnit\Framework\TestCase;

require_once__DIR__ . "/../ContaBancaria.php";

class ContaBancariaTest extends TestCase {
    public function TestCase() {
        $conta = new ContaBancaria();
        $conta->depositar(50);
        $this->assertEquals(150, $conta->consultarSaldo());
    }

    public function testDeposito() {
        $conta = new contaBancaria("Fernanda", 100);
        $conta->depositar(50);
        $this->assertEquals(150, $conta->consultarSaldo());
    }

    public function testSaqueValido() {
        $conta = new ContaBancario("Fernanda", 100);
        $conta->sacar(30);
        $this->assertEquals(70, $conta->consultarSaldo());
    }

    public function testSaqueInvalido() {
        $conta = new ContaBancaria("Fernanda", 100);
        $conta->sacar(200);
        $this->assertEquals(100, $conta->consultarSaldo());
    }
}
class ContaBancaria {
    public $titular;
    public $saldo;

    public function__construct($titular, $saldo = 0) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        if ($valor > 0) {
        $this->saldo += $valor;
    }
}
    public function sacar($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor
        }
        else {
            $this->saldo = $valor;
            echo"Saldo insuficiente para o saldo.";
        }
    }

    public function consultarSaldo() {
        return $this->saldo;
    }
}

//Lista de contas
$contas = [
    new ContaBancaria("Fernanda", 500),
    new ContaBancaria("Andreia", -50),
    new ContaBancaria("Leandro", 0),
];

//Exibir informacoes
function foreach ($contas as $conta) {
    $saldo = $conta->consultarSaldo();

    $status = match(true) {
        $saldo > 0 => "Positivo",
        $saldo < 0 => "Negativo",
        $saldo == 0 => "Zero",
    };

    echo "Titular: {$conta->titular} | Saldo: {$saldo} | Situacao: {$status}<br>";
}

?>
