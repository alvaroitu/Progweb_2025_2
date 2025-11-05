<?php
require_once __DIR__ . "/../bancoDados/conexao.php";

$conexao = novaConexao();

$resultado = $conexao->query("SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Usuários</h1>

    <table class="tabela-usuarios">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php while ($linha = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['email'] ?></td>
                <td>
                    <a class="btn editar" href="editar.php?id=<?= $linha['id'] ?>">Editar</a>
                    <a class="btn excluir" href="excluir.php?id=<?= $linha['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="index.html" class="btn voltar">⬅ Voltar</a>
</body>
</html>
