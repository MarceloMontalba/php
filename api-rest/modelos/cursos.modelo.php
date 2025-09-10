<?php
require_once "conexion.php";

class ModeloCursos{
  
  static public function index($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla;");
    $stmt->execute();

    $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;

    return $respuesta;
  }

  static public function create($tabla, $datos){
    $sql = "INSERT INTO cursos (titulo, descripcion, instructor, imagen, 
                                precio, id_creador, create_at, update_at) 
            VALUES (:titulo, :descripcion, :instructor, :imagen, 
                    :precio, :id_creador, :create_at, :update_at);";

    $stmt = Conexion::conectar()->prepare($sql);

    $stmt -> bindParam(":titulo",      $datos["titulo"],      PDO::PARAM_STR);
    $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    $stmt -> bindParam(":instructor",  $datos["instructor"],  PDO::PARAM_STR);
    $stmt -> bindParam(":imagen",      $datos["imagen"],      PDO::PARAM_STR);
    $stmt -> bindParam(":precio",      $datos["precio"],      PDO::PARAM_STR);
    $stmt -> bindParam(":id_creador",  $datos["id_creador"],  PDO::PARAM_STR);
    $stmt -> bindParam(":create_at",   $datos["create_at"],   PDO::PARAM_STR);
    $stmt -> bindParam(":update_at",   $datos["update_at"],   PDO::PARAM_STR);

    if($stmt -> execute()){
      $stmt = null;

      return "OK";
    } else {
      $stmt = null;

      return Conexion::conectar()-> errorInfor();
    }
  }

  static public function show($tabla, $idCurso){
    $sql  = "SELECT * FROM $tabla WHERE id=:id;";
    $stmt = Conexion::conectar()->prepare($sql); 
    
    $stmt -> bindParam(":id", $idCurso, PDO::PARAM_INT);
    $stmt -> execute();

    $respuesta = $stmt -> fetchAll(PDO::FETCH_CLASS);
    $stmt = null;

    return $respuesta;
  }
}

?>