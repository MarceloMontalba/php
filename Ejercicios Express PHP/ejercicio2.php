<?php
/*
    Definir una función maxDeTres(), que tome tres números como argumentos y devuelva el 
    mayor de ellos.
*/

function maxDeTres($primerValor, $segundoValor, $tercerValor){
    $datos = array($primerValor, $segundoValor, $tercerValor);
    $valorMaximo = $datos[0];

    foreach($datos as $valor){
        if($valorMaximo<$valor){
            $valorMaximo = $valor;
        }
    }

    return $valorMaximo;
}

$primerValor  = 0;
$segundoValor = 0;
$tercerValor  = 0;

if($_POST){
    $primerValor  = $_POST["txtEntrada1"];
    $segundoValor = $_POST["txtEntrada2"];
    $tercerValor  = $_POST["txtEntrada3"];

    $valorMaximo = maxDeTres($primerValor, $segundoValor, $tercerValor);
    echo "El maximo valor ingresado es $valorMaximo";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <form action="ejercicio2.php" method="post">
        <input type="text" name="txtEntrada1" id="" value="<?php echo $primerValor; ?>"><br>
        <input type="text" name="txtEntrada2" id="" value="<?php echo $segundoValor; ?>"><br>
        <input type="text" name="txtEntrada3" id="" value="<?php echo $tercerValor; ?>"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>