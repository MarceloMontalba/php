<?php
    if($_POST){
        $nombre   = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        echo "Hola ".$nombre." ".$apellido;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio3.php" method="post">
        Nombre:
        <input type="text" name="nombre" id="">
        <br>
        Apellido:
        <input type="text" name="apellido" id="">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>