<?php
include 'db_admin.php';

$a = $_GET["var"];
$user = $_GET["user"];
$id;
$titulo;
$precio;
$url_img;
$idusuario;

$select = $conexion->query("SELECT id, producto, precio, url_img FROM productos WHERE id = $a");
if ($select->num_rows > 0) {
    while ($row = $select->fetch_assoc()) {
        $id = $row["id"];
        $titulo = $row["producto"];
        $precio = $row["precio"];
        $url_img = $row["url_img"];
    }
}

// Obtener el ID del usuario desde la tabla usuarios
$userSelect = $conexion->query("SELECT id_usuarios FROM usuarios WHERE correo = '$user'");
if ($userSelect->num_rows > 0) {
    $userRow = $userSelect->fetch_assoc();
    $idusuario = $userRow["id_usuarios"];
}

$insert = $conexion->query("INSERT INTO carrito (id, id_producto, nombre_producto, url_img, precio, id_usuario)
                            VALUES (0, '$id', '$titulo', '$url_img', '$precio', '$idusuario')");
if ($insert) {
    header("location: ../html_usuarios/productos_usuarios.php?user=$user");
}
?>
