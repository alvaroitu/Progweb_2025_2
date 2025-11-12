<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Equação do Segundo Grau</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>⚡ Equação do 2º Grau</h1>
        <p class="subtitle">Calcule as raízes utilizando a fórmula de Bhaskara</p>

        <div class="formula">
            <strong>Fórmula:</strong> ax² + bx + c = 0<br>
            <strong>Discriminante (Δ):</strong> b² - 4ac<br>
            <strong>Raízes:</strong> x = (-b ± √Δ) / 2a
        </div>

        <form method="POST">
            <div class="form-group">
                <label for="a"><span>a =</span>Coeficiente A (diferente de zero):</label>
                <input type="number" id="a" name="a" step="0.01" required placeholder="Ex: 1">
            </div>

            <div class="form-group">
                <label for="b"><span>b =</span>Coeficiente B:</label>
                <input type="number" id="b" name="b" step="0.01" required placeholder="Ex: 3">
            </div>

            <div class="form-group">
                <label for="c"><span>c =</span>Coeficiente C:</label>
                <input type="number" id="c" name="c" step="0.01" required placeholder="Ex: -4">
            </div>

            <button type="submit">Calcular Raízes</button>
        </form>

        <!-- Exibir mensagem de erro se houver -->
        <?php if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])): ?>
            <?php
                $a = (float) $_POST['a'];
                $b = (float) $_POST['b'];
                $c = (float) $_POST['c'];

                // Validar se a é diferente de zero
                if ($a == 0) {
                    $erro = true;
                    $mensagem_erro = "⚠️ O coeficiente 'a' não pode ser zero! Isto não é uma equação do segundo grau.";
                } else {
                    $erro = false;

                    // Calcular o discriminante (delta)
                    $delta = pow($b, 2) - 4 * $a * $c;

                    // Calcular as raízes
                    if ($delta > 0) {
                        $raiz_delta = sqrt($delta);
                        $x1 = (-$b + $raiz_delta) / (2 * $a);
                        $x2 = (-$b - $raiz_delta) / (2 * $a);
                        
                        $tipo_resultado = "duas raízes reais e diferentes";
                        $x1_formatado = number_format($x1, 2, ',', '.');
                        $x2_formatado = number_format($x2, 2, ',', '.');
                    } elseif ($delta == 0) {
                        $x = -$b / (2 * $a);
                        $tipo_resultado = "duas raízes reais e iguais";
                        $x1_formatado = number_format($x, 2, ',', '.');
                        $x2_formatado = $x1_formatado;
                    } else {
                        $tipo_resultado = "nenhuma raiz real";
                        $x1_formatado = "N/A";
                        $x2_formatado = "N/A";
                    }

                    $delta_formatado = number_format($delta, 2, ',', '.');
                }
            ?>

            <div class="erro <?php echo $erro ? 'ativo' : ''; ?>">
                <?php if ($erro) echo $mensagem_erro; ?>
            </div>

            <?php if (!$erro): ?>
            <div class="resultado ativo">
                <h2>📊 Resultados:</h2>

                <div class="resultado-item resultado-delta">
                    <span class="resultado-label">Discriminante (Δ):</span>
                    <span class="resultado-valor"><?php echo $delta_formatado; ?></span>
                </div>

                <div class="resultado-item resultado-raizes">
                    <span class="resultado-label">Tipo de raízes:</span>
                    <span class="resultado-valor"><?php echo ucfirst($tipo_resultado); ?></span>
                </div>

                <div class="resultado-item">
                    <span class="resultado-label">x₁ =</span>
                    <span class="resultado-valor"><?php echo $x1_formatado; ?></span>
                </div>

                <div class="resultado-item">
                    <span class="resultado-label">x₂ =</span>
                    <span class="resultado-valor"><?php echo $x2_formatado; ?></span>
                </div>

                <?php if ($delta < 0): ?>
                <div class="resultado-mensagem">
                    <strong>⚠️ Atenção:</strong> O discriminante é negativo (Δ &lt; 0), portanto a equação não possui raízes reais. As raízes são complexas/imaginárias.
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>