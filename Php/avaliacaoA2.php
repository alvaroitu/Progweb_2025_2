<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Média</title>
</head>
<body>
    <h2>Título : ALUNO APROVADO OU NÃO ???</h2>
    <p> Aluno: Alvaro Pereira - RGM: 244466666</p>
    <p> Aluno: Alvaro Pereira - RGM: 244466666</p>

    <h3>Cálculo Média</h3>

    <!-- EXERCICIO PARA VERIFICAR SE O ALUNO PASSOU OU NÃO DE SEMESTRE -->

<form action="#" method="post">
    <div>
        <label for="nota1">Nota 01: </label>
        <input type="number" name="nota1" value="" step="0.5" required>
    </div>
    <br>
    <div>
        <label for="nota2">Nota 02: </label>
        <input type="number" name="nota2" value="" step="0.5" required>
    </div>
    <br>
    <div>
        <label for="nota3">Nota 03: </label>
        <input type="number" name="nota3" value="" step="0.5" required>
    </div>
    <br>
    <div>
        <label for="frequencia">Frequencia maior ou igual a 75%: </label>
        <select name="frequencia" id="t2">
            <option value="S">SIM</option>
            <option value="N">NÃO</option>
        </select>
    </div>
    <br>
    <button type="submit" name="calculomedia">Executar</button>
    <br>
</form>

<?php
echo "<br>";
if (isset($_POST['calculomedia'])) {
    // Captura as respostas do formulário
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    $frequencia = $_POST['frequencia'];

    // Exibe as respostas
    echo "Nota 01: " . $nota1 . "<br> <br>";
    echo "Nota 02: " . $nota2 . "<br> <br>";
    echo "Nota 03: " . $nota3 . "<br> <br>";


    $media = ($nota1 + $nota2 + $nota3 ) / 3;

    echo "Media: " . number_format($media, 2, ',', '.') . "<br>";
    echo "<br>";
    echo "Frequência maior ou igual a 75%: " . $frequencia . "<br>";
    echo "<br>";

    // Verifica se o aluno passou de semestre
    if ($media >= 6 && $frequencia === "S") {
        ?>
        <p id="passou">"O aluno APROVADO."</p>
        <?php
    } else {
        ?>
        <p id="naopassou">"O aluno REPROVADO."</p>
        <?php
    }
}

// $var = 1; $var2 = 1; $VAR3 = 1; $_var_4 = 1; $5var = 1;

$condicao = false;
if ($condicao) {
    echo "Passo A <br>";
} elseif ($condicao) {
    echo "Passo B <br>";
} elseif ($condicao) {
    echo "Passo C <br>";
} elseif (!$condicao) {
    echo "Passo D <br>";
} elseif ($condicao) {
    echo "Passo E <br>";
} else {
    echo "Úlitmo Passo<br>";
}

?>

</body>
</html>

