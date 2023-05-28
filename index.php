<?php 
include('./admin/config/db.php');


    $sentenciaSQL= $conexion->prepare("SELECT * FROM vehiculos");
    $sentenciaSQL->execute();
    $listaVehiculos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    if($_POST){
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    
        $sentencia=$conexion->prepare("UPDATE tbl_usuarios
        SET 
        usuario=:usuario,
        WHERE id=:id");
    
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":id",$txtID);
    $sentencia=$registros->execute([$usuario]);
        
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>App -Car </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!--- jquery  --->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>




</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#"><strong class="text-white">App - Car</strong> 
        </form></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <strong class="text-white">Tunel De Lavado VdM</strong> 
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="vehiculos.php">Ver Vehiculos</a></li>
                    <li><a class="dropdown-item" href="./admin/inicio.php">Agregar Vehiculo</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="./admin/">Login</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">APP</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Login
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./admin/">Entrar</a>
                                <a class="nav-link" href="./admin/secciones/cerrar.php">Cerrar</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                            Vehiculos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="./admin/inicio.php" aria-expanded="false" aria-controls="collapsePages" >
                                    Agregar Vehiculo
                                </a>
                                <a class="nav-link collapsed" href="vehiculos.php" aria-expanded="false" aria-controls="collapsePages">
                                    Lista Vehiculos
                                </a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Configuración</div>
                        <a class="nav-link" href="info.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Notas
                        </a>
                        <a class="nav-link" href="./admin/inicio.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Agregar vehiculo
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">on:</div>
                    Tunel de Lavado ( VdM )
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

					<div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="Chart1" class="chart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="Chart2" class="chart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    <div class="card mb-4 fluid">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabla de Datos Vehiculo
                        </div>
                        <div class="card-body responsive">
                            <table id="datatablesSimple" class="table table-hover">
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
                                    <tr>
                                    <td><?php echo $vehiculos['id']; ?></td>
                                    <td><?php echo $vehiculos['fecha']; ?></td>
                                    <td><?php echo $vehiculos['marca']; ?></td>
                                    <td><?php echo $vehiculos['vehiculos']; ?></td>
                                    <td><?php echo $vehiculos['matricula']; ?></td>
                                    <td><a name="" id="" class="btn btn-outline-primary" href="vehiculos.php" role="button"><i class="fas fa-car"></i></a>
                                    </td>
                                <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; ThegodesigCode 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.2/echarts.min.js"></script>
    
</body>

</html>