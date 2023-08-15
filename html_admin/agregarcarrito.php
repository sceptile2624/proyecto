<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include '../conexion.php';

$a = $_GET["var"];
$user = $_GET["user"];

// Obtener el nombre del usuario desde la tabla usuarios
$userSelect = $conexion->query("SELECT nombre FROM usuarios WHERE correo = '$user'");
if ($userSelect->num_rows > 0) {
    $userRow = $userSelect->fetch_assoc();
    $nombreUsuario = $userRow["nombre"];
}

// Obtener los datos del producto
$select = $conexion->query("SELECT id, producto, precio, url_img FROM productos WHERE id = $a");
if ($select->num_rows > 0) {
    $row = $select->fetch_assoc();
    $idproducto = $row["id"];
    $producto = $row["producto"];
    $precio = $row["precio"];

  // Insertar el producto en el carrito
$query = "INSERT INTO carrito (id_producto, nombre_producto, precio, nombre_usuario) VALUES ('$idproducto', '$producto', '$precio', '$nombreUsuario')";

if ($conexion->query($query) === TRUE) {
    // Redireccionar a la página de productos del usuario.
    header("Location: ../html_usuarios/productos_usuarios.php?user=" . urlencode($user));
    exit;
} else {
    echo "Error al agregar el producto al carrito: " . $conexion->error;
}
} else {
    echo "Producto no encontrado.";
}

$conexion->close();
?>
