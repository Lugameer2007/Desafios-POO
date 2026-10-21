<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Contato.php';

class ContatoTest extends TestCase {

    public function testExibirDados() {
        $contato = new Contato("Fernanda", "(71) 93467-8970", "fernanda.fernandes@gmail.com", "Colega");
        $dados = $contato->exibirDados();

        $this->assertEquals("Fernanda", $dados['nome']);
        $this->assertEquals("Colega", $dados['tipo']);
    }

    public function testMensagemPorTipo() {
        $Contato = new contato("Andreia", "(71) 92013-9056", "andreia.mendes@yahoo.com.br", "Profissional");
        $dados = $contato->exibirDados();

        $mensagem = match($dados['tipo']) {
            "Amigo" => "E um contato pessoal de amizade",
            "Colega" => "E um colega de estudos ou de trabalho",
            "Profissional" => "E um contato profissional",
             default. => "Tipo de contato nao definodo."
        };

        $this->assertEquals("E um contato profissional.", $mensagem);
    }
}
class Contato {
    public $nome;
    public $telefone;
    public $email;
    public $tipo;

    public function__construct ($nome, $telefone, $email, $tipo) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->tipo = $tipo;
    }

    //Metodo para exibir os dados do contato
    public function exibirDados() {
        return [
            "nome" => $this->nome,
            "telefone" => $this->telefone,
            "email" => $this->email,
            "tipo" => $this->tipo,
        ];
    }
}

//Lista de contas
$contas = [
    new Contato("Fernanda", "(71) 93467-8970", "fernanda.fernandes@gmail.com", "Amigo"),
    new Contato("Andreia", "(71) 92013-9056", "andreia.mendes@yahoo.com.br", "Colega"),
    new Contato("Leandro", "(71) 96078-8843", "leandro.medeiro@gmail.com", "Profissional"),
];

//Exibindo os contatos
foreach ($contatos as $contato) {
    $dados = $contato->exibirDados();
}

//Mensagem personalizada com match
$mensagem = match($dados['tipo']) {
    "Amigo" => "E um contato pessoal de amizade",
    "Colega" => "E um colega de estudos ou de trabalho",
    "Profissional" => "E um contato profissional",
    default. => "Tipo de contato nao definodo."
};

echo "Nome: {$dados['nome']} | Telefone: {$dados['telefone']} | Email: {$dados['email']} | Tipo: {$dados['tipo']}<br>";
echo "Mensagem: {$mensagem}<br><br>";

?>
