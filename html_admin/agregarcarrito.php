<?php
include 'conexion.php';

$a = $_GET["var"];
$user = $_GET["user"];

$select = $conexion->query("SELECT id, producto, precio, url_img FROM productos WHERE id = $a");
if ($select->num_rows > 0) {
    $row = $select->fetch_assoc();
    $id = $row["id"];
    $titulo = $row["producto"];
    $precio = $row["precio"];
    $url_img = $row["url_img"];
}

// Obtener el nombre del usuario desde la tabla usuarios
$userSelect = $conexion->query("SELECT nombre_usuario FROM usuarios WHERE correo = '$user'");
if ($userSelect->num_rows > 0) {
    $userRow = $userSelect->fetch_assoc();
    $nombreUsuario = $userRow["nombre_usuario"];
}

$insert = $conexion->query("INSERT INTO carrito (id_producto, nombre_producto, url_img, precio, nombre_usuario)
                            VALUES ('$id', '$titulo', '$url_img', '$precio', '$nombreUsuario')");
if ($insert) {
    header("location: html_usuarios/productos_usuarios.php?user=$correo");
}
?>
