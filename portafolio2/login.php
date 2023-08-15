<?php 

session_start();
if($_POST){
    if(($_POST["txtUsuario"] == "marcelo") && ($_POST["txtPassword"] == "hola1234")){
        $_SESSION["usuario"] = "marcelo";
        header("location:index.php");
    }else{
        header("location:login.php");
        echo "<script type='text/javascript'>
                alert('El usuario y/o contraseña ingresados no se encuentran registrados');
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar al Portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="row vh-100 d-flex align-items-center">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="card p-2">
                    <section class="card-body">
                        <div class="card-header mb-3"><h1>INGRESAR AL PORTAFOLIO</h1></div>
                        
                        <form action="login.php" method="post">
                            <label for="usuario" class="mb-1">Nombre de Usuario:</label>
                            <input type="text" name="txtUsuario" id="usuario" class="form-control form-control-sm mb-3" placeholder="USUARIO">

                            <label for="password" class="mb-1">Ingresar Contraseña:</label>
                            <input type="password" name="txtPassword" id="password" class="form-control form-control-sm mb-3" placeholder="CONTRASEÑA">
                            
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </section>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </main>
</body>
</html>