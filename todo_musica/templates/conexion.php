<?php

class conexion{
    private $host = "localhost";
    private $dbname = "chinook_music";
    private $user = "root";
    private $password = "";
    private $conexion;

    public function __construct()
    {
        try
        {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            return "Ha ocurrido un error: $e";
        }
    }

    public function consultarDatos($sql)
    {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function consultarFila($sql){
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_LAZY);

    }

    public function ejecutarSentencia($sql)
    {   
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }
}

?>