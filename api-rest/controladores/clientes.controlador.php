<?php
class ControladorClientes{
  
  public function create($datos){
    // ===================================================================================================================
    // Validación de ingreso del nombre
    // ===================================================================================================================
    if($datos["nombre"]==""){
      $json = array(
        "status"  => 404,
        "message" => "La varible *nombre* no ha sido ingresada."
      );
      
      echo json_encode($json, true);
      return;
    }

    // ===================================================================================================================
    // Validación de ingreso del apellido
    // ===================================================================================================================
    if($datos["apellido"]==""){
      $json = array(
        "status"  => 404,
        "message" => "La varible *apellido* no ha sido ingresada."
      );
      
      echo json_encode($json, true);
      return;
    }

    // ===================================================================================================================
    // Validación de ingreso del correo electronico
    // ===================================================================================================================
    if($datos["email"]==""){
      $json = array(
        "status"  => 404,
        "message" => "La varible *email* no ha sido ingresada."
      );
      
      echo json_encode($json, true);
      return;
    }


    // ===================================================================================================================
    // Validación de formato del nombre ingresado
    // ===================================================================================================================
    if($datos["nombre"]!="" && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre"])){
      $json = array(
        "status"  => 404,
        "message" => "La varible *nombre* no debe contener caracteres especiales."
      );
      
      echo json_encode($json, true);
      return;
    }

    // ===================================================================================================================
    // Validación de formato del apellido ingresado
    // ===================================================================================================================
    if($datos["apellido"]!="" && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["apellido"])){
      $json = array(
        "status"  => 404,
        "message" => "La varible *apellido* no debe contener caracteres especiales."
      );
      
      echo json_encode($json, true);
      return;
    }

    // ===================================================================================================================
    // Validación de formato del correo electronico ingresado
    // ===================================================================================================================
    if($datos["email"]!="" && !preg_match('/^[a-zA-Z0-9._\-%]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,}$/', $datos["email"])){
      $json = array(
        "status"  => 404,
        "message" => "La varible *email* debe ser un correo eléctronico valido."
      );
      
      echo json_encode($json, true);
      return;
    }

    // ===================================================================================================================
    // Validación de que el correo electronico ingresado no esté repetido con uno de la bd
    // ===================================================================================================================
    $clientes = ModeloClientes::index("clientes");

    foreach($clientes as $index => $cliente){
        if($cliente["email"] == $datos["email"]){
          $json = array(
          "status"  => 404,
          "message" => "El correo electrónico ingresado ya estaba registrado en la base de datos."
        );
        
        echo json_encode($json, true);
        return;
      }
    }

    // ===================================================================================================================
    // Generación de las credenciales del cliente
    // ===================================================================================================================
    $sal = str_replace('$','c',bin2hex(random_bytes(16))); // Cadena de sal aleatoria en cada vuelta
    $idCliente = str_replace("$","m",crypt($datos["nombre"].$datos["apellido"].$datos["email"],
                       $sal));
    
    $llaveSecreta = crypt($datos["email"].$datos["apellido"].$datos["nombre"],$idCliente.$sal);

    // ===================================================================================================================
    // Inserción de la información en la base de datos
    // ===================================================================================================================
    $datos["id_cliente"]    = $idCliente;
    $datos["llave_secreta"] = $llaveSecreta;
    $datos["create_at"]     = date("Y-m-d h:i:s");
    $datos["update_at"]     = date("Y-m-d h:i:s");

    $clientes = ModeloClientes::create("clientes", $datos);

    // Dependiendo de la respuesta del módelo se retornará un mensaje u otro.
    $respuesta = array();

    if($clientes == "OK"){
      $respuesta = array(
        "status"  => 200,
        "message" => "El nuevo cliente se ha ingresado con éxito."
      );
    }else{
      $respuesta = array(
        "status"  => 400,
        "message" => $clientes
      );
    }

    echo json_encode($respuesta);
  }
}

?>