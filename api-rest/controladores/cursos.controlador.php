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

  // ===================================================================================================================
  // CREACIÓN DE UN NUEVO CURSO
  // ===================================================================================================================
  public function create($datos){
    if(isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"])){
      $user     = $_SERVER["PHP_AUTH_USER"];
      $pass     = $_SERVER["PHP_AUTH_PW"];
      $clientes = ModeloClientes::index("clientes"); 

      foreach($clientes as $index=>$cliente){
        if(base64_encode($user.$pass) == base64_encode($cliente["id_cliente"].$cliente["llave_secreta"])){
          // =====================================================================
          // Se valida que se haya ingresado el titulo del curso
          // =====================================================================
          if($datos["titulo"] == ""){
            $json = array(
              "status" => 404,
              "message" => "La varible *titulo* no ha sido ingresada."
            );

            echo json_encode($json, true);
            return;
          }

          // =====================================================================
          // Se valida que se haya ingresado la descripcion del curso
          // =====================================================================
          if($datos["descripcion"] == ""){
            $json = array(
              "status" => 404,
              "message" => "La varible *descripcion* no ha sido ingresada."
            );

            echo json_encode($json, true);
            return;
          }

          // =====================================================================
          // Se valida que se haya ingresado el instructor del curso
          // =====================================================================
          if($datos["instructor"] == ""){
            $json = array(
              "status" => 404,
              "message" => "La varible *instructor* no ha sido ingresada."
            );

            echo json_encode($json, true);
            return;
          }

          // =====================================================================
          // Se valida que se haya ingresado la imagen del curso
          // =====================================================================
          if($datos["imagen"] == ""){
            $json = array(
              "status" => 404,
              "message" => "La varible *imagen* no ha sido ingresada."
            );

            echo json_encode($json, true);
            return;
          }

          // =====================================================================
          // Se valida que se haya ingresado el precio del curso
          // =====================================================================
          if($datos["precio"] == ""){
            $json = array(
              "status" => 404,
              "message" => "La varible *precio* no ha sido ingresada."
            );

            echo json_encode($json, true);
            return;
          }

          // =====================================================================
          // Se valida que el titulo del curso no esté repetido
          // =====================================================================
          $cursos = ModeloCursos::index("cursos");

          foreach($cursos as $index=>$curso){
            if($curso["titulo"] == $datos["titulo"]){
              $json = array(
                "status" => 404,
                "message" => "El título ingresado no debe coincidir con el de otro curso que ya esté registrado."
              );

              echo json_encode($json, true);
              return;
            }
          }

          // =====================================================================
          // Ingreso de la información en la base de datos
          // =====================================================================
          $datos["id_creador"] = $cliente["id"];
          $datos["create_at"]  = date("Y-m-d h:i:s");
          $datos["update_at"]  = date("Y-m-d h:i:s");

          $cursos = ModeloCursos::create("cursos", $datos);
          
          if($cursos == "OK"){
            $json = array(
              "status" => 200,
              "message" => "El curso ha sido añadido satisfactoriamente a la base de datos."
            );

            echo json_encode($json, true);
            return;
          } else {
            $json = array(
              "status"  => 404,
              "message" => $cursos
            );

            echo json_encode($json);
            return;
          }
        }
      }
    }

    $json = array(
      "detalle" => "Estas en la vista de cursos de creacion."
    );

    echo json_encode($json, true);
    return;
  }

  // ===================================================================================================================
  // VISTA DE UN CURSO ESPECIFICO
  // ===================================================================================================================
  public function show($idCurso){

    if(isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"])){
      $usuario  = $_SERVER["PHP_AUTH_USER"];
      $password = $_SERVER["PHP_AUTH_PW"];
      $clientes = ModeloClientes::index("clientes");

      // ======================================================================================
      // Se valida que el usuario esté logueado y que el curso buscado corresponda a uno suyo.
      // ======================================================================================
      foreach($clientes as $index=>$cliente){
        if( base64_encode($usuario.$password) == base64_encode($cliente["id_cliente"].$cliente["llave_secreta"])){
          $curso = ModeloCursos::show("cursos", $idCurso);
          
          if(!empty($curso)){
            $json = array(
              "status"   => 200,
              "response" => $curso
            );

            echo json_encode($json);
            return;
          } else {
            $json = array(
              "status"   => 404,
              "response" => "No existe ningun curso registrado con ese codigo."
            );

            echo json_encode($json);
            return;
          }
        }
      }
    }

    // ======================================================================================
    // En caso de que no se haya encontrado el curso
    // ======================================================================================
    $json = array(
      "status"   => 404,
      "response" => "No existe ningún curso con el codigo señalado."
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