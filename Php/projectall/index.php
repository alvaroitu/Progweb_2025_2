<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Faculdade</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    // Inicializa variáveis
    $id = '';
    $nome = '';
    $matricula = '';
    $curso = '';
    $periodo = '';
    $status = '';

    // Se for edição, busca os dados do aluno
    if (isset($_GET['action']) && $_GET['action'] == 'editar' && isset($_GET['id'])) {
        require_once 'includes/config.php';
        $conexao = novaConexao();
        
        $id = $conexao->real_escape_string($_GET['id']);
        $sql = "SELECT * FROM alunos WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if ($aluno = $result->fetch_assoc()) {
            $nome = $aluno['nome'];
            $matricula = $aluno['matricula'];
            $curso = $aluno['curso'];
            $periodo = $aluno['periodo'];
            $status = $aluno['status'];
        }
    }
    ?>
    <div class="container">
        <h1>Sistema de Gerenciamento de Alunos</h1>
        
        <?php if(isset($_GET['message'])): ?>
        <div class="message">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
        <?php endif; ?>
        
        <!-- Formulário de Cadastro/Edição -->
        <div class="form-container">
            <h2><?php echo $id ? 'Editar Aluno' : 'Cadastrar Aluno'; ?></h2>
            <form action="includes/processar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="curso">Curso:</label>
                    <select name="curso" required>
                        <option value="">Selecione um curso</option>
                        <option value="Sistemas de Informação" <?php echo $curso == 'Sistemas de Informação' ? 'selected' : ''; ?>>
                            Sistemas de Informação
                        </option>
                        <option value="Engenharia de Software" <?php echo $curso == 'Engenharia de Software' ? 'selected' : ''; ?>>
                            Engenharia de Software
                        </option>
                        <option value="Ciência da Computação" <?php echo $curso == 'Ciência da Computação' ? 'selected' : ''; ?>>
                            Ciência da Computação
                        </option>
                        <option value="Análise de Sistemas" <?php echo $curso == 'Análise de Sistemas' ? 'selected' : ''; ?>>
                            Análise de Sistemas
                        </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="periodo">Período:</label>
                    <input type="number" name="periodo" value="<?php echo htmlspecialchars($periodo); ?>" min="1" max="10" required>
                </div>
                
                <div class="form-group">
                    <label>Status:</label>
                    <div class="radio-group">
                        <input type="radio" name="status" id="ativo" value="Ativo" 
                            <?php echo $status == 'Ativo' ? 'checked' : ''; ?> required>
                        <label for="ativo">Ativo</label>
                        
                        <input type="radio" name="status" id="inativo" value="Inativo"
                            <?php echo $status == 'Inativo' ? 'checked' : ''; ?>>
                        <label for="inativo">Inativo</label>
                        
                        <input type="radio" name="status" id="trancado" value="Trancado"
                            <?php echo $status == 'Trancado' ? 'checked' : ''; ?>>
                        <label for="trancado">Trancado</label>
                    </div>
                </div>
                
                <button type="submit" name="salvar">Salvar</button>
            </form>
        </div>

        <!-- Tabela de Alunos -->
        <div class="table-container">
            <h2>Lista de Alunos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Matrícula</th>
                        <th>Curso</th>
                        <th>Período</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'includes/config.php';
                    
                    $sql = "SELECT * FROM alunos ORDER BY nome";
                    $result = $conexao->query($sql);
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['matricula']}</td>";
                        echo "<td>{$row['curso']}</td>";
                        echo "<td>{$row['periodo']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td class='actions'>";
                        echo "<a href='?action=editar&id={$row['id']}'>Editar</a>";
                        echo "<a href='includes/processar.php?action=deletar&id={$row['id']}'>Excluir</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>