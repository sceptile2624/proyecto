<?php
    include 'conexion.php';
    $user = $_GET['user'];
    $borrar = $conexion ->query("DELETE FROM carrito");
    if($borrar){
        header('location: html_usuarios/productos_usuarios.php?user='.$user);
    }
?>