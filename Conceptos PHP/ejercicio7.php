<?php
    if($_POST){
        $valorA = $_POST["valorA"];
        $valorB = $_POST["valorB"];

        if ($valorA > $valorB){
            echo "El valor de A es mayor que B";
        }
        else{
            if ($valorA < $valorB){
                echo "El valor de B es mayor que A";
            }
            else{
                echo "El valor de A es igual al de B";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores Aritmeticos</title>
</head>
<body>
    <form action="ejercicio7.php" method="post">
        Valor A:
        <input type="text" name="valorA" id="">
        <br>
        Valor B:
        <input type="text" name="valorB" id="">
        <input type="submit" value="Calular">
    </form>
</body>
</html>