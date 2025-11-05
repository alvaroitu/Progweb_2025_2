<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Declaração de array formato 1
    $numeros = [10, 20, 30, 40]; // Array com 4 valores
    print_r($numeros);
    echo "<br> <br>";
    echo "O numero acessado foi \$numeros[0]: " . $numeros[0]; // Saída: 10 (acessando o valor pelo índice 0)
    echo "<br> <br>";
   
    // Declaração de array formato 2
    $aluno = [
        "nome" => "Ana",
        "idade" => 20,
        "curso" => "Sistemas de Informação"
    ];
    print_r($aluno);
    echo "<br> <br>";
    echo "O valor acessado foi \$aluno[\"nome\"]: " . $aluno["nome"]; // Saída: Ana (acessando o valor pela chave "nome")
    ?>

    <?php
    //Funções de arrays
    $dados1 = ["nome" => "Jose", "idade" => 28 ];
    
    $dados2 = ["naturalidade" => "Fortaleza" ];

    echo "<br> <br>";
    $dadosCompletos = $dados1 + $dados2;
    print_r($dadosCompletos);

    echo "<br> <br>";
    $dadosCompletos = $dados2 + $dados1;
    print_r($dadosCompletos);

    echo "<br> <br>";
    $dados2["endereço"] = "Rua A";
    $dadosCompletos = $dados1 + $dados2;
    print_r($dadosCompletos);

    echo "<br> <br>";
    $dados2["nome"] = "Maria";    
    $dadosCompletos = $dados1 + $dados2;
    print_r($dadosCompletos);

    echo "<br> <br>";
    $dadosCompletos = $dados2 + $dados1; //Ordem faz diferença
    print_r($dadosCompletos);

    echo "<br> <br>";
    echo count($dadosCompletos); // quantos elesmentos tem no array

    echo "<br> <br>";

    $indice = array_rand($dadosCompletos); // pegando indice de forma randomica
    echo "$indice = $dadosCompletos[$indice]";
    
    echo "<br> <br>";
    echo "{$dadosCompletos['idade']}";

    echo "<br> <br>";
    $impares = [1, 3, 5, 7, 9];
    $pares = [0, 2, 4, 6, 8];

    echo "Soma simples: \$decimais = \$pares + \$impares: ";
    $decimais = $pares + $impares;
    print_r($decimais);

    echo "Soma simples: \$decimais = \$impares + \$pares: ";
    $decimais = $impares + $pares;
    print_r($decimais);

    echo "<br> <br>";
    echo "Merge dos arrays: 1";
    $decimais = array_merge($pares, $impares);
    print_r($decimais);

     echo "<br> <br>";
    echo "Merge dos arrays: 2";
    $decimais = array_merge($impares, $pares);
    print_r($decimais);

    echo "<br> <br>";
    echo "Ordenação do array: ";
    sort($decimais);
    print_r($decimais);

    echo "<br> <br>";

    echo "Retirar um elemento";
    unset($decimais[3]);
    print_r($decimais);

    echo "<br> <br>";

    echo "Adicionar um elemento";
    $decimais[] = 10;
    print_r($decimais);
    ?>



    
</body>
</html>