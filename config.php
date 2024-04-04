<?php
    
    // Variables de la conexion a la DB
    $mysqli = new mysqli("127.0.0.1:3306","root","root","db_pasteles");
    
    // Comprobamos la conexion
    if($mysqli->connect_errno) {
        die("Fallo la conexion");
    } else {
        //echo "Conexion exitosa";
    }

?>