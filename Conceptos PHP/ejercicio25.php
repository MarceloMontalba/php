<?php

$servidor = "localhost";
$usuario  = "root";
$clave = "root";

try{
    $conexion = new PDO("mysql:host=$servidor;dbname=album", $usuario, $clave);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM fotos";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();;

    foreach($resultado as $valor){
        echo $valor["id"]." ,".$valor["nombre"].", ".$valor["ruta"]."<br/>";
    }

    $conexion->exec($sql);

    echo "Conexion establecida";
}catch(PDOException $error){
    echo "Conexion Erronea ".$error;
}

?>
