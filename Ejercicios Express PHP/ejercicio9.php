<?php
// Definir una función generar_n_caracteres() que tome un entero n y devuelva el caracter 
// multiplicado por n. Por ejemplo: generar_n_caracteres(5, "x") debería devolver "xxxxx".
function generarNCaracteres($n, $caracter){
    if(is_numeric($n)){
        $n = intval($n);
        $cadena = "";
        
        for($i=0; $i<$n; $i++){
            $cadena .= $caracter;
        }

        return $cadena;

    }else{
        return "El valor '$n' no es númerico";
    }

}

$valor = "";
$caracter = "";

if($_POST){
    $valor    = $_POST["txtValor"];
    $caracter = $_POST["txtCaracter"];

    echo generarNCaracteres($valor, $caracter);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericicio 9</title>
</head>
<body>
    <form action="ejercicio9.php" method="post">
        <input type="text" name="txtValor" id=""><br>
        <input type="text" name="txtCaracter" id=""><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>