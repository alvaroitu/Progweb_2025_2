<?php
require_once 'conexao.php';

header('Content-Type: application/json');

$conexao = novaConexao();

$sql = "SELECT id, nome_usuario, categoria, piada, data_insercao FROM piadas_chuck ORDER BY data_insercao DESC";
$resultado = $conexao->query($sql);

if (!$resultado) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao consultar piadas']);
    exit();
}

$piadas = [];

while ($linha = $resultado->fetch_assoc()) {
    $piadas[] = $linha;
}

$conexao->close();

if (count($piadas) > 0) {
    echo json_encode(['sucesso' => true, 'piadas' => $piadas]);
} else {
    echo json_encode(['sucesso' => false, 'piadas' => []]);
}
?>