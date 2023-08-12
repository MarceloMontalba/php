<?php

class objeto{
    public $edad;

    function construct($edad=18){
        $this->edad = $edad;
    }

    public function saludarPersonas(){
        echo "Hola como estan, tengo $this->edad años.";
    }
}

class persona extends objeto{
    public $nombre;

    public function ingresarNombre($nombre){
        $this->nombre = $nombre;
    }
}


$nuevoObjeto = new persona(13);
$nuevoObjeto->ingresarNombre("Marcos");
$nuevoObjeto->saludarPersonas();
?>