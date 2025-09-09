<?php

class Conexion{

  static public function conectar(){
    $link = new PDO("mysql:host=localhost;port=3306;dbname=api_rest","root","");
    
    $link->exec("SET names utf8");
    
    return $link;
  }
}

?>