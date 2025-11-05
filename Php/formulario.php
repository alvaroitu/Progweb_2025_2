<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- FORMULA NOME E SOBRENOME -->

<form action="#" method="post">
    <div>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" value="">
    </div>
    <div>
        <label for="sobrenome">Sobrenome: </label>
        <input type="text" name="sobrenome" value="">
    </div>
    <br>
    <button type="submit" name="nomesobrenome">Executar</button>
    <br>
</form>

<?php
if (isset($_POST['nomesobrenome'])) {
    echo $_POST['nome'] . "<br>";
    echo $_POST['sobrenome'] . "<br>";
}
?>

<!-- FORMULA NUMEROS -->
<br>
<form action="#" method="post">
    <div>
        <label for="numero1">Numero 1: </label>
        <input type="text" name="numero1" value="">
    </div>
    <div>
        <label for="numero2">Numero 2: </label>
        <input type="text" name="numero2" value="">
    </div>
    <br>
    <button type="submit" name="numeros">Executar</button>
</form>

<?php
if (isset($_POST['numeros'])) {
    echo $_POST['numero1'] . "<br>";
    echo $_POST['numero2'] . "<br>";
    echo $_POST['numero1'] + $_POST['numero2'];
}
?>
<br>

<!-- FORMULARIO DE SELEÇÃO -->

<form action="#" method="post">
    <div>
        <label for="t1">Nota maior Igual a 6: </label>
        <select name="t1" id="t1">
            <option value="S" selected>SIM</option>
            <option value="N">NÃO</option>
        </select>
    </div>
    <div>
        <label for="t2">Frequencia maior 75%: </label>
        <select name="t2" id="t2">
            <option value="S">SIM</option>
            <option value="N" selected>NÃO</option>
        </select>
    </div>
    <br>
    <button type="submit" name="media">Executar</button>
</form>

<?php
if (isset($_POST['media'])) {
    echo $_POST['t1'] . "<br>";
    echo $_POST['t2'] . "<br>";
}
?>
<br>
<!-- FORMULARIO COM CHECKBOXES DE CORES -->

<form action="#" method="post">
    <div>
        <label>Selecione suas cores favoritas:</label><br>
        <input type="checkbox" name="cores1" value="vermelho"> Vermelho<br>
        <input type="checkbox" name="cores2" value="verde"> Verde<br>
        <input type="checkbox" name="cores3" value="azul"> Azul<br>
    </div>
    <br>
    <button type="submit" name="submit_cores">Executar</button>
</form>

<?php
// Verifica se o formulário das cores foi enviado
if (isset($_POST['submit_cores'])) {
    if (isset($_POST['cores1'])) echo $_POST['cores1'] . "<br>";
    if (isset($_POST['cores2'])) echo $_POST['cores2'] . "<br>";
    if (isset($_POST['cores3'])) echo $_POST['cores3'] . "<br>";
}
?>
<br>
<!-- FORMULARIO COM RADIOBUTTON DE GÊNERO -->

<form action="#" method="post">
    <div>
        <label>Selecione seu gênero:</label><br>
        <input type="radio" name="genero" value="masculino"> Masculino<br>
        <input type="radio" name="genero" value="feminino"> Feminino<br>
    </div>
    <br>
    <button type="submit" name="submit_genero">Executar</button>
</form>

<?php
// Verifica se o formulário de gênero foi enviado
if (isset($_POST['submit_genero'])) {
    echo $_POST['genero'] . "<br>";
}
?>

<br><br><br>
<hr>

<!-- EXERCICIO PARA VERIFICAR SE O ALUNO PASSOU OU NÃO DE SEMESTRE -->

<form action="#" method="post">
    <div>
        <label for="nota">Nota maior Igual a 6: </label>
        <select name="nota" id="t1">
            <option value="S">SIM</option>
            <option value="N">NÃO</option>
        </select>
    </div>
    <div>
        <label for="frequencia">Frequencia maior 75%: </label>
        <select name="frequencia" id="t2">
            <option value="S">SIM</option>
            <option value="N">NÃO</option>
        </select>
    </div>
    <br>
    <button type="submit" name="calculomedia">Executar</button>
</form>

<?php
if (isset($_POST['calculomedia'])) {
    // Captura as respostas do formulário
    $nota = $_POST['nota'];
    $frequencia = $_POST['frequencia'];

    // Exibe as respostas
    echo "Nota maior ou igual a 6: " . $nota . "<br>";
    echo "Frequência maior que 75%: " . $frequencia . "<br>";

    // Verifica se o aluno passou de semestre
    if ($nota === "S" && $frequencia === "S") {
        echo "O aluno passou de semestre.";
    } else {
        echo "O aluno não passou de semestre.";
    }
}
?>

    
</body>
</html>



