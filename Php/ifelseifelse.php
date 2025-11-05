<?php 
/** 
 * Condicionais 
 **/
echo "Condicionais - IF ELSE<hr>";
echo "<br> <br>";

if (true) {
    echo "Serei impresso?<br>";
}

if (true) {
    echo "Verdadeiro - Parte A<br>";
    echo "Verdadeiro - Parte B<br>";
} else {
    echo "Falso - Parte A<br>";
    echo "Falso - Parte B<br>";
}

if (false) {
    echo "Passo A <br>";
} elseif (false) {
    echo "Passo B <br>";
} elseif (false) {
    echo "Passo C <br>";
} elseif (false) {
    echo "Passo D <br>";
} elseif (false) {
    echo "Passo E <br>";
} else {
    echo "Úlitmo Passo<br>";
}

echo "<br> <br>";

echo "<p class='divisao'>Relacionais no If/Else</p><hr>";

var_dump(1 == 1); // true
echo "<br>";
var_dump(1 > 1); // false
echo "<br>";
var_dump(1 >= 1); // true
echo "<br>";
var_dump(4 < 23); // true
echo "<br>";
var_dump(1 <= 7); // true
echo "<br>";
var_dump(1 != 1); // false
echo "<br>";
var_dump(1 <> 1); // false
echo "<br>";
var_dump(111 == '111'); // true
echo "<br>";
var_dump(111 === '111'); // false
echo "<br>";
var_dump(111 != '111'); // false
echo "<br>";
var_dump(111 !== '111'); // true

echo "<br> <br>";

$idade = 15;
if ($idade < 18) {
    echo "Menor de idade = $idade anos<br>";
} elseif ($idade <= 65) {
    echo "Adulto = $idade anos<br>";
} else {
    echo "Terceira idade = $idade anos!";
}

echo "<br>";

$produto_em_estoque = false;

if (!$produto_em_estoque) {
    echo "O produto não está disponível no momento.";
} else {
    echo "Produto disponível para compra.";
}


echo "<br>";
echo "<br>";
echo "Equação do Segundo Grau: <hr>";
echo "<br>";
// delta maior que zero
// $a = 1;
// $b = 3;
// $c = -4;
// $delta = $b**2 - 4 * $a * $c;
// echo "Delta: " . $delta;
// echo "<br>";

// delta igual a zero
// $a = 1;
// $b = 2;
// $c = 1;
// $delta = $b**2 - 4 * $a * $c;
// echo "Delta: " . $delta;
// echo "<br>";

// delta menor que zero
$a = 2;
$b = 2;
$c = 2;
$delta = $b**2 - 4 * $a * $c;
echo "Delta: " . $delta;
echo "<br>";

$raizDelta = sqrt($delta);

if ($delta > 0 ) {
    $x1 = ( -$b + $raizDelta ) / 2 * $a;
    $x2 = ( -$b - $raizDelta ) / 2 * $a;
    echo "A equação possui duas raízes reais e diferentes, x1 = " . $x1 . " e x2 = " . $x2;
} else if ($delta == 0 ) {
    $x = -$b / 2 * $a;
    echo "A equação possui duas raízes reais e iguai, x1 = x2 = " . $x;
} else {
    echo "A equação não possui raízes.";
}