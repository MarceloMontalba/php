<?php

// Se separán cada una de las rutas ingresadas en la API
$arrayRutas = explode("/", $_SERVER["REQUEST_URI"]);


if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
  $pagina = $_GET["pagina"]<1?1:$_GET["pagina"];
  $cursos = new ControladorCursos();
  $cursos-> index($pagina);
} else {
  // =============================================================================
  // Si no se hace ninguna petición a la API
  // =============================================================================
  if(count(array_filter($arrayRutas)) == 1){
    $json = array(
      "detalle" => "No encontrado"
    );

    echo json_encode($json, true);
    return;
  } else {
    if(count(array_filter($arrayRutas)) == 2){
      // ===================================================================================
      // Si se hace petición a la API en la sección de cursos
      // ===================================================================================
      if(array_filter($arrayRutas)[2] == "cursos"){
        
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET"){
          $cursos = new ControladorCursos;
          $cursos->index(null);
        } 
        // ===================================================================================
        // CREACIÓN DE NUEVO CURSO A TRAVES DE POST
        // ===================================================================================
        else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
          $datos = array(
            "titulo"      => isset($_POST["titulo"])      ? $_POST["titulo"]:"",
            "descripcion" => isset($_POST["descripcion"]) ? $_POST["descripcion"]:"",
            "instructor"  => isset($_POST["instructor"])  ? $_POST["instructor"]:"",
            "imagen"      => isset($_POST["imagen"])      ? $_POST["imagen"]:"",
            "precio"      => isset($_POST["precio"])      ? $_POST["precio"]:""
          );

          $cursos = new ControladorCursos;
          $cursos->create($datos);
        }
      }

      // ===================================================================================
      // Si se hace petición a la API en la sección de registro
      // ===================================================================================
      if(array_filter($arrayRutas)[2] == "registros"){
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
          
          // Se obtienen las variables de interes que deben llegar por el POST
          $datos = array(
            "nombre"   => isset($_POST["nombre"])   ?$_POST["nombre"]:"",
            "apellido" => isset($_POST["apellido"]) ?$_POST["apellido"]:"",
            "email"    => isset($_POST["email"])    ?$_POST["email"]:"",
          );
          
          $clientes = new ControladorClientes;
          $clientes->create($datos);
        }
      }
    }else{
      // ===================================================================================
      // Peticiones GET para ingresar crear un curso
      // ===================================================================================
      if(array_filter($arrayRutas)[2] == "cursos" && is_numeric(array_filter($arrayRutas)[3])){
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET"){
          $cursoSeleccionado = new ControladorCursos;
          $cursoSeleccionado->show(array_filter($arrayRutas)[3]);
        } 
      }

      // ===================================================================================
      // Peticiones PUT de edición del curso
      // ===================================================================================
      if(array_filter($arrayRutas)[2] == "cursos" && is_numeric(array_filter($arrayRutas)[3])){
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT"){
          // ==========================================================
          // Captura de datos
          // ==========================================================
          $datos = array();
          parse_str(file_get_contents("php://input"), $datos); // Normativa para capturar data mediante el metodo PUT

          $cursoActualizado = new ControladorCursos;
          $cursoActualizado->update(array_filter($arrayRutas)[3], $datos);
        } 
      }

      // ===================================================================================
      // DELETE para eliminación del curso
      // ===================================================================================
      if(array_filter($arrayRutas)[2] == "cursos" && is_numeric(array_filter($arrayRutas)[3])){
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE"){
          $cursoEliminado = new ControladorCursos;
          $cursoEliminado->delete(array_filter($arrayRutas)[3]);
        } 
      }
    }
  }
}

?>