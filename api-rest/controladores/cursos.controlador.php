<?php

class ControladorCursos{
  
  public function index(){
    // ===================================================================================================================
    // Validación de credenciales del cliente
    // ===================================================================================================================
    if(isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"])){
      $user = $_SERVER["PHP_AUTH_USER"];
      $pass = $_SERVER["PHP_AUTH_PW"];
      $clientes = ModeloClientes::index("clientes");
  
      foreach($clientes as $index => $cliente){

        // Si el usuario y password coincide con alguno que ya esté registrado, se desplegará la lista de cursos
        if($cliente["id_cliente"] == $user && $cliente["llave_secreta"] == $pass){
          $todosCursos = ModeloCursos::index("cursos");

          $respuesta = array(
            "status" => 200,
            "response" => $todosCursos
          );

          echo json_encode($respuesta, true);
          return;
        }
      }
    }

    // En caso de que el usuario y contraseña no haya coincidido con ninguno de la bd
    $json = array(
      "state"   => 404,
      "message" => "Usted no es un cliente registrado"
    );

    echo json_encode($json, true);
    return;
  }

  public function create(){
    $json = array(
      "detalle" => "Estas en la vista de cursos de creacion."
    );

    echo json_encode($json, true);
    return;
  }

  public function show($idCurso){
    $json = array(
      "detalle" => "Ver curso $idCurso."
    );

    echo json_encode($json, true);
    return;
  }

  public function update($idCurso){
    $json = array(
      "detalle" => "Actualiza $idCurso."
    );

    echo json_encode($json, true);
    return;
  }

  public function delete($idCurso){
    $json = array(
      "detalle" => "Elimina $idCurso."
    );

    echo json_encode($json, true);
    return;
  }
}


?>