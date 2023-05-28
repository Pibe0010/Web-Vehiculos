<?php include('template/header.php') ?>
<?php 


include('./admin/config/db.php'); 

    $sentenciaSQL= $conexion->prepare("SELECT * FROM vehiculos");
    $sentenciaSQL->execute();
    $listaVehiculos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="card">
        <div class="card-header">
            Vehiculo registrados
        </div>
<div class="col-md-12 p-4">
    <div class="table-responsive">

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Marca</th>
            <th scope="col">Vehiculo</th>
            <th scope="col">Matricula</th>
        </tr>
    </thead>
    <?php foreach($listaVehiculos as $vehiculos) { ?>
    <tbody>
        <tr>
        <td><?php echo $vehiculos['id']; ?></td>
        <td><?php echo $vehiculos['fecha']; ?></td>
        <td><?php echo $vehiculos['marca']; ?></td>
        <td><?php echo $vehiculos['vehiculos']; ?></td>
        <td><?php echo $vehiculos['matricula']; ?></td>
        </tr>
    </tbody>
    <?php } ?>
</table>
</div>
</div>
</div>

<?php include('template/footer.php') ?>