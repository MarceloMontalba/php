<?php
// Definir una función que calcule la longitud de una lista o una cadena dada. (Es cierto 
// que python tiene la función len() incorporada, pero escribirla por nosotros mismos resulta 
// un muy buen ejercicio.

function calcularLargo($cadena){
    $contador = 0;
    foreach(str_split($cadena) as $letra){
        $contador ++;
    }
        
    return "El texto ingresado tiene $contador letras.";
}

$entrada = "";

if($_POST){ 
    $entrada = $_POST["txtEntrada"];
    echo calcularLargo($entrada);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <form action="ejercicio3.php" method="post">
        <input type="text" name="txtEntrada" id="" value="<?php echo $entrada; ?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>