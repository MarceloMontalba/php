<?php
// Escribir una función filtrar_palabras() que tome una lista 
// de palabras y un entero n, y devuelva las palabras que tengan 
// mas de n caracteres.
function filtrarPalabras($lista, $n){
    $nuevaLista = array();
    foreach($lista as $elemento){
        if(strlen($elemento)>$n){
            array_push($nuevaLista, $elemento);
        }
    }
    return $nuevaLista;
}

$lista = array("Manzana", "Sandia", "Naranja", "Uva");
$entrada = "";

if($_POST){
    $entrada = $_POST["txtEntrada"];
    
    echo"Las cadenas con un largo mayor a $entrada son: <br><ul>";
    foreach(filtrarPalabras($lista, $entrada) as $valor){
        echo "<li>$valor</li>";
    } 
    echo "</ul>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<body>
    <form action="ejercicio13.php" method="post">
        <input type="number" name="txtEntrada" id="" value=<?php echo $entrada; ?> >
        <input type="submit" value="Enviar">
    </form>
</body>
</html>