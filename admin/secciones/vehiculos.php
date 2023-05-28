<?php include("../template/header.php"); ?>

<?php

    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtFecha=(isset($_POST['txtFecha']))?$_POST['txtFecha']:"";
    $txtMarca=(isset($_POST['txtMarca']))?$_POST['txtMarca']:"";
    $txtVehiculo=(isset($_POST['txtVehiculo']))?$_POST['txtVehiculo']:"";
    $txtMatricula=(isset($_POST['txtMatricula']))?$_POST['txtMatricula']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    include("../config/db.php");

    switch($accion) {
        case"Agregar":
            $sentenciaSQL= $conexion->prepare("INSERT INTO vehiculos (id,fecha,marca,vehiculos,matricula) 
            VALUES (NULL,:fecha,:marca,:vehiculo,:matricula); ");


            $sentenciaSQL->bindParam(':fecha',$txtFecha);
            $sentenciaSQL->bindParam(':marca',$txtMarca);
            $sentenciaSQL->bindParam(':vehiculo',$txtVehiculo);
            $sentenciaSQL->bindParam(':matricula',$txtMatricula);
            $sentenciaSQL->execute();

            header("Location:vehiculos.php");
            break;
        case"Editar":

            $sentenciaSQL= $conexion->prepare("UPDATE vehiculos SET fecha=:fecha,marca=:marca,vehiculos=:vehiculo,matricula=:matricula WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->bindParam(':fecha',$txtFecha);
            $sentenciaSQL->bindParam(':marca',$txtMarca);
            $sentenciaSQL->bindParam(':vehiculo',$txtVehiculo);
            $sentenciaSQL->bindParam(':matricula',$txtMatricula);
            $sentenciaSQL->execute();
            header("Location:vehiculos.php");
            

            break;
        case"Cancelar":
            header("Location:vehiculos.php");
            break;

        case"Seleccionar":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM vehiculos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $vehiculos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $txtFecha=$vehiculos['fecha'];
            $txtMarca=$vehiculos['marca'];
            $txtVehiculo=$vehiculos['vehiculos'];
            $txtMatricula=$vehiculos['matricula'];

            break;
        case"Borrar":

            $sentenciaSQL= $conexion->prepare("DELETE FROM vehiculos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            header("Location:vehiculos.php");

            break;
    }


    $sentenciaSQL= $conexion->prepare("SELECT * FROM vehiculos");
    $sentenciaSQL->execute();
    $listaVehiculos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC)


?>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Registrar Vehiculo
        </div>

        <div class="card-body">
    <form method="post" enctype="multipart/form-data" class="form-control">
        <div class="mb-1">
                <label for="txtID" class="form-label"></label>
                <input type="text" 
                name="txtID" 
                id="txtID"
                readonly
                class="form-control" 
                placeholder="ID"
                value="<?php echo $txtID; ?>"
                aria-describedby="helpId">
            </div>

            <div class="mb-1">
                <label for="txtFecha" class="form-label">Fecha de Registro</label>
                <input type="date" 
                name="txtFecha" 
                id="txtFecha" 
                class="form-control" 
                placeholder="Fecha"
                value="<?php echo $txtFecha; ?>"
                required
                aria-describedby="helpId">
            </div>

            <div class="mb-1">
                <label for="txtMarca" class="form-label">Marca</label>
                <input type="text" 
                name="txtMarca" 
                id="txtMarca" 
                class="form-control" 
                placeholder="Marca" 
                value="<?php echo $txtMarca; ?>"
                required
                aria-describedby="helpId">
            </div>

            <div class="mb-1">
                <label for="txtVehiculo" class="form-label">Vechiculo</label>
                <input type="text" 
                name="txtVehiculo" 
                id="txtVehiculo" 
                class="form-control" 
                placeholder="Vehiculo" 
                value="<?php echo $txtVehiculo; ?>"
                required
                aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="txtMatricula" class="form-label">Matricula</label>
                <input type="text" 
                name="txtMatricula" 
                id="txtMatricula" 
                class="form-control" 
                placeholder="Matricula" 
                value="<?php echo $txtMatricula; ?>"
                required
                aria-describedby="helpId">
            </div>

            <div class="d-grid gap-1 btn-group" role="group" aria-label="">
                <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-outline-primary">Agregar</button>
                <button type="submit" name="accion" <?php echo ($accion!=="Seleccionar")?"disabled":""; ?> value="Editar" class="btn btn-outline-success">Editar</button>
                <button type="submit" name="accion" <?php echo ($accion!=="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-outline-danger ">Cancelar</button>
            </div>
    </form>
        </div>
    </div>
</div>





<div class="col-md-8">
    <div class="table-responsive">
        <table class="table table-hover fluid ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tfoot>
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($listaVehiculos as $vehiculos) { ?>
                <tr class="">
                    <td><?php echo $vehiculos['id']; ?></td>
                    <td><?php echo $vehiculos['fecha']; ?></td>
                    <td><?php echo $vehiculos['marca']; ?></td>
                    <td><?php echo $vehiculos['vehiculos']; ?></td>
                    <td><?php echo $vehiculos['matricula']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo  $vehiculos['id']; ?>"/>
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<?php include("../template/footer.php"); ?>