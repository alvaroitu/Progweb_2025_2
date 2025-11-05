<?php
require_once 'config.php';

try {
    // Tenta criar uma nova conexão
    $conexao = novaConexao();
    
    // Verifica se a conexão foi estabelecida
    if ($conexao->connect_errno) {
        throw new Exception("Falha na conexão: " . $conexao->connect_error);
    }
    
    // Tenta selecionar o banco de dados
    if (!$conexao->select_db('faculdade_db')) {
        throw new Exception("Banco de dados 'faculdade_db' não encontrado!");
    }
    
    // Testa se consegue fazer uma consulta simples na tabela alunos
    $sql = "SELECT 1 FROM alunos LIMIT 1";
    if (!$conexao->query($sql)) {
        throw new Exception("Erro ao acessar a tabela 'alunos': " . $conexao->error);
    }
    
    // Se chegou até aqui, está tudo funcionando
    echo "<h2 style='color: green;'>✓ Conexão estabelecida com sucesso!</h2>";
    echo "<p><strong>Servidor:</strong> " . $conexao->host_info . "</p>";
    echo "<p><strong>Versão do servidor:</strong> " . $conexao->server_info . "</p>";
    echo "<p><strong>Banco de dados:</strong> faculdade_db</p>";
    echo "<p><strong>Charset:</strong> " . $conexao->character_set_name() . "</p>";
    
    // Testa inserção
    $sql = "INSERT INTO alunos (nome, matricula, curso, periodo, status) 
            VALUES ('Teste Conexão', '12345', 'Sistemas de Informação', 1, 'Ativo')";
    if ($conexao->query($sql)) {
        echo "<p style='color: green;'>✓ Teste de inserção realizado com sucesso!</p>";
        
        // Recupera o ID inserido
        $id = $conexao->insert_id;
        
        // Testa atualização
        $sql = "UPDATE alunos SET nome = 'Teste Atualizado' WHERE id = $id";
        if ($conexao->query($sql)) {
            echo "<p style='color: green;'>✓ Teste de atualização realizado com sucesso!</p>";
        }
        
        // Testa exclusão
        $sql = "DELETE FROM alunos WHERE id = $id";
        if ($conexao->query($sql)) {
            echo "<p style='color: green;'>✓ Teste de exclusão realizado com sucesso!</p>";
        }
    }
    
} catch (Exception $e) {
    echo "<h2 style='color: red;'>✗ Erro na conexão!</h2>";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>";
}
?>