<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Norris Jokes API</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="../image/chuck-norris.png" alt="Chuck Norris">
        </div>

        <h1>Chuck Norris Jokes</h1>

        <div style="text-align: center; margin-bottom: 20px;">
            <a href="listar.php" style="display: inline-block; padding: 10px 20px; background-color: #764ba2; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">📋 Minhas Piadas</a>
        </div>

        <!-- Formulário de Busca -->
        <div class="form-container ativo" id="formulario">
            <form id="formBusca">
                <div class="form-group">
                    <label for="nome">Seu Nome:</label>
                    <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Carregando categorias...</option>
                    </select>
                </div>

                <button type="submit">Obter Piada</button>
            </form>
        </div>

        <!-- Resultado -->
        <div class="resultado-container" id="resultado">
            <div class="resultado-info">
                <div class="info-item">
                    <div class="info-label">Usuário:</div>
                    <div class="info-valor" id="resultado-nome"></div>
                </div>

                <div class="info-item">
                    <div class="info-label">Categoria:</div>
                    <div class="info-valor" id="resultado-categoria"></div>
                </div>
            </div>

            <div class="piada" id="resultado-piada"></div>

            <button class="btn-nova-busca" onclick="novaBusca()">Nova Busca</button>
        </div>

        <div class="loading" id="loading" style="display: none;">
            Carregando... Por favor, aguarde!
        </div>

        <div class="error" id="erro" style="display: none;"></div>
    </div>

    <script>
        // Carrega as categorias quando a página abre
        document.addEventListener('DOMContentLoaded', function() {
            carregarCategorias();
        });

        // Função para carregar categorias
        function carregarCategorias() {
            fetch('includes/api.php?action=categorias')
                .then(response => response.json())
                .then(data => {
                    if (data.sucesso && data.categorias) {
                        preencherCategorias(data.categorias);
                    } else {
                        mostrarErro('Erro ao carregar categorias');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    mostrarErro('Erro ao conectar com a API');
                });
        }

        // Função para preencher o select com categorias
        function preencherCategorias(categorias) {
            const select = document.getElementById('categoria');
            select.innerHTML = '<option value="">Selecione uma categoria</option>';
            
            categorias.forEach(categoria => {
                const option = document.createElement('option');
                option.value = categoria;
                option.textContent = categoria.charAt(0).toUpperCase() + categoria.slice(1);
                select.appendChild(option);
            });
        }

        // Enviar formulário
        document.getElementById('formBusca').addEventListener('submit', function(e) {
            e.preventDefault();

            const nome = document.getElementById('nome').value;
            const categoria = document.getElementById('categoria').value;

            if (!nome || !categoria) {
                mostrarErro('Por favor, preencha todos os campos');
                return;
            }

            mostrarCarregando(true);

            // Fazer requisição para obter a piada
            const formData = new FormData();
            formData.append('action', 'obter_piada');
            formData.append('nome_usuario', nome);
            formData.append('categoria', categoria);

            fetch('includes/processar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                mostrarCarregando(false);
                
                if (data.sucesso) {
                    exibirResultado(data);
                } else {
                    mostrarErro(data.mensagem || 'Erro ao obter piada');
                }
            })
            .catch(error => {
                mostrarCarregando(false);
                console.error('Erro:', error);
                mostrarErro('Erro ao processar a requisição');
            });
        });

        // Função para exibir resultado
        function exibirResultado(data) {
            document.getElementById('resultado-nome').textContent = data.nome_usuario;
            document.getElementById('resultado-categoria').textContent = 
                data.categoria.charAt(0).toUpperCase() + data.categoria.slice(1);
            document.getElementById('resultado-piada').textContent = data.piada;

            document.getElementById('formulario').classList.remove('ativo');
            document.getElementById('resultado').classList.add('ativo');
            document.getElementById('erro').style.display = 'none';
        }

        // Função para nova busca
        function novaBusca() {
            document.getElementById('formulario').classList.add('ativo');
            document.getElementById('resultado').classList.remove('ativo');
            document.getElementById('nome').value = '';
            document.getElementById('categoria').value = '';
        }

        // Função para mostrar erro
        function mostrarErro(mensagem) {
            const erroDiv = document.getElementById('erro');
            erroDiv.textContent = mensagem;
            erroDiv.style.display = 'block';
        }

        // Função para mostrar carregando
        function mostrarCarregando(ativo) {
            document.getElementById('loading').style.display = ativo ? 'block' : 'none';
        }
    </script>
</body>
</html>