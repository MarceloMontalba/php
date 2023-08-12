<?php
    if($_POST){
        $valorA = $_POST["valorA"];
        $valorB = $_POST["valorB"];

        //Operaciones Aritmeticas
        $suma           = $valorA + $valorB;
        $resta          = $valorA - $valorB;
        $multiplicacion = $valorA * $valorB;
        $division       = $valorA / $valorB;

        //Imprime
        echo "SUMA: ".$suma."<br>RESTA: ".$resta."<br>MULTIPLICACIÓN: ".$multiplicacion."<br>DIVISION: ".$division;
        
        if($valorA == $valorB){
            echo "<br>El valor de A es igual al de B";

            if($valorA == 4){
                echo "<br>El valor de A es 4";
            }
            if($valorA == 5){
                echo "<br>El valor de A es 5";
            }
        }

        if(($valorA==$valorB) && ($valorA==4)){
            echo "<br>El valor de A es igual al de B. El valor de A es 4";
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
    <form action="ejercicio9.php" method="post">
        Valor A:
        <input type="text" name="valorA" id="">
        <br>
        Valor B:
        <input type="text" name="valorB" id="">
        <input type="submit" value="Calular">
    </form>
</body>
</html>