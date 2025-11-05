<?php
include("../bancoDados/conexao.php");

$conexao = novaConexao();

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conexao->query($sql) === TRUE) {
    header("Location: index.html");
} else {
    echo "Erro: " . $conexao->error;
}
?>
