<?php

$archivo = ("ejercicio35.txt");
$aperturaArchivo = fopen($archivo, "r");
$contenido = fread($aperturaArchivo, filesize($archivo));

echo $contenido;
?>