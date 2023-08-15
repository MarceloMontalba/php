<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php

if($_POST){
    $proyecto = $_POST["txtProyecto"];
    $descripcion = $_POST["txtDescripcion"];

    $fecha = new DateTime();
    $imagen = $fecha->getTimeStamp()."_".$_FILES["imagen"]["name"];
    $imagen_temporal = $_FILES["imagen"]["tmp_name"];
    move_uploaded_file($imagen_temporal, "imagenes/$imagen");

    $sentencia = "INSERT INTO proyectos(nombre, imagen, descripcion) VALUES('$proyecto', '$imagen', '$descripcion')";
    $objConexion = new conexion();
    $objConexion->ejecutarSentencia($sentencia);

    header("location:administrar.php");
}

?>

<h3 class="d-flex justify-content-center mb-3">CREACIÓN DE PROYECTO</h3>

<div class="contariner">
    <div class="row">
        <section class="col-4"></section>
        <section class="col-4">
            <form action="crear_proyecto.php" method="post" enctype="multipart/form-data">
                <div class="contenedor-proyecto mb-2">
                    <label for="txtProyecto">Nombre del Proyecto:</label>
                    <input type="text" name="txtProyecto" id="txtProyecto" class="form-control" required>
                </div>

                <div class="contenedor-imagen mb-2">
                    <label for="imagen">Imagen del Proyecto:</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" required>
                </div>

                <div class="contenedor-descripcion mb-4">
                    <label for="txtDescripcion">Descripción del Proyecto</label>
                    <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-sm btn-success">Crear Proyecto</button>
                <a href="administrar.php" class="btn btn-sm btn-danger">Cancelar</a>
            </form>
        </section>
        <section class="col-4"></section>
    </div>
</div>

<?php require("pie.php");