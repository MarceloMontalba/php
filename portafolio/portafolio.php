<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>

<?php

if($_POST){
    $nombre = $_POST["txtProyecto"];
    $descripcion = $_POST["txtDescripcion"];

    $fecha = new DateTime();
    $imagen = $fecha->getTimestamp()."_".$_FILES["archivo"]["name"];

    $imagen_temporal = $_FILES["archivo"]["tmp_name"];
    move_uploaded_file($imagen_temporal, "imagenes/$imagen");

    $objConexion = new conexion();
    $sentencia = "INSERT INTO proyectos(nombre, imagen, descripcion) VALUES('$nombre','$imagen','$descripcion')";

    $objConexion->ejecutar($sentencia);
    header("location:portafolio.php");
}
if($_GET){
    $id = $_GET["borrar"];
    $objConexion = new conexion();

    $imagen = $objConexion->consultar("SELECT imagen FROM proyectos WHERE id=$id");
    unlink("imagenes/".$imagen[0]["imagen"]);

    $sql = "DELETE FROM proyectos WHERE id=$id";
    $objConexion->ejecutar($sql);

    header("location:portafolio.php");
}

$objConexion = new conexion();
$resultado = $objConexion->consultar("SELECT * FROM proyectos");
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del Proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del Proyecto: <input required type="text" name="txtProyecto" id="" class="form-control">
                        <br>
                        Imagen del Proyecto: <input required type="file" name="archivo" id="" class="form-control">
                        <br>
                        Descripción del Proyecto:
                        <textarea name="txtDescripcion" required id="" cols="30" rows="7" class="form-control"></textarea>
                        <br>
                        <input type="submit" value="Enviar Proyecto" class="btn btn-success">
                    </form>
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultado as $fila){ ?>
                            <tr class="">
                                <td scope="row"><?php echo $fila["id"]; ?></td>
                                <td><?php echo $fila["nombre"]; ?></td>
                                <td>
                                    <img src="imagenes/<?php echo $fila['imagen']; ?>" width="80" alt="">
                                </td>
                                <td><?php echo $fila["descripcion"]; ?></td>
                                <td>    
                                    <a href="?borrar=<?php echo $fila['id']; ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("pie.php"); ?>