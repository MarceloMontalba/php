<?php

class persona{
    //Propiedades
    public $nombre;
    private $edad;
    protected $altura;
    
    //Metodos
    public function asignarNombre($nuevoNombre){
        $this -> nombre = $nuevoNombre;
    }

    public function imprimirNombre(){
        echo "Mi nombre es ".$this -> nombre."<br/>";
    }

    public function mostrarEdad(){
        $this->edad = 20;
        return $this->edad;
    }
} 

$objAlumno = new persona(); //Instancia o Creacion del Objeto
$objAlumno -> asignarNombre("Marcelo");

$objAlumno2 = new Persona();
$objAlumno2 -> asignarNombre("Pedro");

$objAlumno  -> imprimirNombre();
$objAlumno2 -> imprimirNombre();

echo $objAlumno->mostrarEdad();

?>