<?php
    $txtNombre = "";
    $rdgLenguaje = "";
    
    $chkphp  = "";
    $chkhtml = "";
    $chkcss  = "";

    $lsAnime = "";
    $txtComentario = "";

    if($_POST){
        $txtNombre = (isset($_POST["txtNombre"]))? $_POST["txtNombre"]: "";
        $rdgLenguaje = (isset($_POST["lenguaje"]))? $_POST["lenguaje"]: "";

        $chkphp = (isset($_POST["chkphp"])=="si")? "checked":"";
        $chkhtml = (isset($_POST["chkhtml"])=="si")? "checked":"";
        $chkcss = (isset($_POST["chkcss"])=="si")? "checked":"";

        $lsAnime = (isset($_POST["lsAnime"]))? $_POST["lsAnime"]:"";
        $txtComentario = (isset($_POST["txtComentario"]))? $_POST["txtComentario"]:"";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php if($_POST){ ?>
        <strong>Hola: <?php echo $txtNombre; ?></strong><br/>
        <strong>Tu Lenguaje favorito es: <?php echo $rdgLenguaje; ?></strong><br/>
        <strong>Estas aprendiendo: <br/>
            <?php echo ($chkphp=="checked")? "-PHP<br/>":""; ?>
            <?php echo ($chkhtml=="checked")? "-HTML<br/>":""; ?>
            <?php echo ($chkcss=="checked")? "-CSS<br/>":""; ?>
        </strong><br/>
        <strong>Tu Anime Favorito es: <?php echo ucfirst($lsAnime) ?></strong>
        <strong>Escribiste esto: <?php echo $txtComentario; ?> </strong>
    <?php } ?>

    <form action="ejercicio27.php" method="post">
        Nombre: <br/>
        <input type="text" name="txtNombre" id="" value="<?php echo $txtNombre ?>">
        <br/>
        <br/>¿Te gusta?:<br/>
        php:  <input type="radio" name="lenguaje" value="php" id="" <?php echo ($rdgLenguaje=="php")?"checked":"";?>><br/>
        html: <input type="radio" name="lenguaje" value="html" id="" <?php echo ($rdgLenguaje=="html")?"checked":""; ?> ><br/>
        css:  <input type="radio" name="lenguaje" value="css" id="" <?php echo ($rdgLenguaje=="css")?"checked":""; ?>><br/>
        
        <br/>Estás aprendiendo...
        <br/> php: <input type="checkbox" name="chkphp" value="si" id="" <?php echo $chkphp; ?>>
        <br/> html: <input type="checkbox" name="chkhtml" value="si" id="" <?php echo $chkhtml; ?>>
        <br/> css: <input type="checkbox" name="chkcss" value="si" id="" <?php echo $chkcss; ?>><br/>
        
        <br/>
        <br/>¿Qué Anime te gusta?:
        <select name="lsAnime" id="">
            <option value="">[Ninguna Serie]</option>
            <option value="naruto" <?php echo ($lsAnime=="naruto")?"selected":"";?> >Naruto</option>
            <option value="bleach" <?php echo ($lsAnime=="bleach")?"selected":"";?>>Bleach</option>
            <option value="one_piece" <?php echo ($lsAnime=="one_piece")?"selected":"";?>>One Piece</option>
        </select><br/>

        <br/><textarea name="txtComentario" id="" cols="30" rows="10"><?php echo $txtComentario; ?></textarea>
        <br/>

        <br/><input type="submit" value="Enviar Información">
    </form>
</body>
</html>