<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php
    $objConexion = new conexion();
    $resultados = $objConexion->consultarDb("SELECT * FROM proyectos")
?>

<main>
<h3 class="d-flex justify-content-center mb-3">PORTAFOLIO DE PROYECTOS</h3>

<section class="container">
    <div class="row">
        <?php foreach($resultados as $fila){ ?>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fila["nombre"]; ?></h5>
                        <div class="card-text"><?php echo $fila["descripcion"]; ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</section>

</main>

<?php require("pie.php") ?>