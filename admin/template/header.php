<?php
    session_start();
    if(!isset($_SESSION['usuario'])) {
        header("Location:../index.php");
    }else{
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>admin - inicio</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <!--- jquery  --->
    <script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <!--- sweetalert2  --->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body>
    <?php $url = "http://".$_SERVER['HTTP_HOST']."/App-Vehiculo" ?>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#" aria-current="page">Administrador del sitio <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Dashboard</a>
            <a class="nav-item nav-link" href="<?php echo $url ?>/admin/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url ?>/admin/secciones/vehiculos.php">Vehiculos</a>
            <a class="nav-item nav-link" href="<?php echo $url ?>/admin/secciones/usuarios/index.php">Usuarios</a>
            <a class="nav-item nav-link" href="<?php echo $url ?>/admin/secciones/cerrar.php">Cerrar</a>
        </div>
    </nav>
    <div class="container">
        <br/>
        <div class="row">
            <script>
                <?php if(isset($_GET['mensaje'])){ ?>
                    Swal.fire({icon:"sucsses", title:"<?php echo $_GET['mensaje'] ?>"}); 
                <?php } ?>
            </script>