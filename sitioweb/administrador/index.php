<?php

session_start();

if($_POST){
    if(($_POST["txtUsuario"]=="marcelo") && ($_POST["txtContrasenia"]=="contrasenia")){
        $_SESSION["logueado"] = "si";
        $_SESSION["usuario"] = $_POST["txtUsuario"];
        header("Location: inicio.php");
    }else{
        $mensaje = "El usuario y/o contraseña son incorrectos.";
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-header">
                        LOGIN DEL ADMINISTRADOR
                    </div>
                    <div class="card-body">
                        <?php if(isset($mensaje)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>

                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="txtUsuario">Ingresar nombre de Usuario:</label>
                                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="USUARIO">
                            </div>

                            <div class="form-group">
                                <label for="txtContrasenia">Ingresar Contraseña:</label>
                                <input type="text" name="txtContrasenia" id="txtContrasenia" class="form-control" placeholder="CONTRASEÑA">
                            </div>

                            <button type="submit" class="btn btn-primary">Ingresar al administrador</button>
                        </form>     
                    </div>
                    <div class="card-footer text-muted">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
  </body>
</html>