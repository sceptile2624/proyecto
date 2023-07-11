<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "peluqeria";

    $conexion = mysqli_connect($server,$user,$password,$database);

    if($conexion){
        echo "Conexion exitosa";
    }else{
        echo "Error de conexion";
    }
?>