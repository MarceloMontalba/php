<?php
require_once "conexion.php";

class ModeloCursos{
  
  static public function index($tabla1, $tabla2, $desde, $cantidad){

    if($cantidad!=null){
      $sql = "SELECT $tabla1.id, $tabla1.titulo, $tabla1.descripcion,
                   $tabla1.instructor, $tabla1.imagen, $tabla1.precio,
                   $tabla1.id_creador, $tabla2.primer_nombre, $tabla2.primer_apellido
            FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.id_creador=$tabla2.id
            LIMIT $desde, $cantidad;";
    } else {
      $sql = "SELECT $tabla1.id, $tabla1.titulo, $tabla1.descripcion,
                   $tabla1.instructor, $tabla1.imagen, $tabla1.precio,
                   $tabla1.id_creador, $tabla2.primer_nombre, $tabla2.primer_apellido
            FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.id_creador=$tabla2.id;";
    }
    $stmt = Conexion::conectar()->prepare($sql);
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

  static public function show($tabla1, $tabla2, $idCurso){
    $sql = "SELECT $tabla1.id, $tabla1.titulo, $tabla1.descripcion,
                   $tabla1.instructor, $tabla1.imagen, $tabla1.precio,
                   $tabla1.id_creador, $tabla2.primer_nombre, $tabla2.primer_apellido
            FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.id_creador=$tabla2.id
            WHERE $tabla1.id=:id";
    $stmt = Conexion::conectar()->prepare($sql); 
    
    $stmt -> bindParam(":id", $idCurso, PDO::PARAM_INT);
    $stmt -> execute();

    $respuesta = $stmt -> fetchAll(PDO::FETCH_CLASS);
    $stmt = null;

    return $respuesta;
  }

  static public function update($tabla, $datos){
    $sql = "UPDATE cursos SET titulo=:titulo, descripcion=:descripcion, instructor=:instructor,
            imagen=:imagen, precio=:precio, update_at=:update_at WHERE id=:id";

    $stmt = Conexion::conectar()->prepare($sql);

    $stmt -> bindParam(":id",          $datos["id"],          PDO::PARAM_STR);
    $stmt -> bindParam(":titulo",      $datos["titulo"],      PDO::PARAM_STR);
    $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    $stmt -> bindParam(":instructor",  $datos["instructor"],  PDO::PARAM_STR);
    $stmt -> bindParam(":imagen",      $datos["imagen"],      PDO::PARAM_STR);
    $stmt -> bindParam(":precio",      $datos["precio"],      PDO::PARAM_STR);
    $stmt -> bindParam(":update_at",   $datos["update_at"],   PDO::PARAM_STR);
  
    if($stmt -> execute()){
      $stmt = null;

      return "OK";
    } else {
      $stmt = null;

      return Conexion::conectar()-> errorInfor();
    }
  }

  static public function delete($tabla, $idCurso){
    $sql = "DELETE FROM $tabla WHERE id=:id";
    $stmt = Conexion::conectar()->prepare($sql);

    $stmt -> bindParam(":id", $idCurso, PDO::PARAM_STR);
    
    if($stmt -> execute()){
      $stmt = null;

      return "OK";
    } else {
      $stmt = null;

      return Conexion::conectar()-> errorInfor();
    }
  }
}

?>