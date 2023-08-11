<?php
// Definir una función superposicion() que tome dos listas y devuelva True si tienen al menos 
// 1 miembro en común o devuelva False de lo contrario. Escribir la función usando el bucle for 
// anidado.

$lista1 = array(1, 5, 6, 2, 8, 1);
$lista2 = array(7, 68, 1, 56);

$bandera = false;
for($x=0; $x<count($lista1); $x++){
    for($y=0; $y<count($lista2); $y++){
        if($lista1[$x] == $lista2[$y]){
            $bandera = true;
        }
    }
}

echo ($bandera==true) ? "true" : "false";
?>