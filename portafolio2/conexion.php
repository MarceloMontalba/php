<?php

class conexion{
    private $servidor = "localhost";
    private $db = "portafolio2";
    private $usuario = "root" ;
    private $contrasenia = "";
    private $conexion;

    public function __construct(){
        try{
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->db", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            return "Falla en la conexión: $e";
        }
    }

    public function ejecutarSentencia($sql){
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultarDb($sql){
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}

?>