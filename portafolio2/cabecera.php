<?php
session_start();

if(isset($_SESSION["usuario"]) != "marcelo"){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header class="menu mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">INICIO</a>
                </li>
                <li class="nav-item">
                    <a href="portafolio.php" class="nav-link">PORTAFOLIO</a>
                </li>
                <li class="nav-item">
                    <a href="administrar.php" class="nav-link">ADMINISTRAR</a>
                </li>
                <li class="nav-item">
                    <a href="cerrar.php" class="nav-link">CERRAR</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>