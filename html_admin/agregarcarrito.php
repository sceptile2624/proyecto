<?php
session_start();
include '../conexion.php';

$a = $_GET["var"];
$user = $_GET["user"];

var_dump($a);
var_dump($user);

$nombreUsuario;
// Obtener el nombre del usuario desde la tabla usuarios
$userSelect = $conexion->query("SELECT nombre FROM usuarios WHERE correo = '$user'");
if ($userSelect->num_rows > 0) {
    $userRow = $userSelect->fetch_assoc();
    $nombreUsuario = $userRow["nombre"];
}
echo ($nombreUsuario);

//DATOS DE PRODUCTO
$idproduto;
$precio;
$producto;

$select = $conexion->query("SELECT id, producto, precio, url_img FROM productos WHERE id = $a");
if ($select->num_rows > 0) {
    $row = $select->fetch_assoc();
    $idproduto = $row["id"];
    $producto = $row["producto"];
    $precio = $row["precio"];

    // Agregar el producto al carrito usando la matriz de sesión
    // Comprobar si la matriz de sesión de carrito ya existe, si no, crearla.
    // if (!isset($_SESSION['cart'])) {
    //     $_SESSION['cart'] = array();
    // }

    // // Agregar el producto a la matriz de sesión del carrito.
    // // Aquí, estamos usando el id del producto como clave y el correo electrónico del usuario como valor.
    // $_SESSION['cart'][$id] = $user;

    // // Redireccionar a la página de productos del usuario.
    // header("Location: ../html_usuarios/productos_usuarios.php?user=" . urlencode($user));
    // exit;
}

//insertar carrito
$query = "INSERT INTO carrito (id, id_producto,nombre_producto, precio,nombre_usuario) VALUES(0, '$idproduto','$producto','$precio', '$user')";


?>
