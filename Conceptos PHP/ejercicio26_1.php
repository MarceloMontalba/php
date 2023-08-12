<?php 

session_start();

$_SESSION["usuario"] = "marcelo";
$_SESSION["status"]  = "logueado";

echo "Sessión iniciada:<br/>";
echo "Usuario: ".$_SESSION["usuario"].", Estado: ".$_SESSION["status"];

?>