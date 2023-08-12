<?php
    if($_POST){
        $boton = $_POST["btnValor"];

        switch($boton){
            case 1:
                echo "Presionó el botón 1";
                break;
            case 2:
                echo "Presionó el botón 2";
                break;
            case 3:
                echo "Presionó el botón 3";
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch</title>
</head>
<body>
    <form action="ejercicio10.php" method="post">
        <input type="submit" value="1" name="btnValor"><br>
        <input type="submit" value="2" name="btnValor"><br>
        <input type="submit" value="3" name="btnValor"><br>
    </form>
</body>
</html>