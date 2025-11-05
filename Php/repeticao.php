<div class="titulo">Laço For</div>

<?php
for($cont = 1; $cont <= 5; $cont++) {
    echo "$cont <br>";
}

echo "<br>";

for($cont = 1; $cont <= 10; $cont++) {
    echo $cont * 3 . "<br>";
}

echo "<br>";

$array = [
    'Domingo',
    'Segunda',
    'Terça',
    'Quarta',
    'Quinta',
    'Sexta',
    'Sábado'
];
print_r($array);
echo "<br>";
echo "<br>";

for($i = 0; $i < count($array); $i++) {
    echo $array[$i] . "<br>";
}

$matrix = [
    ['a', 'e', 'i', 'o', 'u'],
    ['b', 'c', 'd']
];

echo "<br>";

for($i = 0; $i < count($matrix); $i++) {
    echo var_dump($matrix[$i]) . "<br>";
}

echo "<br>";

for($i = 0; $i < count($matrix); $i++) {
    for($j = 0; $j < count($matrix[$i]); $j++) {
        echo $matrix[$i][$j] . " ";
    }
    echo "<br>";
}
echo "<br>";
echo "<hr>";
?>

<div class="titulo">Foreach</div>
<?php
echo "<br>";
$array = [
    'Domingo',
    'Segunda',
    'Terça',
    'Quarta',
    'Quinta',
    'Sexta',
    'Sábado'
];
foreach ($array as $valor) {
    echo "$valor <br>";
}

echo "<br>";

foreach ($array as $indice => $valor) {
    echo "$indice - $valor <br>";
}

$matrix = [
    ['a', 'e', 'i', 'o', 'u'],
    ['b', 'c', 'd']
];

echo "<br>";

foreach ($matrix as $linha) {
    foreach($linha as $letra) {
        echo "$letra ";
    }
    echo "<br>";
}

echo "<br>";

$numeros = [1, 2, 3, 4, 5];
foreach ($numeros as $dobrar) {
    $dobrar *= 2;
    echo "$dobrar <br>";
}

echo "<br>";
echo "<hr>";

?>

<div class="titulo">While/Do While</div>

<?php
echo "<br>";
const VALOR_LIMITE = 5;
$contador = 0;

while($contador < VALOR_LIMITE) {
    echo "while $contador <br>";
    $contador++;
}

echo "<br>";

$contador = 100;
do {
    echo "do-while $contador <br>";
    $contador++;
} while($contador < VALOR_LIMITE);

echo "<br>";
echo "<hr>";

?>

<div class="titulo">Manipução Matrix</div>

<?php

echo "<br>";

for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= 3; $j++) {
        echo $i . $j . " ";
    }
    echo "<br>";
}


?>