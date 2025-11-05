<div class="titulo">Criar Banco</div>

<?php

require_once "conexao.php";

$conexao = novaConexao(null);
// $sql = 'CREATE DATABASE progweb_php';
$sql = 'CREATE DATABASE IF NOT EXISTS progweb_php';

$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();