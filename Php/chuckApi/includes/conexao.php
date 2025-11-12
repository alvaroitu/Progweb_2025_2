<?php
function novaConexao($banco = 'progweb_php') {
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = '';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error) {
        die('Erro: ' . $conexao->connect_error);
    }

    return $conexao;
}

// Cria a tabela de piadas se não existir
$conexao = novaConexao();

$sql = "CREATE TABLE IF NOT EXISTS piadas_chuck (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    piada TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    data_insercao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conexao->query($sql);
$conexao->close();
?>