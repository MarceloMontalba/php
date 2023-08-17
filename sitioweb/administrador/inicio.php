<?php require("templates/cabecera.php"); ?>

<div class="col-md-12">
    <div class="jumbotron">
        <h1 class="display-3">Bienvenido <?php echo $usuarioLogueado ?></h1>
        <p class="lead">Vamos a administrar los libros del sitio web</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Administrar Libros</a>
        </p>
    </div>
</div>

<?php require("templates/pie.php"); ?>