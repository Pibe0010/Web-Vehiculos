<?php 
include("../../config/db.php");


if(isset($_GET['txtID'])){
    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(':id',$txtID);
    $sentencia->execute();
}


$sentenciaSQL= $conexion->prepare("SELECT * FROM tbl_usuarios");
$sentenciaSQL->execute();
$listaUsuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include("../../template/header.php"); ?>

<div class="card col-md-12 fluid ">
    <div class="card-header ">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar usuario</a>
    </div>
    
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-hover ">
        <thead class="md-4">
            <tr>
                <th >Usuario</th>
                <th >Correo</th>
                <th class="">Contraseña</th>
                <th >Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($listaUsuario as $vehiculos) { ?>
            <tr class="">
                <td ><?php echo $vehiculos['usuario'] ?></td>
                <td><?php echo $vehiculos['correo'] ?></td>
                <td class="text-area"><?php echo $vehiculos['password'] ?></td>
                <td>
                        <a  class="btn btn-outline-success" href="editar.php?txtID=<?php echo $vehiculos['id'] ?>" role="button">Editar</a>
                        <a  class="btn btn-outline-danger" href="index.php?txtID=<?php echo $vehiculos['id'] ?>" role="button">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>




<?php include("../../template/footer.php"); ?>
