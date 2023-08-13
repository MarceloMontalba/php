<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>

<?php 
$objConexion = new conexion();
$resultados = $objConexion->consultar("SELECT * FROM proyectos");
?>

<div class="row align-items-md-stretch">
    <div class="col-md-12">
        <div
            class="h-100 p-5 text-white bg-primary border rounded-3">
            <h2>Bienvenid@s</h2>
            <p>Este es un portafolio privado.</p>
            <button class="btn btn-outline-light" type="button">Mas información</button>
        </div>
    </div>
</div>

<br>
<div class="card-deck">
    <div class="container">
        <div class="row">
            <?php foreach($resultados as $proyecto){ ?>
                <div class="col-md-4 p-2">
                    <div class="card">
                        <img class="card-img-top" src="imagenes/<?php echo $proyecto["imagen"]; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $proyecto["nombre"]; ?></h5>
                            <p class="card-text"><?php echo $proyecto["descripcion"]; ?></p>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include("pie.php"); ?>