<div class="titulo">Argumentos & Retorno</div>

<?php
echo "<br>";
function imprimirMensagens() {
    echo "Olá! ";
    echo "Até a próxima!<br>";
}

imprimirMensagens();
imprimirMensagens();
imprimirMensagens();

echo "<br>";


function obterMensagem() {
    return 'Seja bem vindo(a)!';
}

obterMensagem();
$m = obterMensagem();
echo $m;
echo '<br>', obterMensagem();
echo '<br>';


function obterMensagemComNome($nome) {
    return "Bem vindo, {$nome}!";
}

echo '<br>', obterMensagemComNome('Wagner');
echo '<br>', obterMensagemComNome('Tiago');

echo "<hr>";

echo "Função Soma <br>";

function soma($a, $b) {
    return $a + $b;
}

$x = 4;
$y = 5;
echo '<br>', soma(50, 50);
echo '<br>', soma($x, $y);
