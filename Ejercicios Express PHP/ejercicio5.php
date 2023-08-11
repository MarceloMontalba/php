<?php
// Escribir una función sum() y una función multip() que sumen y multipliquen 
// respectivamente todos los números de una lista. Por ejemplo: sum([1,2,3,4]) debería 
// devolver 10 y multip([1,2,3,4]) debería devolver 24.

function sum($lista){
    $acumulador = 0;
    
    foreach($lista as $elemento){
        $acumulador += $elemento;
    }

    return $acumulador;
}

function multip($lista){
    $acumulador = $lista[0];
    
    for($i=1; $i<count($lista); $i++){
        $acumulador *= $lista[$i];
    }

    return $acumulador;
}


$lista = array(1, 2, 3, 4);

echo sum($lista)."<br>";
echo multip($lista)."<br>";
?>