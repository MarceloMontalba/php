<?php
// Definir un histograma procedimiento() que tome una lista de números enteros e imprima 
// un histograma en la pantalla. Ejemplo: procedimiento([4, 9, 7]) debería imprimir lo siguiente:
// ****
// *********
// *******

function procedimiento($lista){
    foreach($lista as $valor){
        echo str_repeat("*", $valor)."<br>";
    }
}

$histograma = array(4, 9, 7, 10, 8, 20, 5);
procedimiento($histograma);
?>