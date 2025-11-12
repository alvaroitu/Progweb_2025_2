<?php
require_once 'conexao.php';
require_once 'api.php';

header('Content-Type: application/json');

// Se for para obter uma piada
if (isset($_POST['action']) && $_POST['action'] == 'obter_piada') {
    $nome_usuario = trim($_POST['nome_usuario']);
    $categoria = trim($_POST['categoria']);
    
    if (empty($nome_usuario) || empty($categoria)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Nome e categoria são obrigatórios']);
        exit();
    }
    
    // Obtém a piada da API
    $piada_dados = obterPiadaAleatoria($categoria);
    
    if ($piada_dados === false) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao obter piada da API']);
        exit();
    }
    
    // Extrai os dados da piada
    $piada_texto = $piada_dados['value'];
    $created_at = $piada_dados['created_at'];
    
    // Salva no banco de dados
    if (salvarPiada($nome_usuario, $categoria, $piada_texto, $created_at)) {
        echo json_encode([
            'sucesso' => true,
            'nome_usuario' => $nome_usuario,
            'categoria' => $categoria,
            'piada' => $piada_texto,
            'created_at' => $created_at
        ]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao salvar piada no banco']);
    }
    exit();
}

// Se for para editar uma piada
if (isset($_POST['action']) && $_POST['action'] == 'editar') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nome_usuario = trim($_POST['nome_usuario']);
    $categoria = trim($_POST['categoria']);
    $piada = trim($_POST['piada']);
    
    if (!$id || empty($nome_usuario) || empty($categoria) || empty($piada)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Dados incompletos']);
        exit();
    }
    
    $conexao = novaConexao();
    
    $sql = "UPDATE piadas_chuck SET nome_usuario = ?, categoria = ?, piada = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    
    if (!$stmt) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao preparar query']);
        exit();
    }
    
    $stmt->bind_param("sssi", $nome_usuario, $categoria, $piada, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Piada atualizada com sucesso']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao atualizar piada']);
    }
    
    $stmt->close();
    $conexao->close();
    exit();
}

// Se for para deletar uma piada
if (isset($_POST['action']) && $_POST['action'] == 'deletar') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    
    if (!$id) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'ID inválido']);
        exit();
    }
    
    $conexao = novaConexao();
    
    $sql = "DELETE FROM piadas_chuck WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    
    if (!$stmt) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao preparar query']);
        exit();
    }
    
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['sucesso' => true, 'mensagem' => 'Piada deletada com sucesso']);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Piada não encontrada']);
        }
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao deletar piada']);
    }
    
    $stmt->close();
    $conexao->close();
    exit();
}
?>