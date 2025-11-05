<?php
// Declaração de variáveis
echo "Variáveis <br>";
$nome = "João";             // Variável string
$idade = 30;                // Variável integer
$altura = 1.75;             // Variável float
$casado = false;             // Variável boolean

echo "<br>";

// Exibindo valores das variáveis
echo "Nome: " . $nome . "<br>";
echo "Idade: " . $idade . " anos<br>";
echo "Altura: " . $altura . " metros<br>";
// Condicional utilizando a variável booleana
if ($casado) {
    echo "Estado civil: Casado<br>";
} else {
    echo "Estado civil: Solteiro<br>";
}

echo "<br>";
$variavel = 10;
echo "<br>" . $variavel;
$variavel = "Agora sou uma string!";
echo "<br>" . $variavel;


echo "<br>";

// Nomes de variável validos
$var = 'valida';
$var2 = 'valida';
$VAR3 = 'valida';
$_var_4 = 'valida';
$vâr5 = 'valida'; // evitar!
// $6var = 'invalida';
// $%var7 = 'invalida';
// $var8% = 'invalida';

echo "Tipos de variáveis";
echo "<br>";
var_dump($nome);
echo "<br>";
var_dump($idade);
echo "<br>";
var_dump($altura);
echo "<br>";
var_dump($casado);
echo "<br>";
echo "<br>";

// Operações com variáveis
$idade_ano_que_vem = $idade + 1;
echo "Idade no próximo ano: " . $idade_ano_que_vem . " anos<br>";
echo "<br>";
// Soma
echo "Soma: ";
$a = 3;
$b = 16;
$somaDosNumeros = $a + $b;
echo $somaDosNumeros;
echo "<br>";
// Concatenando strings
echo "Concatenando strings <br>";
$mensagem = "Olá, meu nome é " . $nome . " e eu tenho " . $idade . " anos.";
echo $mensagem;
echo "<br>";
echo "<br>";
echo "verifica se a varíavel está setada";
echo "<br>";
echo isset($somaDosNumeros); // verifica se a varíavel está setada
echo "<br>";

echo "numero 10 <br>";
$numero = 10;
echo '<br>' . $numero;
$numero = $numero - 3;
echo '<br>' . $numero;
$numero = $numero + 1.5;
echo '<br>' . $numero;

echo "<br>";
$numero = 10;
echo "<br> numero-- : " . $numero--; 
// $numero = $numero - 1;
echo '<br>' . $numero;

$numero = 10;
echo "<br> --numero : " . --$numero; 
// $numero = $numero - 1;
echo '<br>' . $numero;
echo "<br>";

$numero = 10;
echo "<br> numero++ : " . $numero++; 
// $numero = $numero + 1;
echo '<br>' . $numero;
echo "<br>";
$numero = 10;
echo "<br> ++numero : " . ++$numero; 
// $numero = $numero + 1;
echo '<br>' . $numero;
echo "<br>";echo "<br>";
echo "numero 20 <br>";
$numero = 20;
echo '<br>' . $numero;
$numero -= 5; // igual a numero = numero - 5
echo '<br>' . $numero;
$numero += 5; // igual a numero = numero + 5 
echo '<br>' . $numero;
$numero *= 10; // igual a numero = numero * 10 
echo '<br>' . $numero;
$numero /= 20; // igual a numero = numero / 20
echo '<br>' . $numero;
$numero **= 2; // igual a numero = numero ** 2 
echo '<br>' . $numero;
$numero .= 4; // apenas concatenação!
echo '<br>' . $numero;


$texto = 'Esse é um texto';
echo '<br>' . $texto;
$texto = $texto . ' qualquer';
echo '<br>' . $texto;
$texto .= ' de verdade!';
echo '<br>' . $texto;

echo "<br>";
echo "<br>";

echo "Constantes";
echo "<br>";
define('TAXA_DE_JUROS', 5.9);
echo TAXA_DE_JUROS;

const NOVA_TAXA = 2.5;
echo '<br>' . NOVA_TAXA;

$valorVariavel = 2.8;
define('NOVISSIMA_TAXA', $valorVariavel); // isso funciona
echo '<br>' . NOVISSIMA_TAXA;

// const NOVISSIMA_TAXA = $valorVariavel; // isso não funciona
// echo '<br>' . NOVISSIMA_TAXA;

const NOVISSIMA_TAXA2 = 2.8 + 1.2;
echo '<br>' . NOVISSIMA_TAXA2;
