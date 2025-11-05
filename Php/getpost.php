<div class="titulo">$_GET_$_POST</div>

<form action="#" method="get">
    <input type="text" name="nome">
    <input type="text" name="sobrenome">
    <select name="estado">
        <option value="AC">Acre</option>
        <option value="BA">Bahia</option>
    </select>
    <button>Enviar</button>
</form>

<form action="#" method="post">
    <input type="text" name="nome">
    <input type="text" name="sobrenome">
    <select name="estado">
        <option value="AC">Acre</option>
        <option value="BA" selected>Bahia</option>
    </select>
    <button>Enviar</button>
</form>

<?php
print_r($_GET);
echo '<br>';
echo '<br>' . count($_GET);
echo '<br>' . $_GET['nome'];
echo '<br>';
echo '<br>';
print_r($_POST);
echo '<br>';
echo '<br>' . count($_POST);
echo '<br>' . $_POST['nome'];

$nomeDigitado = $_POST['nome'];
?>