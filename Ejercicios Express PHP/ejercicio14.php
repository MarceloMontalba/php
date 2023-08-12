<?php
// Escribir un programa que le diga al usuario que ingrese una cadena. 
// El programa tiene que evaluar la cadena y decir cuantas letras 
// mayúsculas tiene.
function obtenerNMayusculas($cadena){
    $mayusculas = "QWERTYUIOPASDFGHJKLZXCVBNM";
    $contador   = 0;

    foreach(str_split($cadena) as $caracter){
        $contador += (strstr($mayusculas, $caracter)!=false)? 1:0;
    }

    return $contador;
}

$entrada = "";

if($_POST){
    $entrada = $_POST["txtEntrada"];
    $numeroLetras = obtenerNMayusculas($entrada);
    echo "La cadena '$entrada' ingresada tiene $numeroLetras letras mayusculas.";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
</head>
<body>
    <form action="ejercicio14.php" method="post">
        <input type="text" name="txtEntrada" id="" value=<?php echo $entrada; ?>>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>