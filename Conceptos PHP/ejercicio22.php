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


class trabajador extends persona{
    public $puesto;

    public function presentarseComoTrabajador(){
        echo "Hola soy ".$this -> nombre." y soy un ". $this->puesto;
    }
}

$objTrabajador = new trabajador(); //Instancia o Creacion del Objeto
$objTrabajador -> asignarNombre("Marcelo Montalba");
$objTrabajador -> puesto = "Profesor";

$objTrabajador->presentarseComoTrabajador();

?>