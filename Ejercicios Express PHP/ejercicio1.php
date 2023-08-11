<?php
/*
    Definir una función vMax() que tome como argumento dos números y devuelva el mayor de ellos. 
    (Es cierto que python tiene una función max() incorporada, pero hacerla nosotros mismos es un 
    muy buen ejercicio.
*/
    function vMax($primerValor, $segundoValor){
        $mayorValor = ($primerValor>$segundoValor) ? $primerValor : $segundoValor;
        return $mayorValor;
    };

    $entrada1 = "";
    $entrada2 = "";
    if($_POST){
        $entrada1 = $_POST["txtEntrada1"];
        $entrada2 = $_POST["txtEntrada2"];

        echo "El mayor número es: ".vMax($entrada1, $entrada2);
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="ejercicio1.php" method="post">
        <input type="text" name="txtEntrada1" id="" value="<?php echo $entrada1?>"><br/>
        <input type="text" name="txtEntrada2" id="" value="<?php echo $entrada2?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>