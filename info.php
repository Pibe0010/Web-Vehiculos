<?php include('template/header.php') ?>
<?php
include('admin/config/db.php');
include('config.php');

?>

<style>
    .sub{background-color:rgba(157, 251, 156,0.3);}
</style>

<br />
<div class="card">
    <div class="card-header">
        Datos de Información
    </div>
    <div class="card-body">
        <div class="mb-3">
            <form action="" method="post">
                <label for="info" class="form-label"></label>
                <input type="text" class="form-control" name="info" id="info" aria-describedby="helpId" placeholder="Agregar Info"><br>
                <input name="agregar-info" id="agregar-info" class="btn btn-success" type="submit" value="Agregar">
        </div>
        </form>
        <ul class="list-group list-group">
            <?php foreach($registros as $registro){ ?>
                <li class="list-group-item ">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                        <input 
                            class="form-check-input" 
                            type="checkbox"
                            name="completado" 
                            value="<?php echo $registro['completado']; ?>" 
                            id="" 
                            onchange="this.form.submit()"
                            <?php echo ($registro['completado']==1)?'checked':''; ?>><br/>
                        </form>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="<?php echo ($registro['completado']==1)?'sub':''; ?>">
                            <?php echo $registro['info']; ?></span> &nbsp;
                            <a href="?id=<?php echo $registro['id']; ?>">
                            <span class="badge bg-danger "> X </span></a>
                        </li>
            <?php } ?>
        </ul>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>



<?php include('template/footer.php') ?>