<?php
// Escribir una función que tome un carácter y devuelva True si es una vocal, de lo 
// contrario devuelve False.

function esVocal($letra){
    $vocales = "aeiouAEIOU";
    $inicialFiltrada = $letra[0];

    if(strstr($vocales,$inicialFiltrada)!=false){
        return "'$inicialFiltrada' es vocal";
    }else{
        return "'$inicialFiltrada' no es una vocal";
    }
}

$cadena = "";

if($_POST){
    $cadena = $_POST["txtEntrada"];
    echo esVocal($cadena);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form action="ejercicio4.php" method="post">
        <input type="text" name="txtEntrada" id="" value="<?php echo $cadena; ?>" >
        <input type="submit" value="Enviar">
    </form>
</body>
</html>