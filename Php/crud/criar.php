<?php
include("../bancoDados/conexao.php");

require_once __DIR__ . "/../bancoDados/conexao.php";

$sql = 'CREATE DATABASE IF NOT EXISTS progweb_php';

$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "INSERT INTO usuarios (nome, email) 
VALUES ('$nome', '$email')";

$conexao = novaConexao();


if ($conexao->query($sql) === TRUE) {
    header("Location: index.html");
} else {
    echo "Erro: " . $conexao->error;
}
?>
