<?php
// Definir una función inversa() que calcule la inversión de una cadena. Por ejemplo la 
// cadena "estoy probando" debería devolver la cadena "odnaborp yotse"
function inversa($cadena){
    $cadenaInversa = "";
    for($i=strlen($cadena)-1; $i>=0; $i--){
        $cadenaInversa .= $cadena[$i];
    }

    return $cadenaInversa;
}

$entrada = "";

if($_POST){
    $entrada = $_POST["txtEntrada"];
    echo inversa($entrada);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <form action="ejercicio6.php" method="post">
        <input type="text" name="txtEntrada" id="" value="<?php echo $entrada ?>" ><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>