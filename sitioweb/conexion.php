<?php 

class conexion{
    private $host = "localhost";
    private $db   = "sitio";
    private $user = "root";
    private $password = "";
    private $conexion;

    public function __construct()
    {
        try{
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function consultarBd($sentenciaSql)
    {
        $sentencia = $this->conexion->prepare($sentenciaSql);
        $sentencia->execute();
        return $sentencia -> fetchAll();
    }

    public function consultarFila($sentenciaSql){
        $sentencia = $this->conexion->prepare($sentenciaSql);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_LAZY);
    }

    public function ejecutarBd($sentenciaSql)
    {
        $this->conexion->exec($sentenciaSql);
        return $this->conexion->lastInsertId();
    }
}

?>