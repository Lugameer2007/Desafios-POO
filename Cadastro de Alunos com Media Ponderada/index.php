<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Aluno com Media Ponderada</title>
</head>
<body>
    <h2>Cadastro de Aluno</h2>
    <form method="post">
        <input type="text" name="nome" required><br><br>
        <input type="number" name="idade" required><br><br>
        <input type="text" name="matricula" required><br><br>

        Nota 1: <input type="number" step="0.01" name="nota[]">
        Peso 1: <input type="number" step="0.01" name="peso[]"><br><br>

        Nota 2: <input type="number" step="0.01" name="nota[]">
        Peso 2: <input type="number" step="0.01" name="peso[]"><br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <h2>Lista de Alunos</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>matricula</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Media</th>
            <th>Status</th>
        </tr>
        <?php foreach ($_SESSION['alunos'] as $aluno): ?>
            <? $dados = $aluno->exibirDados(); ?>
            <tr>
                <td><?= htmlspecialchars($dados['nome']) ?></td>
                <td><?= htmlspecialchars($dados['idade']) ?></td>
                <td><?= htmlspecialchars($dados['matricula']) ?></td>
                <td><?= htmlspecialchars($dados['nota1']) ?></td>
                <td><?= htmlspecialchars($dados['nota2']) ?></td>
                <td><?= $dados['media'] ?></td>
                <td><?= $dados['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
