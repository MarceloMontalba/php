<?php require("../templates/cabecera.php"); ?>
<?php require("../../conexion.php"); ?>

<?php 
$txtId = (isset($_POST["txtId"]))? $_POST["txtId"]:"";
$txtNombre = (isset($_POST["txtNombre"]))? $_POST["txtNombre"]:""; 

$txtImagen = (isset($_FILES["txtImagen"]["name"]))? $_FILES["txtImagen"]["name"]:"";
$accion = (isset($_POST["btnAccion"]))? $_POST["btnAccion"]:"";

$objConexion = new conexion();
switch($accion){
    case "agregar":
        $objConexion->ejecutarBd("INSERT INTO libros(nombre, imagen) VALUES('$txtNombre', '$txtImagen')");

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen!="")? $fecha->getTimestamp()."_".$txtImagen:"imagen.jpg";

        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen, "../../img/".$nombreArchivo);
        }
        header("location:productos.php");
        break;
    case "editar":
        if(($txtId!="") && (count($objConexion->consultarBd("SELECT id FROM libros WHERE id=".$txtId))!=0)){
            $objConexion->ejecutarBd("UPDATE libros SET nombre='".$txtNombre."' WHERE id=".$txtId);

            if($txtImagen!=""){
                $objConexion->ejecutarBd("UPDATE libros SET imagen='".$txtImagen."' WHERE id=".$txtId);
            }
        }
        break;
    case "cancelar":
        echo "Cancelar";
        break;
    case "seleccionar":
        $LibroSeleccionado = $objConexion->consultarFila("SELECT * FROM libros WHERE id=".$_POST['hiddenId']);
        $txtId = $LibroSeleccionado["id"];
        $txtNombre = $LibroSeleccionado["nombre"];
        $txtImagen = $LibroSeleccionado["imagen"];
        break;
    case "eliminar":
        $imagen = $objConexion->consultarFila("SELECT imagen FROM libros WHERE id=".$_POST["hiddenId"]);
        if(isset($imagen["imagen"]) && ($imagen["imagen"]!="imagen.jpg")){
            if(file_exists("../../img/".$imagen["imagen"])){
                unlink("../../img/".$imagen["imagen"]);
            }
        }

        $objConexion->ejecutarBd("DELETE FROM libros WHERE id=".$_POST['hiddenId']);
        break;
}

$listaTabla = $objConexion->consultarBd("SELECT * FROM libros ORDER BY id DESC");

?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            DATOS DEL LIBRO
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtId">Ingresar Código:</label>
                    <input type="text" name="txtId" id="txtId" placeholder="CÓDIGO" class="form-control" value="<?php echo $txtId; ?>">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Ingresar Nombre:</label>
                    <input type="text" name="txtNombre" id="txtNombre" placeholder="NOMBRE" class="form-control" value="<?php echo $txtNombre; ?>">
                </div>

                <div class="form-group">
                    <label for="txtImagen">Ingresar Imagen:</label>
                    <?php echo $txtImagen; ?>
                    <input type="file" name="txtImagen" id="txtImagen" placeholder="IMAGEN" class="form-control">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="sumbmit" class="btn btn-success" name="btnAccion" value="agregar">Agregar</button>
                    <button type="submit" class="btn btn-warning" name="btnAccion" value="editar">Modificar</button>
                    <button type="submit" class="btn btn-primary" name="btnAccion" value="cancelar">Cancelar</button>
                </div>
                
            </form>
        </div>
        <div class="card-footer text-muted">
            <br>
        </div>
    </div>
</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>IMAGEN</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaTabla as $libro){ ?>
            <tr>
                <td><?php echo $libro["id"]; ?></td>
                <td><?php echo $libro["nombre"]; ?></td>
                <td><?php echo $libro["imagen"]; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="hiddenId" value="<?php echo $libro["id"] ?>">
                        <button type="submit" name="btnAccion" value="seleccionar" class="btn btn-primary">Editar</button>
                        <button type="submit" name="btnAccion" value="eliminar" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require("../templates/pie.php"); ?>