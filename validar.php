<?php
include('conexion.php');
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$consulta = "SELECT id, nombre, contrasena, correo, direccion, cp FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
$resultado = mysqli_query($conexion, $consulta);

$entrar = mysqli_num_rows($resultado);

if ($entrar > 0) {
    // Autenticación exitosa, redireccionar a la página de productos con el correo como parámetro en la URL
    header("Location: html_usuarios/productos_usuarios.php?user=$correo");
    exit;
} else {
    // Autenticación fallida, redireccionar al formulario de inicio de sesión nuevamente
    header("Location: index.html");
    exit;
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
