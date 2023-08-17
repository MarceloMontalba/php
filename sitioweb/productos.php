<?php require("templates/cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php 
$objConexion = new conexion();
$resultados = $objConexion->consultarBd("SELECT * FROM libros ORDER BY id DESC");
?>

<div class="conteiner">
    <div class="row">
        <?php foreach($resultados as $libro){ ?>
            <div class="col-md-3">
                <div class="card">
                <img class="card-img-top" src="img/<?php echo $libro['imagen'] ?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $libro['nombre'] ?></h4>
                        <a href="" class="btn btn-primary" role="button">Ver más</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php require("templates/pie.php"); ?>