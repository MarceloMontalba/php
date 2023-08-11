<?php
// Definir una función es_palindromo() que reconoce palíndromos (es decir, palabras que 
// tienen el mismo aspecto escritas invertidas), ejemplo: es_palindromo ("radar") tendría que 
// devolver True.

function esPalindromo($cadena){
    $cadenaInvertida = "";
    
    for($i=strlen($cadena)-1; $i>=0; $i--){
        $cadenaInvertida .= $cadena[$i];
    }

    if($cadenaInvertida == $cadena){
        return "true";
    }else{
        return "false";
    }
}

$entrada = "";

if($_POST){
    $entrada = $_POST["txtEntrada"];
    echo esPalindromo($entrada);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <form action="ejercicio7.php" method="post">
        <input type="text" name="txtEntrada" id="" value="<?php echo $entrada; ?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>