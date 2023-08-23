<?php require("cabecera.php"); ?>
<?php require("conexion.php"); ?>

<?php
function truncarNumero($numeroFlotante) {
    $numeroConvertido = strval($numeroFlotante);
    $numeroTruncado = explode(".", $numeroConvertido)[0];
    return strlen($numeroTruncado)<2? "0$numeroTruncado":$numeroTruncado;
}

$objConexion = new conexion();

if(!isset($_GET["idAlbum"])){
    header("location:albumes.php");
}
else{
    $sentencia = "SELECT COUNT(*) AS existe 
                FROM album 
                WHERE albumid=".$_GET["idAlbum"];
    $albumValido = $objConexion->consultarFila($sentencia);
    
    if ($albumValido["existe"] == 0){
        header("location:albumes.php");
    }
}

$idAlbum = $_GET["idAlbum"];
$sentenciaAlbum = "SELECT album.title as album, artist.name as artist 
                FROM album 
                LEFT JOIN artist
                ON album.artistid = artist.artistid
                WHERE album.albumid=$idAlbum";
$album = $objConexion->consultarFila($sentenciaAlbum);

$sentenciaCanciones = "SELECT * FROM track WHERE albumid=$idAlbum";
$canciones = $objConexion->consultarDatos($sentenciaCanciones);


?>


<article class="contenedor-album">
    <section class="encabezado-album">
        <h2><?php echo $album["album"]; ?></h2>
        <h3><?php echo $album["artist"]; ?></h3>
    </section>

    <ol>
        <?php foreach($canciones as $cancion) { ?>
            <li>
                <article class="informacion">
                    <section class="apartado-cancion">
                        <h3><?php echo $cancion["name"]; ?></h3>

                        <div>
                            <span class="detalle">Compositor/es:</span>
                            <span class="propiedad-detalle">
                                <?php echo ($cancion["composer"]=="")? $album["artist"]:$cancion["composer"] ?>
                            </span>
                        </div>

                        <div>
                            <span class="detalle">Duración:</span>
                            <span class="propiedad-detalle">
                                <?php echo truncarNumero($cancion["milliseconds"]/3600000); ?> :
                                <?php echo truncarNumero(($cancion["milliseconds"]%3600000)/60000); ?> :
                                <?php echo truncarNumero((($cancion["milliseconds"]%3600000)%60000)/1000); ?>
                            </span>
                        </div>

                        <div>
                            <span class="detalle">Tamaño:</span>
                            <span class="propiedad-detalle">
                                <?php echo round(($cancion["bytes"]/1024)/1024, 2); ?> MB
                            </span>
                        </div>
                    </section>
                    
                    <section class="apartado-compra">
                        <h4>Precio: €<?php echo $cancion["unitprice"]; ?></h4>
                        <button type="submit" class="boton-compra">
                            <i class="fa-solid fa-plus"></i> Añadir al carro
                        </button>
                    </section>
                </article>
            </li>
        <?php } ?>
    </ol>
</article>

<?php require("pie.php"); ?>