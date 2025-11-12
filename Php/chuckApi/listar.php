<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Piadas - Chuck Norris</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .lista-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .voltar-btn {
            margin-bottom: 20px;
            background-color: #667eea;
        }

        .voltar-btn:hover {
            background-color: #764ba2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #667eea;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .piada-coluna {
            max-width: 300px;
            word-wrap: break-word;
        }

        .acoes {
            display: flex;
            gap: 10px;
        }

        .btn-editar, .btn-deletar {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-editar {
            background-color: #4CAF50;
            color: white;
        }

        .btn-editar:hover {
            background-color: #45a049;
        }

        .btn-deletar {
            background-color: #f44336;
            color: white;
        }

        .btn-deletar:hover {
            background-color: #da190b;
        }

        .vazio {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal.ativo {
            display: block;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .modal-buttons button {
            flex: 1;
        }

        .btn-cancelar {
            background-color: #999;
        }

        .btn-cancelar:hover {
            background-color: #777;
        }

        #formEditar button[type="submit"],
        #formEditar button[type="button"] {
            padding: 10px 20px !important;
            font-size: 16px !important;
            font-weight: bold !important;
            width: auto !important;
        }

        #formEditar button[type="submit"] {
            background-color: #4CAF50 !important;
            color: white !important;
        }

        #formEditar button[type="submit"]:hover {
            background-color: #45a049 !important;
        }

        #formEditar button[type="button"] {
            background-color: #999 !important;
            color: white !important;
        }

        #formEditar button[type="button"]:hover {
            background-color: #777 !important;
        }
    </style>
</head>
<body>
    <div class="container lista-container">
        <div class="logo">
            <img src="../image/chuck-norris.png" alt="Chuck Norris">
        </div>

        <h1>Minhas Piadas</h1>

        <button class="voltar-btn" onclick="window.location.href='index.php'">← Voltar</button>

        <table id="tabelaPiadas">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Piada</th>
                    <th>Data de Inserção</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="corpo-tabela">
                <tr class="vazio">
                    <td colspan="5">Carregando...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal para editar -->
    <div id="modalEditar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2>Editar Piada</h2>
            <form id="formEditar">
                <input type="hidden" id="editId">
                <input type="hidden" id="editCategoria">
                <input type="hidden" id="editPiada">
                
                <div class="form-group">
                    <label for="editNome">Nome:</label>
                    <input type="text" id="editNome" required>
                </div>

                <div class="modal-buttons">
                    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Salvar Alterações</button>
                    <button type="button" class="btn-cancelar" onclick="fecharModal()" style="background-color: #999; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Carrega as piadas quando a página abre
        document.addEventListener('DOMContentLoaded', function() {
            carregarPiadas();
        });

        // Função para carregar piadas
        function carregarPiadas() {
            fetch('includes/listar.php')
                .then(response => response.json())
                .then(data => {
                    if (data.sucesso) {
                        preencherTabela(data.piadas);
                    } else {
                        mostrarVazio();
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    mostrarVazio();
                });
        }

        // Função para preencher a tabela
        function preencherTabela(piadas) {
            const corpo = document.getElementById('corpo-tabela');
            
            if (piadas.length === 0) {
                mostrarVazio();
                return;
            }

            corpo.innerHTML = '';

            piadas.forEach(piada => {
                const data = new Date(piada.data_insercao);
                const dataFormatada = data.toLocaleDateString('pt-BR') + ' ' + 
                                     data.toLocaleTimeString('pt-BR', { 
                                         hour: '2-digit', 
                                         minute: '2-digit' 
                                     });

                const linha = `
                    <tr>
                        <td>${piada.nome_usuario}</td>
                        <td>${piada.categoria}</td>
                        <td class="piada-coluna">${piada.piada}</td>
                        <td>${dataFormatada}</td>
                        <td class="acoes">
                            <button class="btn-editar" onclick="abrirModalEditar(${piada.id}, '${piada.nome_usuario.replace(/'/g, "\\'")}', '${piada.categoria.replace(/'/g, "\\'")}', '${piada.piada.replace(/'/g, "\\'").replace(/\n/g, "\\n")}')">Editar</button>
                            <button class="btn-deletar" onclick="deletarPiada(${piada.id})">Deletar</button>
                        </td>
                    </tr>
                `;
                corpo.innerHTML += linha;
            });
        }

        // Função para mostrar vazio
        function mostrarVazio() {
            const corpo = document.getElementById('corpo-tabela');
            corpo.innerHTML = '<tr class="vazio"><td colspan="5">Nenhuma piada encontrada</td></tr>';
        }

        // Função para abrir modal de edição
        function abrirModalEditar(id, nome, categoria, piada) {
            document.getElementById('editId').value = id;
            document.getElementById('editNome').value = nome;
            document.getElementById('editCategoria').value = categoria;
            document.getElementById('editPiada').value = piada;
            document.getElementById('modalEditar').classList.add('ativo');
        }

        // Função para fechar modal
        function fecharModal() {
            document.getElementById('modalEditar').classList.remove('ativo');
        }

        // Enviar formulário de edição
        document.getElementById('formEditar').addEventListener('submit', function(e) {
            e.preventDefault();

            const id = document.getElementById('editId').value;
            const nome = document.getElementById('editNome').value;
            const categoria = document.getElementById('editCategoria').value;
            const piada = document.getElementById('editPiada').value;

            const formData = new FormData();
            formData.append('action', 'editar');
            formData.append('id', id);
            formData.append('nome_usuario', nome);
            formData.append('categoria', categoria);
            formData.append('piada', piada);

            fetch('includes/processar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.sucesso) {
                    alert('Piada atualizada com sucesso!');
                    fecharModal();
                    carregarPiadas();
                } else {
                    alert('Erro ao atualizar: ' + (data.mensagem || 'Erro desconhecido'));
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao processar a requisição');
            });
        });

        // Função para deletar piada
        function deletarPiada(id) {
            if (confirm('Tem certeza que deseja deletar esta piada?')) {
                const formData = new FormData();
                formData.append('action', 'deletar');
                formData.append('id', id);

                fetch('includes/processar.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.sucesso) {
                        alert('Piada deletada com sucesso!');
                        carregarPiadas();
                    } else {
                        alert('Erro ao deletar: ' + (data.mensagem || 'Erro desconhecido'));
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao processar a requisição');
                });
            }
        }

        // Fechar modal ao clicar fora dele
        window.onclick = function(event) {
            const modal = document.getElementById('modalEditar');
            if (event.target == modal) {
                fecharModal();
            }
        }
    </script>
</body>
</html>