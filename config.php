
<?php
include('admin/config/db.php');

if(isset($_POST['id'])){
    $id=$_POST['id'];
    $completado=(isset($_POST['completado']))?1:0;

    $sql="UPDATE tbl_info SET completado=? WHERE id=? ";
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute([$completado,$id]);


}


if(isset($_POST['agregar-info'])){
    
    $info=($_POST['info']);
    $sql='INSERT INTO tbl_info (info) VALUE (?)';
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute([$info]);
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM tbl_info WHERE id=? ";
        $sentencia=$conexion->prepare($sql);
        $sentencia->execute([$id]);
    }

    $sql="SELECT * FROM tbl_info";
    $registros=$conexion->query($sql);


?>



