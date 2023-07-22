<?php
session_start();
include '../conexion.php';

$a = $_GET["var"];
$user = $_GET["user"];

var_dump($a);
var_dump($user);

// Obtener el nombre del usuario desde la tabla usuarios
$userSelect = $conexion->query("SELECT nombre FROM usuarios WHERE correo = '$user'");
if ($userSelect->num_rows > 0) {
    $userRow = $userSelect->fetch_assoc();
    $nombreUsuario = $userRow["nombre"];
} else {
    // Manejar la situación si el usuario no existe
    // Aquí puedes redireccionar a una página de error o realizar otras acciones
    header("Location: ../html_usuarios/productos_usuarios.php?user=$user");
    exit;
}
echo ($nombreUsuario);

$select = $conexion->query("SELECT id, producto, precio, url_img FROM productos WHERE id = $a");
if ($select->num_rows > 0) {
    $row = $select->fetch_assoc();
    $id = $row["id"];
    $titulo = $row["producto"];
    $precio = $row["precio"];
    $url_img = $row["url_img"];

    // Agregar el producto al carrito usando la matriz de sesión
    // Comprobar si la matriz de sesión de carrito ya existe, si no, crearla.
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Agregar el producto a la matriz de sesión del carrito.
    // Aquí, estamos usando el id del producto como clave y el correo electrónico del usuario como valor.
    $_SESSION['cart'][$id] = $user;

    // Redireccionar a la página de productos del usuario.
    header("Location: ../html_usuarios/productos_usuarios.php?user=" . urlencode($user));
    exit;
} else {
    // Manejar la situación si el producto no existe
    // Aquí puedes redireccionar a una página de error o realizar otras acciones
    header("Location: ../html_usuarios/productos_usuarios.php?user=$user");
    exit;
}
?>
