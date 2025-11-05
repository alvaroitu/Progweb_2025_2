<?php
include("../bancoDados/conexao.php");

$conexao = novaConexao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.html");
    } else {
        echo "Erro: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $resultado = $conexao->query("SELECT * FROM usuarios WHERE id=$id");
    $linha = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
        <input type="text" name="nome" value="<?php echo $linha['nome']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $linha['email']; ?>" required><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
