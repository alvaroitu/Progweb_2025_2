<?php
// Função para obter as categorias da API
function obterCategorias() {
    $url = 'https://api.chucknorris.io/jokes/categories';
    
    $contexto = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 10
        ]
    ]);
    
    $resposta = @file_get_contents($url, false, $contexto);
    
    if ($resposta === false) {
        return false;
    }
    
    $categorias = json_decode($resposta, true);
    return $categorias;
}

// Função para obter uma piada aleatória de uma categoria
function obterPiadaAleatoria($categoria) {
    $url = 'https://api.chucknorris.io/jokes/random?category=' . urlencode($categoria);
    
    $contexto = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 10
        ]
    ]);
    
    $resposta = @file_get_contents($url, false, $contexto);
    
    if ($resposta === false) {
        return false;
    }
    
    $piada = json_decode($resposta, true);
    return $piada;
}

// Função para salvar a piada no banco de dados
function salvarPiada($nome_usuario, $categoria, $piada, $created_at) {
    require_once 'conexao.php';
    $conexao = novaConexao();
    
    $sql = "INSERT INTO piadas_chuck (nome_usuario, categoria, piada, created_at) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome_usuario, $categoria, $piada, $created_at);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conexao->close();
        return true;
    } else {
        $stmt->close();
        $conexao->close();
        return false;
    }
}

// Se for uma requisição GET para obter categorias
if (isset($_GET['action']) && $_GET['action'] == 'categorias') {
    header('Content-Type: application/json');
    
    $categorias = obterCategorias();
    
    if ($categorias === false) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao obter categorias']);
    } else {
        echo json_encode(['sucesso' => true, 'categorias' => $categorias]);
    }
    exit();
}
?>