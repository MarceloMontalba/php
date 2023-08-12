<?php
// Escribir una función mas_larga() que tome una lista 
// de palabras y devuelva la mas larga.
function masLarga($lista){
    if(count($lista)>0){
        $palabraLarga = $lista[0];
        foreach($lista as $elemento){
            $palabraLarga = (strlen($elemento)>strlen($palabraLarga))? $elemento:$palabraLarga; 
        }
        return "La cadena más larga es: '$palabraLarga'";
    }else{
        return "La lista no contiene elementos";
    }
}
    
$palabras = ["Hola Mundo", "Que tal, como estas?", "Tengo Mucha Hambre"];
echo masLarga($palabras);

?>