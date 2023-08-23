<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php 

$objConexion = new conexion();
$sentencia   = "SELECT track.name as name, 
                       track.composer as composer, 
                       album.title as album
                       FROM track 
                       INNER JOIN album
                       ON track.albumid = album.albumid
                       ORDER BY name ASC";
$canciones = $objConexion->consultarDatos($sentencia);
?>

<div class="contenedor-lista">
    <?php foreach($canciones as $cancion){ ?>
        <a href="#">
            <h3><?php echo $cancion["name"]; ?></h3>
            <p><?php echo $cancion["album"]; ?></p>
            <p><?php echo $cancion["composer"]; ?></p>
        </a>
    <?php } ?>
</div>

<?php require("pie.php"); ?>