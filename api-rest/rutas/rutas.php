<?php

// Se separán cada una de las rutas ingresadas en la API
$arrayRutas = explode("/", $_SERVER["REQUEST_URI"]);

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
        $cursos->index();
      } else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
        $cursos = new ControladorCursos;
        $cursos->create();
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
    // Peticiones POST para ingresar crear un curso
    // ===================================================================================
    if(array_filter($arrayRutas)[2] == "cursos" && is_numeric(array_filter($arrayRutas)[4])){
      if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET"){
        $cursoSeleccionado = new ControladorCursos;
        $cursoSeleccionado->show(array_filter($arrayRutas)[4]);
      } 
    }

    // ===================================================================================
    // Peticiones PUT de curso concreto
    // ===================================================================================
    if(array_filter($arrayRutas)[2] == "cursos" && is_numeric(array_filter($arrayRutas)[3])){
      if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT"){
        $cursoActualizado = new ControladorCursos;
        $cursoActualizado->update(array_filter($arrayRutas)[3]);
      } 
    }

    // ===================================================================================
    // Peticiones DELETE de curso concreto
    // ===================================================================================
    if(array_filter($arrayRutas)[3] == "cursos" && is_numeric(array_filter($arrayRutas)[4])){
      if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE"){
        $cursoEliminado = new ControladorCursos;
        $cursoEliminado->delete(array_filter($arrayRutas)[4]);
      } 
    }
  }
}

?>