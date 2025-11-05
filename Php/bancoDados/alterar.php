<div class="titulo">Atualizar Registro</div>

<?php

require_once "conexao.php";

$sql = "UPDATE cadastro
SET nome = 'Maria Jose', nascimento = '2000-02-29'
WHERE id = 4";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();

?>
