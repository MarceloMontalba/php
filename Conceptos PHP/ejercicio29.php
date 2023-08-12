<?php
$jsonContenido = '[
    {"nombre" : "Marcelo", "apellido": "Montalba"},
    {"nombre" : "Juanito", "apellido": "Rodriguez"}
]';

$resultado = json_decode($jsonContenido);

foreach($resultado as $persona){
    echo $persona->nombre." ".$persona->apellido."<br/>";
}

?>