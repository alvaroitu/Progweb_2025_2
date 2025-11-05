<?php
function novaConexao($banco = 'faculdade_db') {
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = '';

    try {
        // Primeiro, conecta sem especificar o banco para criá-lo se não existir
        $conexao = new mysqli($servidor, $usuario, $senha);

        if($conexao->connect_error) {
            die('Erro de conexão: ' . $conexao->connect_error);
        }

        // Cria o banco de dados se não existir
        $conexao->query("CREATE DATABASE IF NOT EXISTS $banco");
        
        // Conecta ao banco de dados
        $conexao = new mysqli($servidor, $usuario, $senha, $banco);
        
        // Cria a tabela se não existir
        $sql = "CREATE TABLE IF NOT EXISTS alunos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            matricula VARCHAR(20) NOT NULL,
            curso VARCHAR(50) NOT NULL,
            periodo INT NOT NULL,
            status VARCHAR(20) NOT NULL
        )";
        
        $conexao->query($sql);

        return $conexao;
    } catch(Exception $e) {
        die('Erro: ' . $e->getMessage());
    }
}

// Cria a conexão global
$conexao = novaConexao();
?>