<div class="titulo">Desafio For</div>

<!-- 
Usar o for...
#
##
###
####
#####
1) Pode usar incremento $i++
2) Não pode usar incremento $i++
-->

<?php
$impressao = '';
for($cont = 1; $cont <= 5; $cont++) {
    $impressao .= '#';
    echo "$impressao <br>";
}

echo '<hr>';

for(
    $impressao2 = '#';
    $impressao2 !== '######'; 
    $impressao2 .= '#'
) {
    echo "$impressao2 <br>";
}

echo '<hr>';

for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= 3; $j++) {
        echo "** ";
    }
    echo "<br>";
}

echo '<hr>';

for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= 3; $j++) {
        if ($i == $j) {
            echo "** ";
        } else {
            echo $i . $j . " ";
        }
    }
    echo "<br>";    
}

echo '<hr>';

for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= 3; $j++) {
        if ($i > $j) {
            echo "** ";
        } else {
            echo $i . $j . " ";
        }
    }
    echo "<br>";    
}

echo '<hr>';

for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= 3; $j++) {
        if ($i < $j) {
            echo "** ";
        } else {
            echo $i . $j . " ";
        }
    }
    echo "<br>";    
}

echo '<hr>';

for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= 3; $j++) {
        if ($i + $j == 4) {
            echo "** ";
        } else {
            echo $i . $j . " ";
        }
    }
    echo "<br>";    
}

echo '<hr>';

for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= 3; $j++) {
        if ($i + $j > 4) {
            echo "** ";
        } else {
            echo $i . $j . " ";
        }
    }
    echo "<br>";    
}

echo '<hr>';

for($linha = 1; $linha <= 3; $linha++) {
    for($coluna = 1; $coluna <= 3; $coluna++) {
        if ($coluna == 2) {
            echo "** ";
        } else {
            echo $linha . $coluna . " ";
        }
    }
    echo "<br>";    
}


$contador = 1;
do {
    echo "Contador: " . $contador . "<br>";
    $contador++;
} while($contador < 2);

function raiz($a){
    return sqrt($a);
}

echo "<br>";  

echo "A raiz é: " . raiz(25);

echo "<br>"; 

$condicao = true;
if ($condicao) {
      echo "Passo A <br>";
  } elseif ($condicao) {
      echo "Passo B <br>";
  } elseif ($condicao) {
      echo "Passo C <br>";
  } elseif (!$condicao) {
      echo "Passo D <br>";
  } else {
      echo "Passo E <br>";
  }