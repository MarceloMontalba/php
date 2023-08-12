<?php
    $frutas = array("f"=>"Fresa", "p"=>"Pera", "m"=>"Manzana");
    print_r($frutas);

    foreach($frutas as $indice=>&$valor){
        echo "<br>La fruta ".$valor." tiene el indice '".$indice."'";
    }

?>