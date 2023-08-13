<?php
session_start();
if(isset($_SESSION["usuario"])!="marcelo"){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Portafolio</title>
</head>
<body>
    <div class="container">
        <a href="index.php">Inicio</a> |
        <a href="portafolio.php">Portafolio</a> |
        <a href="cerrar.php">Cerrar Sesión</a>
        <br><br>