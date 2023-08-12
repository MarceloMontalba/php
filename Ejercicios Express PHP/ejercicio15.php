<?php
// Construir un pequeño programa que convierta números binarios en enteros.
function convertirEntero($binario){
    $entero  = 0;

    $contador = 1;
    for($i=strlen($binario)-1; $i>=0; $i--){
        $entero += intval($binario[$i])*$contador;
        $contador += $contador;
    }

    return $entero;
}


$binario = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>
<body>
    <form action="ejercicio15.php" method="post">
        <input type="text" name="txtEntrada" id="" value=<?php echo $binario ?> >
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_POST){
            $binario = $_POST["txtEntrada"];
            echo "<br> El numero binario '$binario' transformado 
            a entero es igual a: ".convertirEntero($binario);
        }
    ?>

</body>
</html>