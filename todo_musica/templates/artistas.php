<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php 

$objConexion = new conexion();
$artistas = $objConexion->consultarDatos("SELECT * FROM artist ORDER BY name ASC");
?>

<div class="contenedor-lista">
    <?php foreach($artistas as $artista){ ?>
        <a class="one" href="#">
            <h3><?php echo $artista["name"]; ?></h3>
        </a>
    <?php } ?>
</div>

<?php require("pie.php"); ?>