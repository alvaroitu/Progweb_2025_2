<?php
require_once 'config.php';

// Function to validate input data
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Create and Update operations
if (isset($_POST['salvar'])) {
    $id = isset($_POST['id']) ? validateInput($_POST['id']) : null;
    $nome = validateInput($_POST['nome']);
    $matricula = validateInput($_POST['matricula']);
    $curso = validateInput($_POST['curso']);
    $periodo = validateInput($_POST['periodo']);
    $status = validateInput($_POST['status']);

    try {
        $conexao = novaConexao();
        
        if ($id && !empty($id)) {
            // Update
            $sql = "UPDATE alunos SET nome = ?, matricula = ?, curso = ?, periodo = ?, status = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssisi", $nome, $matricula, $curso, $periodo, $status, $id);
        } else {
            // Insert
            $sql = "INSERT INTO alunos (nome, matricula, curso, periodo, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssis", $nome, $matricula, $curso, $periodo, $status);
        }

        // Execute a query
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = $id ? "Aluno atualizado com sucesso!" : "Aluno cadastrado com sucesso!";
            } else {
                $message = "Nenhuma alteração realizada.";
            }
        } else {
            throw new Exception("Erro ao executar a operação: " . $stmt->error);
        }

        header("Location: ../index.php?message=" . urlencode($message));
        exit();
    } catch (Exception $e) {
        header("Location: ../index.php?message=" . urlencode("Erro: " . $e->getMessage()));
        exit();
    }
}

// Delete operation
if (isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['id'])) {
    $id = validateInput($_GET['id']);

    try {
        $conexao = novaConexao();
        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = "Aluno excluído com sucesso!";
            } else {
                $message = "Aluno não encontrado.";
            }
        } else {
            throw new Exception("Erro ao excluir: " . $stmt->error);
        }
        
        header("Location: ../index.php?message=" . urlencode($message));
        exit();
    } catch (Exception $e) {
        header("Location: ../index.php?message=" . urlencode("Erro: " . $e->getMessage()));
        exit();
    }
}

// Get student data for editing
if (isset($_GET['action']) && $_GET['action'] == 'get' && isset($_GET['id'])) {
    $id = validateInput($_GET['id']);

    try {
        $conexao = novaConexao();
        $sql = "SELECT * FROM alunos WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $aluno = $result->fetch_assoc();
            
            header('Content-Type: application/json');
            if ($aluno) {
                echo json_encode($aluno);
            } else {
                echo json_encode(['error' => 'Aluno não encontrado']);
            }
        } else {
            throw new Exception("Erro ao buscar aluno: " . $stmt->error);
        }
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit();
}
?>
        // If ID exists, update the record
        if ($id) {
            $sql = "UPDATE alunos SET nome = ?, matricula = ?, curso = ?, periodo = ?, status = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssisi", $nome, $matricula, $curso, $periodo, $status, $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                $message = "Aluno atualizado com sucesso!";
            } else {
                $message = "Nenhuma alteração realizada.";
            }
        } 
        // If no ID, create new record
        else {
            $sql = "INSERT INTO alunos (nome, matricula, curso, periodo, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssis", $nome, $matricula, $curso, $periodo, $status);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                $message = "Aluno cadastrado com sucesso!";
            } else {
                $message = "Erro ao cadastrar aluno.";
            }
        }

        header("Location: ../index.php?message=" . urlencode($message));
        exit();
    } catch(Exception $e) {
        die("Erro: " . $e->getMessage());
    }
}

// Delete operation
if (isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['id'])) {
    $id = validateInput($_GET['id']);

    try {
        global $conexao;
        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        header("Location: ../index.php?message=" . urlencode("Aluno excluído com sucesso!"));
        exit();
    } catch(Exception $e) {
        die("Erro ao excluir: " . $e->getMessage());
    }
}

// Get student data for editing
if (isset($_GET['action']) && $_GET['action'] == 'get' && isset($_GET['id'])) {
    $id = validateInput($_GET['id']);

    try {
        global $conexao;
        $sql = "SELECT * FROM alunos WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $aluno = $result->fetch_assoc();
        
        if ($aluno) {
            header('Content-Type: application/json');
            echo json_encode($aluno);
        } else {
            echo json_encode(['error' => 'Aluno não encontrado']);
        }
        exit();
    } catch(Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
        exit();
    }
}
?>