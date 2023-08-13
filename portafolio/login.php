<?php
session_start();

if($_POST){
    if(($_POST["txtUsuario"]=="marcelo") && ($_POST["txtContrasenia"]=="12345")){
        $_SESSION["usuario"] = "marcelo";
        
        header("location:index.php");
    }else{
        echo "<script>alert('Usuario y/o Contraseña Incorrectos')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            Usuario: <input type="text" class="form-control" name="txtUsuario" id="">
                            <br>
                            Contraseña: <input type="password" class="form-control" name="txtContrasenia" id="">
                            <br>
                            <input type="submit" class="btn btn-success" value="Ingresar">
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>