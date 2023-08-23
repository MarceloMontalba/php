<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php 

$objConexion = new conexion();
$sentencia = "SELECT album.albumid as id ,album.title as title, artist.name as artist  
              FROM album 
              INNER JOIN artist
              ON album.artistid = artist.artistid
              ORDER BY name ASC";
$albumes = $objConexion->consultarDatos($sentencia);
?>

<div class="contenedor-lista">
    <?php foreach($albumes as $album){ ?>
        <a href="detalles_album.php?idAlbum=<?php echo $album['id'];?>">
            <h3><?php echo $album["title"]; ?></h3>
            <p><?php echo $album["artist"]; ?></p>
        </a>
    <?php } ?>
</div>

<?php require("pie.php"); ?>