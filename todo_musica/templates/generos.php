<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php 

$objConexion = new conexion();
$generos = $objConexion->consultarDatos("SELECT * FROM genre ORDER BY name ASC");
?>

<div class="contenedor-lista">
    <?php foreach($generos as $genero){ ?>
        <a href="#" class="one">
            <h3><?php echo $genero["name"]; ?></h3>
        </a>
    <?php } ?>
</div>

<?php require("pie.php"); ?>