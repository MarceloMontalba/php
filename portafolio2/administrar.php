<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php
    if($_GET){
        $objConexion = new conexion();
        if(isset($_GET["eliminar"])){
            $imagen = $objConexion->consultarDb("SELECT imagen FROM proyectos WHERE id=".$_GET["eliminar"]);
            unlink("imagenes/".$imagen[0]["imagen"]);

            $objConexion->ejecutarSentencia("DELETE FROM proyectos WHERE id=".$_GET["eliminar"]);
            header("location:administrar.php");
        }else if(isset($_GET["editar"])) {
            echo "Editar ".$_GET["editar"];
        }
    }

    $objConexion = new conexion();
    $respuesta = $objConexion->consultarDb("SELECT * FROM proyectos ORDER BY id DESC");
?>

<main>
    <h3 class="d-flex justify-content-center mb-3">ADMINISTRAR PROYECTOS</h3>

    <div class="container">
        <div class="row">
            <section class="col-2"></section>
            <section class="col-8">    
                <a href="crear_proyecto.php" class="btn btn-sm btn-success mb-2">Crear nuevo proyecto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE DEL PROYECTO</th>
                            <th>PORTADA</th>
                            <th>DESCRIPCIÓN</th>
                            <th></th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php foreach($respuesta as $fila) { ?>
                            <tr>
                                <td><?php echo $fila["id"]; ?></td>
                                <td><?php echo $fila["nombre"]; ?></td>
                                <td><img src="imagenes/<?php echo $fila["imagen"]; ?>" alt="" width="100"></td>
                                <td><p><?php echo $fila["descripcion"]; ?></p></td>
                                <td>
                                    <a href="?eliminar=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </section>
            <section class="col-2"></section>
        </div>
    </div>
</main>

<?php require("pie.php") ?>