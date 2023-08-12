<?php

$servidor = "localhost";
$usuario  = "root";
$clave = "root";

try{
    $conexion = new PDO("mysql:host=$servidor;dbname=album", $usuario, $clave);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO fotos(nombre, ruta) VALUES ('Siempre Programando', 'foto2.jpg')";
    $conexion->exec($sql);

    echo "Conexion establecida";
}catch(PDOException $error){
    echo "Conexion Erronea ".$error;
}

?>
