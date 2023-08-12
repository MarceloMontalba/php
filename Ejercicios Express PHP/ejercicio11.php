<?php
// La función max() del ejercicio 1 (primera parte) y la función 
// max_de_tres() del ejercicio 2 (primera parte), solo van a funcionar 
// para 2 o 3 números. Supongamos que tenemos mas de 3 números o no sabemos 
// cuantos números son. Escribir una función max_in_list() que tome una 
// lista de números y devuelva el mas grande.

function maxInList($lista){
    if(count($lista)>0){
        $valorMaximo = $lista[0];
        foreach($lista as $elemento){
            $valorMaximo = ($elemento>$valorMaximo)? $elemento:$valorMaximo;
        }
        return $valorMaximo;
    }else{
        return "La lista está vacia.";
    }
}

$lista = array(4, 6 ,50, 20, 43);
echo maxInList($lista);

?>