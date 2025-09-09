<?php

class ModeloClientes{

  static public function index($tabla){
    $smtp = Conexion::conectar()->prepare("SELECT * FROM $tabla;");
    $smtp->execute();

    $repuesta = $smtp-> fetchAll();
    $smtp = null;

    return $repuesta;
  }

  static public function create($tabla, $datos){
    $smtp = Conexion::conectar()->prepare("INSERT INTO $tabla (primer_nombre, primer_apellido, email, id_cliente, llave_secreta, create_at, update_at) 
                                           VALUES (:primer_nombre, :primer_apellido, :email, :id_cliente, :llave_secreta, :create_at, :update_at);");
    
    // Se entregan los parametros a la consulta SQL
    $smtp -> bindParam(":primer_nombre",   $datos["nombre"], PDO::PARAM_STR);
    $smtp -> bindParam(":primer_apellido", $datos["apellido"], PDO::PARAM_STR);
    $smtp -> bindParam(":email",           $datos["email"], PDO::PARAM_STR);
    $smtp -> bindParam(":id_cliente",      $datos["id_cliente"], PDO::PARAM_STR);
    $smtp -> bindParam(":llave_secreta",   $datos["llave_secreta"], PDO::PARAM_STR);
    $smtp -> bindParam(":create_at",       $datos["create_at"], PDO::PARAM_STR);
    $smtp -> bindParam(":update_at",       $datos["update_at"], PDO::PARAM_STR);

    if($smtp -> execute()){
      return "OK";
    } else {
      return Conexion::conectar()->errorInfo();
    }
  }
}

?>