<?php

$archivo = "ejercicio36.txt";
$archivoAbierto = fopen($archivo, "w");
$contenido = "Hola, ¿Que tal todo?";

fwrite($archivoAbierto, $contenido);
fclose($archivoAbierto);

?>