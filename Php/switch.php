<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Exemplo de um switch em PHP para escolher uma cor

$cor = "azul"; // Variável que contém a cor a ser verificada

// Estrutura switch
switch ($cor) {
    case "vermelho": // Caso a cor seja "vermelho"
        echo "A cor é vermelha.";
        break; // O break encerra o bloco de código após o case correspondente ser executado
    
    case "azul": // Caso a cor seja "azul"
        echo "A cor é azul.";
        break;
    
    case "verde": // Caso a cor seja "verde"
        echo "A cor é verde.";
        break;
    
    default: // Caso a variável $cor não corresponda a nenhum dos casos anteriores
        echo "Cor desconhecida.";
        break;
}

// Saída do código: A cor é azul.
?>

    <?php
    $categoria = 'SUV';
    $preco = 0.0;
    $carro = '';

    if ($categoria === 'Luxo') {
        $carro = 'Mercedes';
        $preco = 250000;
    } else if ($categoria === 'SUV') {
        $carro = 'Renegade';
        $preco = 80000;
    } elseif ($categoria === 'Sedan') {
        $carro = 'Etios';
        $preco = 55000;
    } else {
        $carro = 'Mobi';
        $preco = 33000;
    }

    $precoFormatado = number_format($preco, 2, ',', '.');
    echo "<p>Carro: $carro<br>Preço: R$ $precoFormatado</p>";

    $categoria = 'SUV';
    $preco = 0.0;
    $carro = '';

    $categoria = 'Suv';
    switch (strtolower($categoria)) {
        case 'luxo':
            $carro = 'Mercedes';
            $preco = 250000;
            break;
        case 'suv':
        case 'suv básico':
            $carro = 'Renegade';
            $preco = 80000;
            break;
        case 'sedan':
            $carro = 'Etios';
            $preco = 55000;
            break;
        default:
            $carro = 'Mobi';
            $preco = 33000;
            break;
    }

    $precoFormatado = number_format($preco, 2, ',', '.');
    echo "<p>Carro: $carro<br>Preço: $precoFormatado</p>";
    ?>

<!-- 
Enunciado: Escreva um código em PHP que recebe o nome de um dia da 
semana e exibe uma mensagem correspondente:
"Dia útil" para segunda, terça, quarta, quinta, sexta.
"Final de semana" para sábado e domingo. 
-->
    <?php
    $diaDaSemana = "sábado"; // Mude o valor para testar diferentes dias

    switch ($diaDaSemana) {
        case "segunda":
        case "terça":
        case "quarta":
        case "quinta":
        case "sexta":
            echo "Dia útil";
            break;
        
        case "sábado":
        case "domingo":
            echo "Final de semana";
            break;
        
        default:
            echo "Dia inválido";
            break;
    }
    echo "<br> <br>"
    ?>

<!-- 
Enunciado: Escreva um código em PHP que recebe dois números e uma 
operação matemática básica (+, -, *, /). 
O código deve calcular e exibir o resultado da operação.
Lembre-se que não existe divisão por zero
 -->
 <?php
    $num1 = 10;
    $num2 = 5;
    $operacao = "+"; // Mude o valor para testar diferentes operações

    switch ($operacao) {
        case "+":
            echo $num1 + $num2;
            break;
        
        case "-":
            echo $num1 - $num2;
            break;
        
        case "*":
            echo $num1 * $num2;
            break;
        
        case "/":
            if ($num2 != 0) {
                echo $num1 / $num2;
            } else {
                echo "Erro: divisão por zero";
            }
            break;
        
        default:
            echo "Operação inválida";
            break;
    }
    echo "<br> <br>"
    ?>
<!-- 
Enunciado: Escreva um código em PHP que recebe o nome de um mês e exibe a estação do ano correspondente:
"Verão" para dezembro, janeiro, fevereiro.
"Outono" para março, abril, maio.
"Inverno" para junho, julho, agosto.
"Primavera" para setembro, outubro, novembro.
 -->
 <?php
    $mes = "junho"; // Mude o valor para testar diferentes meses
    switch ($mes) {
        case "dezembro":
        case "janeiro":
        case "fevereiro":
            echo "Verão";
            break;
        
        case "março":
        case "abril":
        case "maio":
            echo "Outono";
            break;
        
        case "junho":
        case "julho":
        case "agosto":
            echo "Inverno";
            break;
        
        case "setembro":
        case "outubro":
        case "novembro":
            echo "Primavera";
            break;
        
        default:
            echo "Mês inválido";
            break;
    }
    echo "<br> <br>"
    ?>

    
</body>
</html>