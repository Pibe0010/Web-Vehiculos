<?php

        $host="localhost";
        $bd="baseDatos";
        $usuario="root";
        $pass="password";
    
        try {
            $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$pass );
        } catch ( Exception $ex) {
            echo $ex->getMessage();
        }


?>