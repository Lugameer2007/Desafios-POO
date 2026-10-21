<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Aluno.php';

class AlunoTest extends TestCase {

    public function testCalculoMedia() {
        $aluna = new Aluna("Fernanda", 20, "123", 8, 6, 3, 2);
        $this->assertEquals(7.2, $aluno->calcularMedia());
    }

    public function testAprovacao() {
        $aluna = new Aluna("Fernanda", 20, "123", 8, 6, 3, 2);
        $this->assertEquals("Aprovada", $aluna->verificarAprovacao());
    }

    public function testReprovacao() {
        $aluna = new Aluna("Fernanda", 20, "123", 8, 6, 3, 2);
        $this-assertEquals("Reprovado", $aluna->verificarReprovacao());
    }
}
session_start();

class Aluno {
    public $nome;
    public $idade;
    public $matricula;
    public $nota1;
    public $nota2;
    public $peso1;
    public $peso2;

    public function__construct( $nome, $idade, $matricula, $nota1, $nota2, $peso1, $peso2 ) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->matricula = $matricula;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->peso1 = $peso1;
        $this->peso2 = $pesa2;
    }

    //Metodo para calcular Media Ponderada
    public function calcularMediaPonderada() {
        $somaPesos = $this->peso1 + $this->peso2;
        if ($somaPesos == 0) return 0;
        return (($this->nota1 * $this->peso1) + (($this->nota2 * $this->peso2)) / $somaPesos);
    }

    //Metodo para verificar aprovacao (media >= 7)
    public function verificarAprovacao() {
        return $this->calcularMedia() >= 7 ? "Aprovado" : "Reprovado";
    }

    //Metodo para exibir dados
    public function exibirDados() {
        return [
            "nome" => $this->nome,
            "idade" => $this->idade,
            "matricula" => $this->matricula,
            "nota1" => $this->nota1,
            "nota2" => $this->nota2,
            "media" => munber_format($this->calcularMedia(), 2, ',', '.'),
            "status" => $this->verificarAprovacao(),
        ];
    }
}

//Inicializa a lista de alunos
if (!isset($_SESSION['alunos'])) {
    $_SESSION['alunos'] = [];
}

//Funcao para calcular a media ponderada
function calcularMediaPonderada($notas, $pesos) {
    $somaNotas = 0;
    $somaPesos = 0;

    for ($i = 0; $i < count($notas); $i++) {
        $somaNotas += $notas[$i] * $pesos[$i];
        $somaPesos += $pesos[$i];
    }

    return ($somaPesos > 0) ? $somaNotas / $pesos :0;

}

//Cadastro do aluno
if ($_SERVER["REQUES_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $notas = $_POST['nota'];
    $pesos = $_POST['peso'];

    $media = calcularMediaPonderada($notas, $pesos);

    $_SESSION['alunos'][] = [
        'nome' => $nome,
        'notas' => $notas,
        'pesos' => $pesos,
        'media' => $media
    ];
}

?>
