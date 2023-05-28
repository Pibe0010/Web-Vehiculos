<?php

session_start();
if ($_POST) {
    include("./config/db.php");
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    $password = hash('sha512', $password);


    $sentencia = $conexion->prepare("SELECT *, count(*) as n_usuario
        FROM `tbl_usuarios`
        WHERE usuario=:usuario
        AND password=:password
        ");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->execute();
    $listaUsuario = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($listaUsuario['n_usuario'] > 0) {
        $_SESSION['usuario'] = $listaUsuario['usuario'];
        $_SESSION['logueado'] = true;
        header("Location:../index.php");
    } else {
        $mensaje = "El usuario o la contraseña son incorrectos. ";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Adiministrador el sitio </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        
        <strong>Túnel De Lavado VdM</strong>
    </div>

    <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert)
        })
    </script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-4">
                <br /><br /><br /><br />
                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensaje ?></strong>
                    </div>
                <?php } ?>
                <div class="card">
                    <form method="POST">
                        <div class="card-header ">
                            Login
                        </div>
                        <div class="card-body">
                            <div>
                                <label class="form-label" name="usuario">Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" name="pasword">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
                            </div>
                            <input name="" id="" class="btn btn-primary" type="submit" value="Entrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>