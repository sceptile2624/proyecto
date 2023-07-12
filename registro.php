<?php
    include 'conexion.php';

    $nombre = $_POST['nombre'];

    $contra = $_POST['contrasena'];

    $correo = $_POST['correo'];

    $direccion = $_POST['direccion'];

    $cp = $_POST['cp'];



    


    $sql = mysqli_query($conexion, "INSERT INTO usuarios (id, nombre, contrasena, correo, direccion, cp) VALUES 
    (0,'$nombre', '$contra', '$correo', '$direccion', '$cp')");
    
    if($sql){
        header("location: ../peluqueria/proyecto/index.html");
    }else{
        echo "usuario no agregado";
    }
?>
