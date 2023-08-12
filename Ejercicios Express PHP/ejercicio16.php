<?php
// Escribir un pequeño programa donde:
// Se ingresa el año en curso.
// Se ingresa el nombre y el año de nacimiento de tres personas.
// Se calcula cuántos años cumplirán durante el año en curso.
// Se imprime en pantalla.

    function calcularEdad($periodoActual, $periodoNacimiento){
        return $periodoActual - $periodoNacimiento;
    }

    class persona{
        private $nombre;
        private $periodoNacimiento;

        function __construc($nombre="", $periodoNacimiento=0){
            $this->nombre = $nombre;
            $this->periodoNacimiento = $periodoNacimiento;
        }

        public function cambiarNombre($nuevoNombre){
            $this->nombre = $nuevoNombre;
        }

        public function cambiarPeriodoNacimiento($nuevoPeriodo){
            $this->periodoNacimiento = $nuevoPeriodo;
        }

        public function verNombre(){
            return $this->nombre;
        }

        public function verPeriodoNacimiento(){
            return $this->periodoNacimiento;
        }
    }

    $numeroPersonas = 3;
    $periodoActual = 0;
    $personas = array();
    
    for($i=0; $i<$numeroPersonas; $i++){
        $nuevaPersona = new persona();
        array_push($personas, $nuevaPersona);
    }

    if($_POST){
        $periodoActual = $_POST["txtPeriodoCurso"];

        foreach($personas as $i=>&$persona){
            $persona->cambiarNombre($_POST["txtNombre".$i]);
            $persona->cambiarPeriodoNacimiento($_POST["txtNacimiento".$i]);
        }
        
        echo"<ul>";
        for($i=0; $i<count($personas); $i++){
            echo "<li>".$personas[$i]->verNombre()." tiene "
            .calcularEdad($periodoActual, $personas[$i]->verPeriodoNacimiento())
            ." años, en el $periodoActual </li>";
        }
        echo "</ul>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
    <form action="ejercicio16.php" method="post">
        Ingresar Año del Curso:
        <input type="number" name="txtPeriodoCurso" id="" value=<?php echo $periodoActual; ?>>

        <?php
        for($i=0; $i<$numeroPersonas; $i++){
            echo "
            <br>====================================================================<br>
            Ingresar Nombre de la Persona $i:
            <input type='text' name='txtNombre$i' id='' value=".$personas[$i]->verNombre()."><br>
            Ingresar Año de nacimiento de la Persona $i:
            <input type='number' name='txtNacimiento$i' id='' value=".$personas[$i]->verPeriodoNacimiento().">
            <br>====================================================================<br>";
        }
        ?>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>