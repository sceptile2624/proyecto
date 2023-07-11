<?php
    include 'db.php';

    $usuario = $_POST['nombre'];
    $contra = $_POST['Contrasena'];

    $sql = mysqli_query($conexion, "SELECT nombre, contrasena FROM administradores WHERE nombre = '$usuario' AND contrasena = '$contra'");

    if($sql -> num_rows > 0){
        header("location: ../html_admin/productos_admin.php");
    }else{
        echo "no";
    }
?>